<?php

class ProntuariosController extends AppController {

    var $name = 'Prontuarios';

    function index() {
        
    }

    function lista() {
        $this->layout = 'ajax';

        if ($this->params['form']['query'] != '')
            $conditions = array(
                $this->params['form']['qtype'] . ' LIKE' => '%' . str_replace(' ', '%', $this->params['form']['query']) . '%'
            );
        else
            $conditions = array();

        $this->paginate = array(
            'page' => $this->params['form']['page'],
            'limit' => $this->params['form']['rp'],
            'order' => array(
                $this->params['form']['sortname'] => $this->params['form']['sortorder']
            ),
            'conditions' => $conditions
        );

        $prontuarios = $this->paginate('Prontuario');
        $page = $this->params['form']['page'];
        $total = $this->Prontuario->find('count', array('conditions' => $conditions));
        $this->set(compact('prontuarios', 'page', 'total'));
    }

    function gerarProntuario() {
        if (!empty($this->data)) {
//            $this->Session->setFlash('oi mundo!');
//            if ($this->Domicilio->save($this->data)) {
//                $this->Session->setFlash('Cadastro salvo.');
//                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
//            }
        }
    }

    function gerar($codigo_domiciliar = null) {

        if ($codigo_domiciliar == null)
            $this->redirect(array('action' => 'index'));

        $this->loadModel('Indice');
        $this->loadModel('Indicador');
        $this->loadModel('Estrategia');
        $this->loadModel('Pessoa');
        $this->loadModel('Domicilio');
        App::import('Controller', 'Indices');

        $this->Indice->recursive = -1;
        $indices = $this->Indice->read($this->Indice->indicadores, $codigo_domiciliar);

        $this->Indicador->displayField = 'coluna';
        $indicadores = $this->Indicador->find('list');

        $this->data = array();
        $this->data['Prontuario'] = array(
            'codigo_domiciliar' => $codigo_domiciliar,
            'usuario_id' => $this->Session->read('Auth.Usuario.id'),
            'numero_prontuario' => (int) $this->Prontuario->field('MAX(numero_prontuario)', array('codigo_domiciliar' => $codigo_domiciliar)) + 1,
        );

        foreach ($indices['Indice'] as $key => $value) {
            if ($value == '0' && array_search($key, $indicadores) !== false) {
                $list[array_search($key, $indicadores)] = $key;
                $this->data['Indicador']['Indicador'][] = array_search($key, $indicadores);
            }
        }

        $usuarios = array();
        $pessoas = $this->Pessoa->findAllByCodigoDomiciliar($codigo_domiciliar);
        $this->Domicilio->id = $codigo_domiciliar;
        $domicilio = $this->Domicilio->read();
        $estrategias = $this->Estrategia->find('all');
        foreach ($estrategias as $estrategia) {
            foreach ($estrategia['Indicador'] as $indicador) {
                foreach ($pessoas as $pessoa) {
                    $retorno = IndicesController::calculaIndicadorPessoa($pessoa['Pessoa'], $indicador['coluna'], null, $estrategia['Estrategia']['idade_min'], $estrategia['Estrategia']['idade_max']);
                    if ($retorno['usuario'] == true)
                        $prontuario['estrategias'][$estrategia['Estrategia']['id']] = $estrategia['Estrategia']['id'];
                }
                $retorno = IndicesController::calculaIndicadorDomicilio($domicilio['Domicilio'], $indicador, $dimensao[$nome][$indicador]);
                if ($retorno['vulnerabilidade'] == true)
                    $prontuario['estrategias'][$estrategia['Estrategia']['id']] = $estrategia['Estrategia']['id'];
            }
        }

        $this->data['Estrategia']['Estrategia'] = $prontuario['estrategias'];

        if ($this->Prontuario->save($this->data)) {
            $this->redirect(array('controller' => 'prontuarios', 'action' => 'gerarPDF', $this->Prontuario->id));
            //$this->redirect(array('controller' => 'prontuarios', 'action' => 'exibirProntuario', $this->Prontuario->id));
        } else {
            $this->Session->setFlash('Ocorreu um erro ao gravar o prontuário!');
            $this->redirect(array('controller' => 'prontuarios', 'action' => 'index'));
        }
    }

    function exibirProntuario($id) {
        $this->layout = 'ajax';
        $this->Prontuario->recursive = 2;
        $this->data = $this->Prontuario->read();
        $total_estrategias = $this->Prontuario->Estrategia->find('count');
        $this->set(compact('total_estrategias'));
    }

    function exibirDados($id) {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $this->Prontuario->recursive = 2;
        echo '<pre>';
        echo print_r($this->Prontuario->read());
        echo '</pre>';
    }

    function cadastro($id = null) {
        if ($id == null)
            $this->redirect(array('action' => 'index'));
        $this->data = $this->Prontuario->read();
    }

    function gerarPDF($id) {
        $this->autoRender = false;
        $codigo_domiciliar = $this->Prontuario->field('codigo_domiciliar');
        $numero_prontuario = $this->Prontuario->field('numero_prontuario');
        $html = $this->requestAction(array('controller' => 'prontuarios', 'action' => 'exibirProntuario'), array('return', 'pass' => array($id)));
        App::import('Vendor', 'mpdf53/mpdf');
        $pdf = new mPDF('utf-8', 'A4-L');
        $setFooter = $pdf->SetFooter("Prontuário no. " . str_pad($numero_prontuario, 4, "0", STR_PAD_LEFT) . "|Código Domiciliar: $codigo_domiciliar|{PAGENO}");
        $pdf->WriteHTML($html);
        $pdf->Output('Prontuario_' . $codigo_domiciliar . '_' . str_pad($numero_prontuario, 4, "0", STR_PAD_LEFT) . '.pdf', 'D');
    }

}
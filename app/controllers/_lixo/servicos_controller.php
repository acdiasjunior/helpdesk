<?php

class ServicosController extends AppController {

    var $name = 'Servicos';

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

        $servicos = $this->paginate('Servico');
        $page = $this->params['form']['page'];
        $total = $this->Servico->find('count', array('conditions' => $conditions));
        $this->set(compact('servicos', 'page', 'total'));
    }

    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Servico->read();
        } else {
            if ($this->Servico->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

    function listaServicosPessoa($pessoa_id) {
        $this->layout = 'ajax';

        $conditions = array('Servico.pessoa_id =' => $pessoa_id);
        if ($this->params['form']['query'] != '')
            $conditions[] = array($this->params['form']['qtype'] . ' LIKE' => '%' . str_replace(' ', '%', $this->params['form']['query']) . '%');

        $this->paginate = array(
            'page' => $this->params['form']['page'],
            'limit' => $this->params['form']['rp'],
            'order' => array(
                $this->params['form']['sortname'] => $this->params['form']['sortorder']
            ),
            'conditions' => $conditions
        );
        $servicos = $this->paginate('Servico');
        $page = $this->params['form']['page'];
        $total = $this->Servico->find('count', array('conditions' => $conditions));
        $this->set(compact('servicos', 'page', 'total'));
    }

    function preencheCombo($pessoa_id = null) {
        $this->layout = 'ajax';
        $this->autoRender = false;
        if ($pessoa_id == null)
            $pessoa = $this->Servico->find('list');
        else
            $pessoa = $this->Servico->find('list', array('conditions' => array('Servico.pessoa_id' => $pessoa_id)));
        echo '<option value="">Selecione o Servico</option>';
        foreach ($pessoa as $key => $value)
            echo '<option value="' . $key . '">' . $value . '</option>';
    }

    function excluir($id, $novo_servico = null) {
        if (!empty($id)) {
            $this->Servico->delete($id);
            $this->Session->setFlash('O servico com código: ' . $id . ' foi excluído.');
            $this->redirect(array('controller' => $this->name, 'action' => 'index'));
        } else {
            $this->Session->setFlash('Erro ao tentar excluir: código inexistente!');
            $this->redirect(array('controller' => $this->name, 'action' => 'index'));
        }
    }

}
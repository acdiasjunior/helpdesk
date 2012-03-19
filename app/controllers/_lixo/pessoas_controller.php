<?php

class PessoasController extends AppController {

    var $name = 'Pessoas';
    var $helpers = array('Javascript', 'Js');
    var $components = array('RequestHandler');

    function index() {

    }

    function lista() {
        $this->layout = 'ajax';

        $this->Pessoa->recursive = 0;

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
        $pessoas = $this->paginate('Pessoa');
        $page = $this->params['form']['page'];
        $total = $this->Pessoa->find('count', array('conditions' => $conditions));
        $this->set(compact('pessoas', 'page', 'total'));
    }

    function listaNomes() {
        $options = array(
            'conditions' => array(
                'Pessoa.nome LIKE ' => '%' . str_replace(' ', '%', $this->params['form']['term']) . '%'
            )
        );
        $nomes = $this->Pessoa->find('list', $options);
        $this->set(compact('nomes'));
        $this->render('lista_nomes');
    }

    function listaNomesResponsavel() {
        $options = array(
            'conditions' => array(
                'Pessoa.responsavel_id IS NULL',
                'Pessoa.nome LIKE ' => '%' . str_replace(' ', '%', $this->params['form']['term']) . '%'
            )
        );
        $nomes = $this->Pessoa->find('list', $options);
        $this->set(compact('nomes'));
        $this->layout = 'ajax';
        $this->render('lista_nomes');
    }

    function listaNomesConjuge($sexo) {
        $options = array(
            'conditions' => array(
                'Pessoa.conjuge_id IS NULL',
                'Pessoa.sexo !=' => $sexo,
                'Pessoa.nome LIKE ' => '%' . str_replace(' ', '%', $this->params['form']['term']) . '%'
            )
        );
        $nomes = $this->Pessoa->find('list', $options);
        $this->set(compact('nomes'));
        $this->layout = 'ajax';
        $this->render('lista_nomes');
    }

    function listaMembros($responsavel_nis) {

        $this->layout = 'ajax';

        $conditions = array('Pessoa.responsavel_nis =' => $responsavel_nis, 'Pessoa.responsavel_nis != Pessoa.nis');

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
        $membros = $this->paginate('Pessoa');
        $page = $this->params['form']['page'];
        $total = $this->Pessoa->find('count', array('conditions' => $conditions));
        $this->set(compact('membros', 'page', 'total'));
    }

    function listaPessoasDomicilio($codigo_domiciliar) {
        $this->layout = 'ajax';

        $conditions = array('Pessoa.codigo_domiciliar =' => $codigo_domiciliar);
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
        $pessoas = $this->paginate('Pessoa');
        $page = $this->params['form']['page'];
        $total = $this->Pessoa->find('count', array('conditions' => $conditions));
        $this->set(compact('pessoas', 'page', 'total'));
    }

    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Pessoa->read();
            $responsavel = count($this->data['Membro']);
            $this->set(compact('responsavel'));
        } else {
            $id = $this->data['Pessoa']['id'];
            $this->Pessoa->id = $this->data['Pessoa']['id'];
            $conjuge_id = $this->Pessoa->field('conjuge_id');
            if ($id != null && $conjuge_id != null) {
                $this->Pessoa->save(array(
                    'Pessoa' => array(
                        'id' => $conjuge_id,
                        'conjuge_id' => null,
                        'estado_civil' => Pessoa::ESTADO_CIVIL_SOLTEIRO
                    )
                ));
            }
            if ($this->Pessoa->save($this->data)) {
                if ($this->data['Profissao']['descricao'] != null) {
                    $this->loadModel('Profissao');
                    $this->Profissao->save(array(
                        'id' => $this->data['Pessoa']['profissao_id'],
                        'descricao' => $this->data['Profissao']['descricao']
                    ));
                }
                if ($this->data['Pessoa']['conjuge_id'] != null) {
                    $this->Pessoa->save(array(
                        'id' => $this->data['Pessoa']['conjuge_id'],
                        'conjuge_id' => $this->Pessoa->id,
                        'estado_civil' => $this->data['Pessoa']['estado_civil']
                    ));
                }
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

    function excluir($id) {
        if (!empty($id)) {
            if ($this->Pessoa->Locacao->findAllByPessoaId($id)) {

                $this->Session->setFlash('Não foi possível excluir o cliente.<br />Existem pedidos associados.');
            } else {

                $this->Pessoa->delete($id);

                App::import('Model', 'Condutor');
                $this->Condutor = new Condutor();
                $this->Condutor->delete($id);

                $this->Session->setFlash('O cliente com código: ' . $id . ' foi excluído.');
            }
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Erro ao tentar excluir: código inexistente!');
            $this->redirect(array('action' => 'index'));
        }
    }

    function importar($arquivo = null) {
        if (empty($this->data)) {
            //Abre a tela de importação
        } else {

            if ($this->isUploadedFile($this->data['Pessoa']['arquivo'])) {

                $colunas_simples = array(
                    'NOME PESSOA' => 'nome',
                    'NIS' => 'nis',
                    'DT NASCIMENTO' => 'data_nascimento',
                    'CPF' => 'cpf',
                    'TITULO ELEITOR' => 'titulo_eleitor',
                    'ZONA' => 'zona',
                    'SESSAO' => 'sessao',
                    'OCUPACAO' => 'ocupacao',
                    'INEP' => 'inep',
                    'NIS RL' => 'responsavel_nis',
                    //Nome RL
                    'DT INCLUSAO PESSOA' => 'data_inclusao',
                    'RENDA INDIVIDUAL' => 'valor_renda',
                    'VALOR BENEFICIO' => 'valor_beneficio',
                    'COD DOM' => 'codigo_domiciliar',
                    //Tp Log
                    //Lograd
                    //Nº
                    //Comp
                    //CEP
                    //Cod Área
                    //Telefone
                    //Qt de Pessoas
                    'ULTIMA ATUALIZACAO' => 'data_atualizacao',
                    'ENTREVISTADOR/SITUACAO' => 'entrevistador',
                        //Dt Inclusão Domícilio
                        //Qt de Comôdos
                        //Região
                        //Bairro
                );
                $colunas_combinadas = array(
                    'SERIE ESCOLAR' => 'serie_escolar',
                    'TP DE TRABALHO' => 'tipo_trabalho',
                    'COR' => 'cor',
                    'EST CIVIL' => 'estado_civil',
                    'GRAU DE INSTRUCAO' => 'grau_instrucao',
                    'GENERO' => 'genero',
                    'FREQUENTA ESCOLA' => 'frequenta_escola',
                );
                $combinacoes = array(
                    'SERIE ESCOLAR' => $this->Pessoa->serieEscolar(),
                    'TP DE TRABALHO' => $this->Pessoa->tipoTrabalho(),
                    'COR' => $this->Pessoa->cor(),
                    'EST CIVIL' => $this->Pessoa->estadoCivil(),
                    'GRAU DE INSTRUCAO' => $this->Pessoa->grauInstrucao(),
                    'GENERO' => $this->Pessoa->genero(),
                    'FREQUENTA ESCOLA' => $this->Pessoa->frequentaEscola(),
                );

                $handle = fopen($this->data['Pessoa']['arquivo']['tmp_name'], "r");
                $header = fgetcsv($handle, 0, ';');

                foreach ($header as $key => $value) {
                    $value = strtoupper(Inflector::slug(utf8_encode($value), ' '));
                    $header[$key] = $value;
                }

                while (($row = fgetcsv($handle, 0, ';')) !== FALSE) {

                    set_time_limit(1);

                    $this->data = array();

                    foreach ($header as $key => $value) {

                        if ($value == 'DT NASCIMENTO' || $value == 'DT INCLUSAO PESSOA' || $value == 'ULTIMA ATUALIZACAO') {
                            if ($row[$key] == '1899-12-30 00:00:00')
                                $row[$key] = null;
                            $row[$key] = (strtotime($row[$key]) !== false) ? date('d/m/Y', strtotime($row[$key])) : '';
                        }

                        if (array_key_exists($value, $colunas_simples)) {
                            $this->data['Pessoa'][$colunas_simples[$value]] = $row[$key];
                        } else if (array_key_exists($value, $colunas_combinadas)) {
                            $row[$key] = utf8_encode($row[$key]);
                            $this->data['Pessoa'][$colunas_combinadas[$value]] = array_search($row[$key], $combinacoes[$value]);
                        }
                    }

                    $this->Pessoa->create();
                    $this->Pessoa->set($this->data);

                    if (!empty($this->data['Pessoa']['nis'])) {
                        if (!$this->Pessoa->validates()) {
                            echo 'Erro na validação de um registro!<br>Nis:' . $this->data['Pessoa']['nis'] . '<br>';
                        } else if (!$this->Pessoa->save($this->data, false)) {
                            echo '<pre>';
                            print_r($this->data);
                            echo '</pre><br>';
                            die('Erro ao gravar o registro!');
                        }
                    }
                }

                // close the file
                fclose($handle);

                $this->Session->setFlash('Todos os registros foram importados!');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash("Upload do arquivo falhou!");
            }
        }
    }

    

//    function listaPersonalizada() {
//        $options = array(
//            'recursive' => -1,
//            'fields' => array(
//                'Pessoa.codigo_domiciliar',
//                'Pessoa.nis',
//            ),
//            'order' => array(
//                'Pessoa.codigo_domiciliar',
//            ),
//        );
//        $pessoas = $this->Pessoa->find('all', $options);
//        foreach($pessoas as $pessoa) {
//
//        }
//        var_dump();
//        die();
//    }
//    function listaPersonalizada() {
//        //pessoas com 17 ou mais concluindo ou já concluiu ensino medio
//        //só as que estão com IDF abaixo de 0.6
//        $options['joins'] = array(
//            array('table' => 'indices',
//                'alias' => 'Indice',
//                'type' => 'RIGHT',
//                'conditions' => array(
//                    'Indice.codigo_domiciliar = Pessoa.codigo_domiciliar',
//                )
//            )
//        );
//        $options['conditions'] = array(
//            'Indice.indice <=' => 0.6,
//            'Pessoa.grau_instrucao >=' => Pessoa::ESCOLARIDADE_MEDIO_INCOMPLETO,
//            'Pessoa.idade >=' => 17
//        );
//        echo $this->Pessoa->find('count', $options);
//        die();
//    }

    function faixas() {
        $idade = "(YEAR(CURDATE())-YEAR(Pessoa.data_nascimento))-(RIGHT(CURDATE(),5)<RIGHT(Pessoa.data_nascimento,5))";
        $options = array(
            'recursive' => -1,
            'joins' => array(
                array('table' => 'faixas_etarias',
                    'alias' => 'FaixasEtaria',
                    'type' => 'INNER',
                    'conditions' => array(
                        'CASE WHEN ' . $idade . ' > 80 THEN FaixasEtaria.idade = 80 ELSE FaixasEtaria.idade = ' . $idade . 'END',
                    )
                ),
                array('table' => 'domicilios',
                    'alias' => 'Domicilio',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Pessoa.codigo_domiciliar = Domicilio.codigo_domiciliar',
                    )
                ),
            ),
            'fields' => array(
                'COUNT(FaixasEtaria.id) AS total',
                'Pessoa.tipo_trabalho',
                'FaixasEtaria.descricao',
            ),
            'conditions' => array(
            ),
            'group' => array(
                'Pessoa.tipo_trabalho',
                'FaixasEtaria.descricao',
            ),
            'order' => array(
                'FaixasEtaria.idade',
            ),
        );
        $inicio = microtime(true);
        $pessoas = $this->Pessoa->find('all', $options);

        $faixaEtaria['tempo'] = microtime(true) - $inicio;
        $faixaEtaria['total'] = $this->Pessoa->find('count', array('conditions' => array('Domicilio.pessoa_count > 0')));
        foreach ($pessoas as $faixa) {
            $faixaEtaria[$faixa['FaixasEtaria']['descricao']][$faixa['Pessoa']['tipo_trabalho']] = $faixa[0]['total'];
        }

        echo '<pre>';
        print_r($faixaEtaria);
        echo '</pre>';

//        echo 'Tempo total de processamento: ' . (microtime(true) - $inicio) . '<br /><br />';
//
//        echo '<table border="1" cellspace="0">';
//        echo '<tr>';
//        echo '<td>Pessoas<td>';
//        echo '<td>Tipo de Trabalho<td>';
//        echo '<td>Faixa Etária<td>';
//        echo '</tr>';
//        foreach ($pessoas as $faixa) {
//            echo '<tr>';
//            echo '<td>' . $faixa[0]['total'] . '<td>';
//            echo '<td>' . $faixa['Pessoa']['tipo_trabalho'] . ' - ' . Pessoa::tipoTrabalho($faixa['Pessoa']['tipo_trabalho']) . '<td>';
//            echo '<td>' . $faixa['FaixasEtaria']['descricao'] . '<td>';
//            echo '</tr>';
//        }
        die();
    }

}
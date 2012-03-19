<?php

class SituacoesController extends AppController {

    var $name = 'Situacoes';
    var $helpers = array('Javascript', 'Js');
    var $components = array('RequestHandler');

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
        $situacoes = $this->paginate('Situacao');
        $page = $this->params['form']['page'];
        $total = count($this->Situacao->find('all', array('conditions' => $conditions)));
        $this->set(compact('situacoes', 'page', 'total'));
    }

    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Situacao->read();
        } else {
            if ($this->Situacao->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

    function excluir($id) {
        if (!empty($id)) {
            if ($this->Condutor->Locacao->findAllByCondutorId($id)) {
                
                $this->Session->setFlash('Não foi possível excluir o cliente.<br />Existem pedidos associados.');
                
            } else {
                
                $this->Condutor->delete($id);
                
                App::import('Model', 'Condutor');
                $this->Condutor = new Condutor();
                $this->Condutor->delete($id);
                
                $this->Session->setFlash('O cliente com código: ' . $id . ' foi excluído.');
                
            }
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Erro ao tentar excluir: código inexistente!');
            $this->redirect(array('controller' => $this->name, 'action' => 'index'));
        }
    }

}
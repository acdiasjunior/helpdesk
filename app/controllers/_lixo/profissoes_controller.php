<?php

class ProfissoesController extends AppController {

    var $name = 'Profissoes';
    var $helpers = array('Javascript', 'Js');
    var $components = array('RequestHandler');

    function index() {

    }

    function lista() {
        $this->layout = 'ajax';
        $this->Familiar->recursive = 2;

        if($this->params['form']['query'] != '')
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
        $profissoes = $this->paginate('Profissao');
        $page = $this->params['form']['page'];
        $total = count($this->Profissao->find('all', array('conditions' => $conditions)));
        $this->set(compact('profissoes', 'page', 'total'));
    }
    
    function listaProfissoes() {
        $this->layout = 'ajax';
        $options = array(
            'conditions' => array(
                'Profissao.descricao LIKE ' => '%' . str_replace(' ', '%', $this->params['form']['term']) . '%'
            )
        );
        $profissoes = $this->Profissao->find('list', $options);
        $this->set(compact('profissoes'));
    }
    
    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Profissao->read();
        } else {
            if ($this->Profissao->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

    function excluir($id) {
        if (!empty($id)) {
            $this->Profissao->delete($id);
            $this->Session->setFlash('A profissão com id: ' . $id . ' foi excluído.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Erro ao tentar excluir: ID inexistente!');
            $this->redirect(array('action' => 'index'));
        }
    }

}
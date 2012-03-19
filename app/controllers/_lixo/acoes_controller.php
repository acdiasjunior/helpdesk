<?php

class AcoesController extends AppController {

    var $name = 'Acoes';

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

        $acoes = $this->paginate('Acao');
        $page = $this->params['form']['page'];
        $total = $this->Acao->find('count', array('conditions' => $conditions));
        $this->set(compact('acoes', 'page', 'total'));
    }

    function listaAcoes() {
        $this->data = $this->Acao->find('all');
    }

    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Acao->read();
        } else {
            if ($this->Acao->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

    function autoComplete($campo = null) {
        $this->layout = 'ajax';
        if ($campo != null) {
            $this->Acao->displayField = $campo;
            $nomes = $this->Acao->find('list', array('conditions' => array('Acao.' . $campo . ' LIKE ' => '%' . str_replace(' ', '%', $this->params['form']['term']) . '%'), 'group' => array($campo)));
        } else {
            $nomes = array();
        }
        $this->set(compact('nomes'));
    }

}
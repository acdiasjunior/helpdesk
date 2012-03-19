<?php

class RegioesController extends AppController {

    var $name = 'Regioes';
    
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
      
        $regioes = $this->paginate('Regiao');
        $page = $this->params['form']['page'];
        $total = $this->Regiao->find('count', array('conditions' => $conditions));
        $this->set(compact('regioes', 'page', 'total'));
    }
    
    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Regiao->read();
        } else {
            if ($this->Regiao->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

}
<?php

class IndicadoresController extends AppController {

    var $name = 'Indicadores';
    
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
      
        $indicadores = $this->paginate('Indicador');
        $page = $this->params['form']['page'];
        $total = $this->Indicador->find('count', array('conditions' => $conditions));
        $this->set(compact('indicadores', 'page', 'total'));
    }
    
    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Indicador->read();
        } else {
            if ($this->Indicador->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

}
<?php

class EstrategiasController extends AppController {

    var $name = 'Estrategias';

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

        $estrategias = $this->paginate('Estrategia');
        $page = $this->params['form']['page'];
        $total = $this->Estrategia->find('count', array('conditions' => $conditions));
        $this->set(compact('estrategias', 'page', 'total'));
    }

    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Estrategia->read();
            $this->Estrategia->Indicador->displayField = array("%s - %s", "{n}.Indicador.codigo", "{n}.Indicador.label");
        } else {
            if ($this->Estrategia->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

}
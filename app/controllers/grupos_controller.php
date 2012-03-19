<?php

class GruposController extends AppController {

    var $name = 'Grupos';

    function admin_index() {
        
    }

    function admin_lista() {
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

        $grupos = $this->paginate('Grupo');
        $page = $this->params['form']['page'];
        $total = $this->Grupo->find('count', array('conditions' => $conditions));
        $this->set(compact('grupos', 'page', 'total'));
    }

    function admin_incluir() {
        if (!empty($this->data)) {
            if ($this->Grupo->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
            }
            $this->redirect(array('controller' => $this->name, 'action' => 'index'));
        }
        $this->render('admin_cadastro');
    }

    function admin_editar($id = null) {
        if (empty($this->data)) {
            if (is_null($id))
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            $this->data = $this->Grupo->read();
        } else {
            if ($this->Grupo->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
        $this->render('admin_cadastro');
    }

    function admin_excluir($id) {
        if (!empty($id)) {
            $this->Grupo->delete($id);
            $this->Session->setFlash('O grupo com id: ' . $id . ' foi excluído.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Erro ao tentar excluir: ID inexistente!');
            $this->redirect(array('action' => 'index'));
        }
    }

}
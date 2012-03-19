<?php

class SubcategoriasController extends AppController {

    var $name = 'Subcategorias';

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

        $subcategorias = $this->paginate('Subcategoria');
        $page = $this->params['form']['page'];
        $total = $this->Subcategoria->find('count', array('conditions' => $conditions));
        $this->set(compact('subcategorias', 'page', 'total'));
    }

    function admin_incluir() {
        if (!empty($this->data)) {
            if ($this->Subcategoria->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            } else {
                $this->Session->setFlash('Erro ao cadastrar nova subcategoria!');
            }
        }
        $this->render('admin_cadastro');
    }

    function admin_editar($id = null) {
        if (empty($this->data)) {
            if (is_null($id))
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            $this->data = $this->Subcategoria->read();
        } else {
            if ($this->Subcategoria->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
        $this->render('admin_cadastro');
    }

    function admin_excluir($id) {
        if (!empty($id)) {
            $this->Subcategoria->delete($id);
            $this->Session->setFlash('A subcategoria com id: ' . $id . ' foi excluída.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Erro ao tentar excluir: ID inexistente!');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    function listaSubcategorias($categoria_id = null) {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $subcategorias = $this->Subcategoria->find('list', array('conditions' => array('Subcategoria.categoria_id' => $categoria_id)));
        foreach ($subcategorias as $key => $value)
            echo '<option value="' . $key . '">' . $value . '</option>';
    }

}
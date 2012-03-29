<?php

class UsuariosController extends AppController {

    var $name = 'Usuarios';

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

        $usuarios = $this->paginate('Usuario');
        $page = $this->params['form']['page'];
        $total = $this->Usuario->find('count', array('conditions' => $conditions));
        $this->set(compact('usuarios', 'page', 'total'));
    }

    function admin_cadastro($id = null) {
        if (empty($this->data)) {
            if ($id == null && $this->Session->read('Auth.Usuario.id') != 1)
                $id = $this->Session->read('Auth.Usuario.id');
            if ($id == 1) {
                $this->Session->setFlash('Alteração do Usuário Admistrador desabilitada!');
                $this->redirect(array('controller' => 'pages'));
            }
            if ($id != $this->Session->read('Auth.Usuario.id') && $this->Session->read('Auth.Usuario.id') != 1) {
                $this->Session->setFlash('Somente o Administrador pode alterar os outros cadastros.');
                $this->redirect(array('controller' => 'pages'));
            }
            $this->Usuario->id = $id;
            $this->data = $this->Usuario->read();
        } else {
            $this->beforeSave();
            if ($this->Usuario->save($this->data)) {
                if ($this->Session->read('Auth.Usuario.id') == 1)
                    $this->redirect(array('controller' => $this->name, 'action' => 'index'));
                else
                    $this->redirect(array('controller' => 'pages'));
            }
        }
    }

    function admin_incluir() {
        if (!empty($this->data)) {
            if ($this->Usuario->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index', 'admin' => true));
            }
        }
        $this->render('admin_cadastro');
    }

    function admin_editar($id = null) {
        if (empty($this->data)) {
            if (is_null($id))
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            $this->data = $this->Usuario->read();
        } else {
            if ($this->Usuario->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
        $this->render('admin_cadastro');
    }

    function admin_excluir($id) {
        if ($this->Session->read('Auth.Usuario.tipo_usuario') != Usuario::TIPO_ADMINISTRADOR) {
            $this->Session->setFlash('Somente administradores podem<br />excluir usuários!');
            $this->redirect(array('controller' => 'pages'));
        } else {
            if (!empty($id)) {
                if ($this->Usuario->Chamado->find('count', array('conditions' => array('usuario_id' => $id))) > 0) {
                    $this->Session->setFlash('Não foi possível excluir!<br />Existem chamados abertos para este usuário.');
                    $this->redirect(array('action' => 'admin_index'));
                }
                if ($this->Usuario->delete($id)) {
                    $this->Session->setFlash('O usuario com id: ' . $id . ' foi excluído.');
                } else {
                    $this->Session->setFlash('Ocorreu um erro ao excluir o usuário!');
                }
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->Session->setFlash('Erro ao tentar excluir: ID inexistente!');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function login() {
        //$this->set('pass', $this->Auth->password('123456'));
        if (!empty($this->data) && $this->Auth->user()) {
            $this->Usuario->Acesso->create();
            $this->Usuario->Acesso->set('usuario_id', $this->Session->read('Auth.Usuario.id'));
            $this->Usuario->Acesso->set('login', date('Y-m-d H:i:s'));
            $this->Usuario->Acesso->set('ip', $this->RequestHandler->getClientIP());
            $this->Usuario->Acesso->save();
            $this->redirect($this->Auth->redirect());
        }
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }

    function mudarSenha() {
        if (!empty($this->data['Usuario']['nova_senha'])) {
            $this->Usuario->id = $this->Session->read('Auth.Usuario.id');
            $this->Usuario->set('password', $this->Auth->password($this->data['Usuario']['nova_senha']));
            if ($this->Usuario->save($this->data))
                $this->Session->setFlash('Senha alterada!');
            else
                $this->Session->setFlash('Erro ao gravar a nova senha!');
            $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }
    }

    function gravaParametros() {
        $this->autoRender = false;
        foreach ($this->params['form'] as $key => $value) {
            $$key = $value;
        }
        $this->Session->write("$controller.$action.flexigrid.page", $page);
        $this->Session->write("$controller.$action.flexigrid.sortname", $sortname);
        $this->Session->write("$controller.$action.flexigrid.sortorder", $sortorder);
        $this->Session->write("$controller.$action.flexigrid.rp", $rp);
        $this->Session->write("$controller.$action.flexigrid.query", $query);
        $this->Session->write("$controller.$action.flexigrid.qtype", $qtype);
    }

    function beforeFilter() {
        $this->Auth->autoRedirect = false;
        // executa o beforeFilter do AppController
        parent::beforeFilter();
        // adicione ao método allow as actions que quer permitir sem o usuário estar logado
        $this->Auth->allow(array('login', 'logout'));
    }

    function beforeSave() {
        if (!empty($this->data['Usuario']['passwd'])) {
            $this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['passwd']);
        }
        return true;
    }

}

<?php

class AppController extends Controller {

    var $components = array('Session', 'Auth', 'RequestHandler');
    var $helpers = array('Javascript', 'Js', 'Session', 'Html', 'Form', 'Formatacao');

    function __construct() {
        parent::__construct();
    }

    function _populateLookups($models = array()) {
        if (empty($models)) {
            $rootModel = $this->{$this->modelClass};
            foreach ($rootModel->belongsTo as $model => $attr) {
                $models[] = $model;
            }
            foreach ($rootModel->hasAndBelongsToMany as $model => $attr) {
                $models[] = $model;
            }
        }
        foreach ($models as $model) {
            $name = Inflector::variable(Inflector::pluralize($model));
            $this->set($name, $rootModel->{$model}->find("list"));
        }
    }

    function beforeRender() {
        $tipo_usuario = Usuario::TIPO_USUARIO;
        $usuario_tipo = $this->Session->read('Auth.Usuario.tipo_usuario');
        if (isset($this->params['admin']) && $this->params['admin'] && $this->Session->read('Auth.Usuario.tipo_usuario') == Usuario::TIPO_USUARIO) {
            $this->Session->setFlash('Desculpe, somente administradores podem acessar esta área.');
            $this->redirect(array('admin' => false, 'controller' => 'pages', 'action' => 'display'));
        }
        $this->disableCache();
        switch ($this->action) {
            case 'abrir':
            case 'cadastro':
            case 'editar':
            case 'incluir':
            case 'admin_abrir':
            case 'admin_cadastro':
            case 'admin_editar':
            case 'admin_incluir':
                $this->_populateLookups();
                break;
        }
    }

    function beforeFilter() {
        Security::setHash('sha256'); // substitua pelo hash que está usando
        $this->Auth->userModel = 'Usuario'; // nome do seu modelo de usuario
        $this->Auth->authorize = 'controller';
        $this->Auth->autoRedirect = false; // auto redirecionar
        $this->Auth->loginAction = array('admin' => false, 'controller' => 'usuarios', 'action' => 'login'); // controlador e action de login
        $this->Auth->loginRedirect = ('/'); // controlador e action para enviar o usuario que entrou
        $this->Auth->logoutRedirect = array('admin' => false, 'controller' => 'usuarios', 'action' => 'login');
        $this->Auth->loginError = "Login inválido."; // mensagem de erro
        $this->Auth->authError = "Área restrita, por favor faça o login."; // mensagem de acesso restrito
    }

    function isAuthorized() {
        return true;
    }

    function isUploadedFile($file) {
        if ((isset($file['error']) && $file['error'] == 0) ||
                (!empty($file['tmp_name']) && $file['tmp_name'] != 'none')) {
            return is_uploaded_file($file['tmp_name']);
        }
        return false;
    }

    /**
     * Post Model
     *
     * @var Post
     */
    var $Post;

    /**
     * User Model
     *
     * @var User
     */
    var $User;

    /**
     * Group Model
     *
     * @var Group
     */
    var $Group;

    /**
     * AuthComponent
     *
     * @var AuthComponent
     */
    var $Auth;

    /**
     * SessionComponent
     *
     * @var SessionComponent
     */
    var $Session;

    /**
     * RequestHandlerComponent
     *
     * @var RequestHandlerComponent
     */
    var $RequestHandler;

}
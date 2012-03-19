<?php

class Usuario extends AppModel {

    var $name = 'Usuario';
    var $displayField = 'nome';
    var $belongsTo = array('Grupo');
    var $hasMany = array(
        'Acesso',
        'Chamado',
        'ChamadosInteracao'
    );
    var $actsAs = array('Containable');
    var $validate = array(
        'username' => array(
            'unico' => array(
                'rule' => array('isUnique'),
                'message' => 'Nome de login já existe'
            )
        ),
        'username' => array(
            'unico' => array(
                'rule' => array('isUnique'),
                'message' => 'Nome de login já existe'
            )
        ),
        'password' => array(
            'rule' => array('minLength', '6'),
            'message' => 'Senha deve conter ao menos 6 caracteres'
        ),
        'email' => array(
            'unico' => array(
                'rule' => array('isUnique'),
                'message' => 'Email ja cadastrado'
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Deve ser um email válido'
            ),
        ),
    );
    
    //////////////////////////// COMBOS BOXES

    /*
     * static enum: Model::function()
     * @access static
     */

    static function tipoUsuario($value = null) {
        $options = array(
            self::TIPO_ADMINISTRADOR => __('Administrador', true),
            self::TIPO_SUPORTE => __('Suporte', true),
            self::TIPO_USUARIO => __('Usuário', true),
        );
        return parent::enum($value, $options);
    }

    const TIPO_ADMINISTRADOR = 0;
    const TIPO_SUPORTE = 1;
    const TIPO_USUARIO = 2;
    
}
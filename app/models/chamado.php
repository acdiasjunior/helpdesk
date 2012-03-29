<?php

class Chamado extends AppModel {

    var $name = 'Chamado';
    var $belongsTo = array(
        'Subcategoria',
        'Usuario',
        'Responsavel' => array(
            'className' => 'Usuario',
            'foreignKey' => 'responsavel_id'
        )
    );
    var $hasMany = array('ChamadosInteracao');
    var $actsAs = array('DateFormatter', 'Containable');
    var $validate = array(
        'categoria_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Você deve selecionar uma categoria.'
        )
    );

    static function trocaVariaveis($dados, $body, $suporte = null) {
        $variaveis = array(
            '_CHAMADO_ID_' => $dados['Chamado']['id'],
            '_CHAMADO_INTERACAO_' => isset($dados['ChamadosInteracao']) ? $dados['ChamadosInteracao']['interacao'] : '',
            '_USUARIO_NOME_' => $dados['Usuario']['nome'],
            '_USUARIO_EMAIL_' => $dados['Usuario']['email'],
            '_USUARIO_GRUPO_' => $dados['Usuario']['Grupo']['nome'],
            '_CHAMADO_CATEGORIA_' => $dados['Subcategoria']['Categoria']['descricao'],
            '_CHAMADO_SUBCATEGORIA_' => $dados['Subcategoria']['descricao'],
            '_CHAMADO_ASSUNTO_' => $dados['Chamado']['assunto'],
            '_CHAMADO_TEXTO_' => $dados['Chamado']['texto'],
        );
        if (!is_null($suporte))
            $variaveis['_SUPORTE_NOME_'] = $suporte['Usuario']['nome'];
        $search = array_keys($variaveis);
        $replace = array_values($variaveis);
        $body = str_replace($search, $replace, $body);
        return $body;
    }

    //////////////////////////// COMBOS BOXES

    /*
     * static enum: Model::function()
     * @access static
     */

    static function statusChamado($value = null) {
        $options = array(
            self::STATUS_ABERTO => __('Aberto', true),
            self::STATUS_ANDAMENTO => __('Em andamento', true),
            self::STATUS_FECHADO => __('Fechado', true),
        );
        return parent::enum($value, $options);
    }

    const STATUS_ABERTO = 0;
    const STATUS_ANDAMENTO = 1;
    const STATUS_FECHADO = 2;
}
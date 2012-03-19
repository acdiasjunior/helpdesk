<?php

class Servico extends AppModel {

    var $name = 'Servico';
    var $displayField = 'descricao';
    var $hasAndBelongsToMany = array(
        'Pessoa' => array(
            'foreignKey' => 'servico_id',
            'associationForeignKey' => 'pessoa_nis',
        ),
    );

    //////////////////////////// COMBOS BOXES

    /*
     * static enum: Model::function()
     * @access static
     */

    static function tipoServico($value = null) {
        $options = array(
            self::SERVICO_PROTECAO_BASICA => __('Proteção Básica', true),
            self::SERVICO_PROTECAO_ESPECIAL_MEDIA => __('Proteção Especial - Média Complexidade', true),
            self::SERVICO_PROTECAO_ESPECIAL_ALTA => __('Proteção Especial - Alta Complexidade', true),
        );
        return parent::enum($value, $options);
    }

    const SERVICO_PROTECAO_BASICA = 1;
    const SERVICO_PROTECAO_ESPECIAL_MEDIA = 2;
    const SERVICO_PROTECAO_ESPECIAL_ALTA = 3;
}
<?php

class Subcategoria extends AppModel {

    var $name = 'Subcategoria';
    var $hasMany = array('Chamado');
    var $belongsTo = array('Categoria' => array('counterCache' => true));
    var $displayField = 'descricao';
    
    //////////////////////////// COMBOS BOXES

    /*
     * static enum: Model::function()
     * @access static
     */

    static function prioridadeChamado($value = null) {
        $options = array(
            self::PRIORIDADE_ALTA => __('Alta', true),
            self::PRIORIDADE_MEDIA => __('Média', true),
            self::PRIORIDADE_BAIXA => __('Baixa', true),
        );
        return parent::enum($value, $options);
    }

    const PRIORIDADE_ALTA = 0;
    const PRIORIDADE_MEDIA = 1;
    const PRIORIDADE_BAIXA = 2;
    
}
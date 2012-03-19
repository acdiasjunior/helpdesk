<?php

class Indicador extends AppModel {

    var $name = 'Indicador';
    var $displayField = array("%s - %s", "{n}.Indicador.codigo", "{n}.Indicador.descricao");
    var $belongsTo = array('Dimensao');
    var $hasAndBelongsToMany = array('Estrategia', 'Prontuario');
    
}
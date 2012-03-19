<?php

class Estrategia extends AppModel {

    var $name = 'Estrategia';
    var $displayField = array("%s - %s", "{n}.Estrategia.codigo", "{n}.Estrategia.descricao");
    var $hasMany = array('Acao');
    var $hasAndBelongsToMany = array('Indicador', 'Prontuario');

}
<?php

class Categoria extends AppModel {

    var $name = 'Categoria';
    var $hasMany = array('Subcategoria');
    var $hasAndBelongsToMany = array('Grupo');
    var $displayField = 'descricao';
    
}
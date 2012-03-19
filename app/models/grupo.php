<?php

class Grupo extends AppModel {

    var $name = 'Grupo';
    var $hasMany = array('Usuario');
    var $hasAndBelongsToMany = array('Categoria');
    var $displayField = 'nome';
    
}
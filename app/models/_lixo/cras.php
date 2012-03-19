<?php

class Cras extends AppModel {

    var $name = 'Cras';
    var $displayField = 'descricao';
    var $order = 'Cras.descricao';
    var $hasMany = array('Bairro', 'Domicilio');
    var $belongsTo = array('Bairro', 'Regiao');
    var $recursive = 0;

}
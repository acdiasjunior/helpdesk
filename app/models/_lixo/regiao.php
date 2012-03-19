<?php

class Regiao extends AppModel {

    var $name = 'Regiao';
    var $displayField = 'descricao';
    var $order = 'descricao';
    var $hasMany = array('Bairro', 'Domicilio');
    var $recursive = 0;

}
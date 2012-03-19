<?php

class Situacao extends AppModel {

    var $name = 'Situacao';
    var $displayField = 'descricao';
    //var $hasAndBelongsToMany = array('Pessoa');
    var $actsAs = array('DateFormatter');

}
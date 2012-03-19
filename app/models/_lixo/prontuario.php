<?php

class Prontuario extends AppModel {

    var $name = 'Prontuario';
    var $hasMany = array('Visita');
    var $belongsTo = array(
        'Domicilio' => array(
            'foreignKey' => 'codigo_domiciliar',
        ),
        'Indice' => array(
            'foreignKey' => 'codigo_domiciliar',
        ),
        'Usuario',
    );
    var $hasAndBelongsToMany = array('Estrategia', 'Indicador');
    var $actsAs = array('DateFormatter');

}
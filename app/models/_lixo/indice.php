<?php

class Indice extends AppModel {

    var $name = 'Indice';
    var $primaryKey = 'codigo_domiciliar';
    var $hasOne = array(
        'Domicilio' => array(
            'foreignKey' => 'codigo_domiciliar',
            'dependent' => false
        ),
    );
    var $hasMany = array(
        'Prontuario' => array(
            'foreignKey' => 'codigo_domiciliar',
        ),
        'IndicesHistorico' => array(
            'foreignKey' => 'codigo_domiciliar',
        ),
    );
    public $indicadores = array(
        1 => 'v1', 'v2', 'v3', 'v4', 'v5', 'v6', 'v7', 'v8', 'v9', 'c1', 'c2', 'c3',
        'c4', 'c5', 't1', 't2', 't3', 't4', 't5', 'r1', 'r2', 'r3', 'r4', 'r5',
        'r6', 'd1', 'd2', 'd3', 'd4', 'd5', 'd6', 'd7', 'd8', 'h1', 'h2', 'h3',
        'h4', 'h5', 'h6', 'h7', 'h8', 'v10', 'v11', 'v12',
    );
    public $dimensoes = array(
        'vulnerabilidade' => array(
            //'v1' => 1,
            //'v2' => 1,
            'v3' => 1,
            'v4' => 1,
            'v5' => 1,
            //'v6' => 1,
            'v7' => 1,
            //'v8' => 1,
            'v9' => 1,
        ),
        'conhecimento' => array(
            'c1' => 1,
            'c2' => 1,
            'c3' => 0,
            'c4' => 0,
            'c5' => 0,
        ),
        'trabalho' => array(
            't1' => 0,
            't2' => 0,
            't3' => 0,
            't4' => 0,
            't5' => 0,
        ),
        'recursos' => array(
            //'r1' => 1,
            'r2' => 1,
            //'r3' => 1,
            //'r4' => 1,
            'r5' => 1,
            'r6' => 1,
        ),
        'desenvolvimento' => array(
            'd1' => 1,
            'd2' => 1,
            'd3' => 1,
            'd4' => 1,
            'd5' => 1,
            'd6' => 1,
            'd7' => 1,
            'd8' => 1,
        ),
        'habitacao' => array(
            'h1' => 1,
            'h2' => 1,
            'h3' => 1,
            'h4' => 1,
            'h5' => 1,
            'h6' => 1,
            'h7' => 1,
            'h8' => 1,
        )
    );

}
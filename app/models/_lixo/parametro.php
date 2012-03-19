<?php

class Parametro extends AppModel {

    var $name = 'Parametro';
    var $hasMany = array('ParametrosUsuario');

}
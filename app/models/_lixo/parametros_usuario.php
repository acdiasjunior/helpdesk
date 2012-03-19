<?php

class ParametrosUsuario extends AppModel {

    var $name = 'ParametrosUsuario';
    var $belongsTo = array('Parametro', 'Usuario');

}
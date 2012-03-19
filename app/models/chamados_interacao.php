<?php

class ChamadosInteracao extends AppModel {

    var $name = 'ChamadosInteracao';
    var $belongsTo = array('Usuario', 'Chamado');
    var $actsAs = array('DateFormatter');

}
<?php

class EstrategiaIndicador extends AppModel {

    var $name = 'EstrategiaIndicador';
    var $useTable = 'estrategias_indicadores';
    var $belongsTo = array('Estrategia', 'Indicador');

}
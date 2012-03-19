<?php

class Bairro extends AppModel {

    var $name = 'Bairro';
    var $displayField = 'nome';
    var $order = 'nome';
    var $hasMany = array('Domicilio', 'Cras');
    var $belongsTo = array('Cras', 'Regiao');
    
    public function __construct($id=false, $table=null, $ds=null) {
        parent::__construct($id, $table, $ds);
        $this->virtualFields = array(
            'domicilio_count' => 'SELECT COUNT(*) FROM domicilios WHERE domicilios.bairro_id = Bairro.id'
        );
    }

}
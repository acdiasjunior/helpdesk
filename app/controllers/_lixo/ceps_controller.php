<?php

class CepsController extends AppController {

    var $name = 'Ceps';
    
    function consultaCep($cep)
    {
        $this->layout = 'ajax';
        $cep = Inflector::slug($cep, '');
        $this->set('data',$this->Cep->consulta($cep));
        $this->set('cep',$cep);
    }

}
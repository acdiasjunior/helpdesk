<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($pessoas as $pessoa)
{
//    if($pessoa['Pessoa']['nis'] == $pessoa['Responsavel']['nis']){
//        $pessoa['Responsavel']['nome'] = '';
//        $pessoa['Responsavel']['nis'] = '';
//    }
    $data['rows'][] = array(
        'id' => $pessoa['Pessoa']['nis'],
        'cell' => array(
            $pessoa['Pessoa']['nis'],
            $pessoa['Pessoa']['nome'],
            $pessoa['Pessoa']['idade'] . 'a ' . $pessoa['Pessoa']['meses'] . 'm',
            $pessoa['Responsavel']['nome'],
            $pessoa['Responsavel']['nis'],
        )
    );
}

echo json_encode($data);
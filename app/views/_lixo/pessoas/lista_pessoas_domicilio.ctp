<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($pessoas as $pessoa)
{
    $data['rows'][] = array(
        'id' => $pessoa['Pessoa']['nis'],
        'cell' => array(
            $pessoa['Pessoa']['nis'],
            $pessoa['Pessoa']['nome'],
            $pessoa['Pessoa']['idade'],
        )
    );
}

echo json_encode($data);
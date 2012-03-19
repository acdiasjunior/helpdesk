<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($membros as $membro)
{
    $data['rows'][] = array(
        'id' => $membro['Pessoa']['nis'],
        'cell' => array(
            $membro['Pessoa']['nis'],
            $membro['Pessoa']['nome'],
            $membro['Pessoa']['idade'],
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($estrategias as $estrategia)
{
    $data['rows'][] = array(
        'id' => $estrategia['Estrategia']['id'],
        'cell' => array(
            $estrategia['Estrategia']['id'],
            $estrategia['Estrategia']['codigo'],
            $estrategia['Estrategia']['descricao'],
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($grupos as $grupo)
{
    $data['rows'][] = array(
        'id' => $grupo['Grupo']['id'],
        'cell' => array(
            $grupo['Grupo']['id'],
            $grupo['Grupo']['nome'],
            $grupo['Grupo']['descricao'],
        )
    );
}

echo json_encode($data);
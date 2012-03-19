<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($bairros as $bairro)
{
    $data['rows'][] = array(
        'id' => $bairro['Bairro']['id'],
        'cell' => array(
            $bairro['Bairro']['id'],
            $bairro['Bairro']['nome'],
            $bairro['Bairro']['domicilio_count'],
        )
    );
}

echo json_encode($data);
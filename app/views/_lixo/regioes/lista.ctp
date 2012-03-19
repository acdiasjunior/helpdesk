<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($regioes as $regiao)
{
    $data['rows'][] = array(
        'id' => $regiao['Regiao']['id'],
        'cell' => array(
            $regiao['Regiao']['id'],
            $regiao['Regiao']['descricao'],
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($situacoes as $situacao)
{
    $data['rows'][] = array(
        'id' => $situacao['Situacao']['id'],
        'cell' => array(
            $situacao['Situacao']['id'],
            $situacao['Situacao']['descricao'],
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($acoes as $acao)
{
    $data['rows'][] = array(
        'id' => $acao['Acao']['id'],
        'cell' => array(
            $acao['Acao']['id'],
            $acao['Acao']['codigo'],
            $acao['Acao']['descricao'],
        )
    );
}

echo json_encode($data);
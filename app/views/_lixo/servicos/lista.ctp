<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($servicos as $servico)
{
    $data['rows'][] = array(
        'id' => $servico['Servico']['id'],
        'cell' => array(
            $servico['Servico']['id'],
             Servico::tipoServico($servico['Servico']['tipo_servico']),
            $servico['Servico']['descricao'],
            $servico['Servico']['faixa_etaria'],
            $servico['Servico']['capacidade'],
        )
    );
}

echo json_encode($data);
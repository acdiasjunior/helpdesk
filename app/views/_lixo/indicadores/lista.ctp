<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($indicadores as $indicador)
{
    $data['rows'][] = array(
        'id' => $indicador['Indicador']['id'],
        'cell' => array(
            $indicador['Indicador']['id'],
            $indicador['Dimensao']['descricao'],
            $indicador['Indicador']['codigo'],
            $indicador['Indicador']['descricao'],
            $indicador['Indicador']['label'],
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($prontuarios as $prontuario)
{
    $data['rows'][] = array(
        'id' => $prontuario['Prontuario']['id'],
        'cell' => array(
            $prontuario['Prontuario']['id'],
            str_pad($prontuario['Prontuario']['numero_prontuario'], 4, '0', STR_PAD_LEFT),
            $prontuario['Domicilio']['codigo_domiciliar'],
            round($prontuario['Indice']['idf'],2),
            $prontuario['Usuario']['nome'],
            date('d/m/Y H:i:s', strtotime($prontuario['Prontuario']['created'])),
        )
    );
}

echo json_encode($data);
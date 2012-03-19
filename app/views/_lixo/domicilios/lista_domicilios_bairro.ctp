<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($domicilios as $domicilio)
{
    $data['rows'][] = array(
        'id' => $domicilio['Domicilio']['codigo_domiciliar'],
        'cell' => array(
            $domicilio['Domicilio']['codigo_domiciliar'],
            $domicilio['Responsavel']['nome'],
            $domicilio['Domicilio']['logradouro'],
            $domicilio['Domicilio']['numero'],
            $domicilio['Domicilio']['pessoa_count'],
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($clientes as $cliente)
{
    $data['rows'][] = array(
        'id' => $cliente['Cliente']['id'],
        'cell' => array(
            $cliente['Cliente']['id'],
            AppModel::tiposPessoa($cliente['Cliente']['tipo']),
            $cliente['Cliente']['nome'],
            $cliente['Cliente']['cidade'],
            $cliente['Cliente']['uf'],
            $cliente['Cliente']['email'],
        )
    );
}

echo json_encode($data);
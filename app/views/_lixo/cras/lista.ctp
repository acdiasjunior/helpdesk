<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($cras as $cra)
{
    $data['rows'][] = array(
        'id' => $cra['Cras']['id'],
        'cell' => array(
            $cra['Cras']['id'],
            $cra['Cras']['descricao'],
            $cra['Cras']['logradouro'],
            $cra['Cras']['numero'],
            $cra['Bairro']['nome'],
            $cra['Cras']['cidade'],
            $cra['Cras']['uf'],
            $cra['Regiao']['descricao'],
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($profissoes as $profissao)
{
    $data['rows'][] = array(
        'id' => $profissao['Profissao']['id'],
        'cell' => array(
            $profissao['Profissao']['id'],
            $profissao['Profissao']['descricao'],
        )
    );
}

echo json_encode($data);
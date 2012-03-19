<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($chamados as $chamado)
{
    $data['rows'][] = array(
        'id' => $chamado['Chamado']['id'],
        'cell' => array(
            $chamado['Chamado']['id'],
            empty($chamado['Responsavel']['nome']) ? 'Não atribuído' : $chamado['Responsavel']['nome'],
            $chamado['Subcategoria']['Categoria']['descricao'] . ' - ' . $chamado['Subcategoria']['descricao'],
            Chamado::statusChamado($chamado['Chamado']['status']),
        )
    );
}

echo json_encode($data);
<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($subcategorias as $subcategoria)
{
    $data['rows'][] = array(
        'id' => $subcategoria['Subcategoria']['id'],
        'cell' => array(
            $subcategoria['Subcategoria']['id'],
            $subcategoria['Categoria']['descricao'],
            $subcategoria['Subcategoria']['descricao'],
            Subcategoria::prioridadeChamado($subcategoria['Subcategoria']['prioridade']),
            $subcategoria['Subcategoria']['tma'],
        )
    );
}

echo json_encode($data);
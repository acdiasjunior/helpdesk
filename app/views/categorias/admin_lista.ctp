<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($categorias as $categoria)
{
    $data['rows'][] = array(
        'id' => $categoria['Categoria']['id'],
        'cell' => array(
            $categoria['Categoria']['id'],
            $categoria['Categoria']['descricao'],
            (int) $categoria['Categoria']['subcategoria_count'],
        )
    );
}

echo json_encode($data);
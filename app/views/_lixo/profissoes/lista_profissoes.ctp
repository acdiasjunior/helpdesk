<?php

$data = array();

foreach($profissoes as $id => $descricao)
{
    $data[] = array(
        'id' => $id,
        'value' => $descricao,
    );
}

echo json_encode($data);
<?php

$data = array();

foreach($nomes as $id => $nome)
{
    $data[] = array(
        'id' => $id,
        'value' => $nome,
    );
}

echo json_encode($data);
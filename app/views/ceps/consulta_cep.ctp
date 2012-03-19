<?php

$retorno = array();

if (!isset($data[1])) {
    $retorno['alerta'] = $data[0];
} else {
    $retorno['alerta'] = '';
    $retorno['logradouro'] = $data[0];
    $retorno['bairro'] = $data[1];
    $retorno['cidade'] = $data[2];
    $retorno['uf'] = $data[3];
    $retorno['codibge'] = $data[4];
}

echo json_encode($retorno);
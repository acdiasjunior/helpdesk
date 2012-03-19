<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($usuarios as $usuario)
{
    $data['rows'][] = array(
        'cell' => array(
            $usuario['Usuario']['id'],
            $usuario['Usuario']['nome'],
            $usuario['Usuario']['username'],
            $usuario['Usuario']['email'],
            $usuario['Grupo']['nome'],
            Usuario::tipoUsuario($usuario['Usuario']['tipo_usuario']),
        )
    );
}

echo json_encode($data);
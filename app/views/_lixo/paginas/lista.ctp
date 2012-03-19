<?php

$data = array();
$data['page'] = $page;
$data['total'] = $total;
$data['rows'] = array();

foreach($paginas as $pagina)
{
    $data['rows'][] = array(
        'id' => $pagina['Page']['id'],
        'cell' => array(
            $pagina['Page']['id'],
            $pagina['Page']['link'],
            $pagina['Page']['titulo'],
        )
    );
}

echo json_encode($data);
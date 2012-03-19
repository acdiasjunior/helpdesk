<?php

class RelatoriosController extends AppController {

    var $name = 'Relatorios';
    var $uses = array('Pessoa', 'Domicilio', 'Indice');
    var $helpers = array('Javascript', 'Js');
    var $components = array('RequestHandler');
    var $pessoa_count = '(SELECT COUNT(*) FROM pessoas WHERE `pessoas`.`codigo_domiciliar` = `Domicilio`.`codigo_domiciliar`)';

    function index() {
        $this->redirect(array('controller' => 'pages', 'action' => 'display'));
    }

    function mapaIdfCsv() {
        set_time_limit(0);

        $this->autoRender = false;

        $file['name'] = 'mapaIDF.csv';
        $file['tmp'] = TMP . substr(md5(microtime()), 0, 10);

        header('Content-type: text/csv');
        header('Content-Disposition: attachment;filename="' . $file['name'] . '"');
        header('Cache-Control: max-age=0');
        flush();

        $fw = fopen($file['tmp'], 'w');
        if ($fw != false) {
            $fr = fopen($file['tmp'], "r");
            if ($fr !== false) {
                $linha[] = 'COD DOMICILIO';
                $linha[] = 'IDF';
                $linha[] = 'VULNERABILIDADE';
                $linha[] = 'CONHECIMENTO';
                $linha[] = 'TRABALHO';
                $linha[] = 'RECURSOS';
                $linha[] = 'DESENVOLVIMENTO';
                $linha[] = 'HABITACAO';
                $linha[] = 'RESPONSAVEL LEGAL';
                $linha[] = 'NIS RL';
                $linha[] = 'TIPO LOG.';
                $linha[] = 'LOGRADOURO';
                $linha[] = 'NUMERO';
                $linha[] = 'COMPLEMENTO';
                $linha[] = 'BAIRRO';

                $size = fputcsv($fw, $linha, ';');

                $this->loadModel('Domicilio');
                $this->Domicilio->recursive = 0;
                $domicilios = $this->Domicilio->find('all', array(
                    'conditions' => array(
                        $this->pessoa_count . ' > 0',
                    ),
                    'fields' => array(
                        'Domicilio.codigo_domiciliar',
                        'Indice.idf',
                        'Indice.vulnerabilidade',
                        'Indice.conhecimento',
                        'Indice.trabalho',
                        'Indice.recursos',
                        'Indice.desenvolvimento',
                        'Indice.habitacao',
                        'Responsavel.nome',
                        'Responsavel.nis',
                        'Domicilio.tipo_logradouro',
                        'Domicilio.logradouro',
                        'Domicilio.numero',
                        'Domicilio.complemento',
                        'Bairro.nome',
                    ),
                        )
                );
                
                foreach ($domicilios as $domicilio) {

                    print fread($fr, $size);
                    flush();

                    $linha = array();

                    $linha[] = $domicilio['Domicilio']['codigo_domiciliar'];
                    $linha[] = number_format($domicilio['Indice']['idf'], 2, ',', '.');
                    $linha[] = number_format($domicilio['Indice']['vulnerabilidade'], 2, ',', '.');
                    $linha[] = number_format($domicilio['Indice']['conhecimento'], 2, ',', '.');
                    $linha[] = number_format($domicilio['Indice']['trabalho'], 2, ',', '.');
                    $linha[] = number_format($domicilio['Indice']['recursos'], 2, ',', '.');
                    $linha[] = number_format($domicilio['Indice']['desenvolvimento'], 2, ',', '.');
                    $linha[] = number_format($domicilio['Indice']['habitacao'], 2, ',', '.');
                    $linha[] = $domicilio['Responsavel']['nome'];
                    $linha[] = $domicilio['Responsavel']['nis'];
                    $linha[] = $domicilio['Domicilio']['tipo_logradouro'];
                    $linha[] = $domicilio['Domicilio']['logradouro'];
                    $linha[] = $domicilio['Domicilio']['numero'];
                    $linha[] = $domicilio['Domicilio']['complemento'];
                    $linha[] = $domicilio['Bairro']['nome'];

                    $size = fputcsv($fw, $linha, ';');
                }

                print fread($fr, $size);

                fclose($fw);
                fclose($fr);
                ob_clean();
            } else {
                $this->Session->setFlash('Erro ao abrir o arquivo para leitura!');
                $this->redirect(array('controller' => 'indices', 'action' => 'index'));
            }
            unlink($file['tmp']);
        } else {
            $this->Session->setFlash('Erro ao abrir o arquivo para escrita!');
            $this->redirect(array('controller' => 'indices', 'action' => 'index'));
        }
    }

    function trabalhoEmprego() {
        $idade = "(YEAR(CURDATE())-YEAR(Pessoa.data_nascimento))-(RIGHT(CURDATE(),5)<RIGHT(Pessoa.data_nascimento,5))";
        $options = array(
            'recursive' => -1,
            'joins' => array(
                array('table' => 'faixas_etarias',
                    'alias' => 'FaixasEtaria',
                    'type' => 'INNER',
                    'conditions' => array(
                        'CASE WHEN ' . $idade . ' > 80 THEN FaixasEtaria.idade = 80 ELSE FaixasEtaria.idade = ' . $idade . 'END',
                    )
                ),
                array('table' => 'domicilios',
                    'alias' => 'Domicilio',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Pessoa.codigo_domiciliar = Domicilio.codigo_domiciliar',
                    )
                ),
            ),
            'fields' => array(
                'COUNT(FaixasEtaria.id) AS total',
                'Pessoa.tipo_trabalho',
                'FaixasEtaria.descricao',
                'FaixasEtaria.faixa',
            ),
            'conditions' => array(
            ),
            'group' => array(
                'Pessoa.tipo_trabalho',
                'FaixasEtaria.descricao',
            ),
            'order' => array(
                'FaixasEtaria.idade',
            ),
        );

        switch ($this->data['Relatorio']['filtro']) {
            case 'regiao_id':
                $options['fields'][] = 'Domicilio.regiao_id';
                $options['conditions'] = array(
                    'Domicilio.regiao_id' => $this->data['Relatorio']['regiao_id']
                );
                break;
            case 'cras_id':
                $options['fields'][] = 'Domicilio.cras_id';
                $options['conditions'] = array(
                    'Domicilio.cras_id' => $this->data['Relatorio']['cras_id']
                );
                break;
            case 'bairro_id':
                $options['fields'][] = 'Domicilio.bairro_id';
                $options['conditions'] = array(
                    'Domicilio.bairro_id' => $this->data['Relatorio']['bairro_id']
                );
                break;
        }


        $inicio = microtime(true);
        $pessoas = $this->Pessoa->find('all', $options);

        $faixaEtaria['tempo'] = microtime(true) - $inicio;
        $faixaEtaria['total'] = $this->Pessoa->find('count');
        foreach ($pessoas as $faixa) {
            $faixaEtaria[$faixa['FaixasEtaria']['faixa']][$faixa['Pessoa']['tipo_trabalho']][$faixa['FaixasEtaria']['descricao']] = $faixa[0]['total'];
        }

        $bairros = $this->Domicilio->Bairro->find('list', array('order' => 'Bairro.nome'));
        $cras = $this->Domicilio->Cras->find('list');
        $regioes = $this->Domicilio->Regiao->find('list');

        $this->set(compact('faixaEtaria', 'bairros', 'cras', 'regioes', 'domicilios'));
    }

    function faixasEtarias() {
        $idade = "(YEAR(CURDATE())-YEAR(Pessoa.data_nascimento))-(RIGHT(CURDATE(),5)<RIGHT(Pessoa.data_nascimento,5))";
        $options = array(
            'recursive' => -1,
            'joins' => array(
                array('table' => 'faixas_etarias',
                    'alias' => 'FaixasEtaria',
                    'type' => 'INNER',
                    'conditions' => array(
                        'CASE WHEN ' . $idade . ' > 80 THEN FaixasEtaria.idade = 80 ELSE FaixasEtaria.idade = ' . $idade . 'END',
                    )
                ),
                array('table' => 'domicilios',
                    'alias' => 'Domicilio',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Pessoa.codigo_domiciliar = Domicilio.codigo_domiciliar',
                    )
                ),
            ),
            'conditions' => array(
                $this->pessoa_count . ' > 0'
            ),
            'fields' => array(
                'COUNT(FaixasEtaria.id) AS total',
                'Pessoa.genero',
                'FaixasEtaria.descricao',
                'FaixasEtaria.faixa',
            ),
            'group' => array(
                'Pessoa.genero',
                'FaixasEtaria.descricao',
            ),
            'order' => array(
                'FaixasEtaria.idade',
            ),
        );

        switch ($this->data['Relatorio']['filtro']) {
            case 'regiao_id':
                $options['fields'][] = 'Domicilio.regiao_id';
                $options['conditions'] = array(
                    'Domicilio.regiao_id' => $this->data['Relatorio']['regiao_id'],
                    $this->pessoa_count . ' > 0'
                );
                break;
            case 'cras_id':
                $options['fields'][] = 'Domicilio.cras_id';
                $options['conditions'] = array(
                    'Domicilio.cras_id' => $this->data['Relatorio']['cras_id'],
                    $this->pessoa_count . ' > 0'
                );
                break;
            case 'bairro_id':
                $options['fields'][] = 'Domicilio.bairro_id';
                $options['conditions'] = array(
                    'Domicilio.bairro_id' => $this->data['Relatorio']['bairro_id'],
                    $this->pessoa_count . ' > 0'
                );
                break;
        }

        $inicio = microtime(true);
        $pessoas = $this->Pessoa->find('all', $options);

        unset($options['order']);
        unset($options['group']);
        unset($options['fields']);

        $faixaEtaria['total'] = $this->Pessoa->find('count', $options);

        $faixaEtaria['tempo'] = microtime(true) - $inicio;

        foreach ($pessoas as $faixa) {
            $faixaEtaria
                    [$faixa['FaixasEtaria']['faixa']]
                    [$faixa['Pessoa']['genero']]
                    [$faixa['FaixasEtaria']['descricao']] = $faixa[0]['total'];
            //Totalizador por faixa etária
            //IF usado para corrigir erro de variável não setada usando +=
            if (!isset($faixaEtaria[$faixa['FaixasEtaria']['faixa']]['total']))
                $faixaEtaria[$faixa['FaixasEtaria']['faixa']]['total'] = $faixa[0]['total'];
            else
                $faixaEtaria[$faixa['FaixasEtaria']['faixa']]['total'] += $faixa[0]['total'];
            //Totalizador por faixa etária / descricao
            //IF usado para corrigir erro de variável não setada usando +=
            if (!isset($faixaEtaria[$faixa['FaixasEtaria']['faixa']][$faixa['FaixasEtaria']['descricao']]))
                $faixaEtaria[$faixa['FaixasEtaria']['faixa']][$faixa['FaixasEtaria']['descricao']] = $faixa[0]['total'];
            else
                $faixaEtaria[$faixa['FaixasEtaria']['faixa']][$faixa['FaixasEtaria']['descricao']] += $faixa[0]['total'];
            //Totalizador por faixa etária / genero
            //IF usado para corrigir erro de variável não setada usando +=
            if (!isset($faixaEtaria[$faixa['FaixasEtaria']['faixa']][$faixa['Pessoa']['genero']]['total']))
                $faixaEtaria[$faixa['FaixasEtaria']['faixa']][$faixa['Pessoa']['genero']]['total'] = $faixa[0]['total'];
            else
                $faixaEtaria[$faixa['FaixasEtaria']['faixa']][$faixa['Pessoa']['genero']]['total'] += $faixa[0]['total'];
            //Totalizador por  genero
            //IF usado para corrigir erro de variável não setada usando +=
            if (!isset($faixaEtaria[$faixa['Pessoa']['genero']]))
                $faixaEtaria[$faixa['Pessoa']['genero']] = $faixa[0]['total'];
            else
                $faixaEtaria[$faixa['Pessoa']['genero']] += $faixa[0]['total'];
        }

        $bairros = $this->Domicilio->Bairro->find('list', array(
            'order' => 'Bairro.nome'
                ));
        $cras = $this->Domicilio->Cras->find('list');
        $regioes = $this->Domicilio->Regiao->find('list');

//        $this->loadModel('Domicilio');
//        $options['fields'] = array();
        $domicilios = $this->Domicilio->find('count', array($options));
//        var_dump($domicilios); die();

        $this->set(compact('faixaEtaria', 'bairros', 'cras', 'regioes', 'domicilios'));
    }

    function valorRenda() {
        $idade = "(YEAR(CURDATE())-YEAR(Pessoa.data_nascimento))-(RIGHT(CURDATE(),5)<RIGHT(Pessoa.data_nascimento,5))";
        $options = array(
            'recursive' => -1,
            'joins' => array(
                array('table' => 'faixas_etarias',
                    'alias' => 'FaixasEtaria',
                    'type' => 'INNER',
                    'conditions' => array(
                        'CASE WHEN ' . $idade . ' > 80 THEN FaixasEtaria.idade = 80 ELSE FaixasEtaria.idade = ' . $idade . 'END',
                    )
                ),
                array('table' => 'domicilios',
                    'alias' => 'Domicilio',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Pessoa.codigo_domiciliar = Domicilio.codigo_domiciliar',
                    )
                ),
            ),
            'fields' => array(
                'COUNT(FaixasEtaria.id) AS total',
                '(CASE WHEN valor_renda = 0 THEN "0 reais" WHEN valor_renda BETWEEN 0.01 AND 70 THEN "ate 70 reais" WHEN valor_renda BETWEEN 70.01 AND 140 THEN "70 a 140 reais" WHEN valor_renda BETWEEN 140.01 AND 240 THEN "140 a 240 reais" WHEN valor_renda BETWEEN 240.01 AND 545 THEN "240 a 545 reais" WHEN valor_renda > 545 THEN "acima 545 reais" END) AS renda',
                'FaixasEtaria.descricao',
                'FaixasEtaria.faixa',
            ),
            'group' => array(
                'renda',
                'FaixasEtaria.descricao',
            ),
            'order' => array(
                'FaixasEtaria.idade',
            ),
        );

        switch ($this->data['Relatorio']['filtro']) {
            case 'regiao_id':
                $options['fields'][] = 'Domicilio.regiao_id';
                $options['conditions'] = array(
                    'Domicilio.regiao_id' => $this->data['Relatorio']['regiao_id']
                );
                break;
            case 'cras_id':
                $options['fields'][] = 'Domicilio.cras_id';
                $options['conditions'] = array(
                    'Domicilio.cras_id' => $this->data['Relatorio']['cras_id']
                );
                break;
            case 'bairro_id':
                $options['fields'][] = 'Domicilio.bairro_id';
                $options['conditions'] = array(
                    'Domicilio.bairro_id' => $this->data['Relatorio']['bairro_id']
                );
                break;
        }

        $inicio = microtime(true);
        $pessoas = $this->Pessoa->find('all', $options);

        $valorRenda['tempo'] = microtime(true) - $inicio;
        $valorRenda['total'] = $this->Pessoa->find('count', array('conditions' => array($this->pessoa_count . ' > 0')));
        foreach ($pessoas as $renda) {
            $valorRenda
                    [$renda['FaixasEtaria']['faixa']]
                    [$renda[0]['renda']]
                    [$renda['FaixasEtaria']['descricao']] = $renda[0]['total'];
        }

        $bairros = $this->Domicilio->Bairro->find('list', array(
            'order' => 'Bairro.nome'
                ));
        $cras = $this->Domicilio->Cras->find('list');
        $regioes = $this->Domicilio->Regiao->find('list');

        $this->set(compact('valorRenda', 'bairros', 'cras', 'regioes'));
    }

    function educacaoFormal() {

        $serie_escolar = '(CASE';
        $serie_escolar .= ' WHEN grau_instrucao = ' . Pessoa::ESCOLARIDADE_ANALFABETO . ' THEN "analfabeto"';
        $serie_escolar .= ' WHEN serie_escolar = ' . Pessoa::SERIE_CA_ALFABETIZACAO . ' THEN "alfabetizacao"';
        $serie_escolar .= ' WHEN serie_escolar BETWEEN ' . Pessoa::SERIE_MATERNAL_I . ' AND ' . Pessoa::SERIE_MATERNAL_III . ' THEN "maternal"';
        $serie_escolar .= ' WHEN serie_escolar BETWEEN ' . Pessoa::SERIE_JARDIM_I . ' AND ' . Pessoa::SERIE_JARDIM_III . ' THEN "jardim"';
        $serie_escolar .= ' WHEN serie_escolar BETWEEN ' . Pessoa::SERIE_1_ENSINO_FUNDAMENTAL . ' AND ' . Pessoa::SERIE_2_ENSINO_FUNDAMENTAL . ' THEN "1 a 2 ano"';
        $serie_escolar .= ' WHEN serie_escolar BETWEEN ' . Pessoa::SERIE_3_ENSINO_FUNDAMENTAL . ' AND ' . Pessoa::SERIE_4_ENSINO_FUNDAMENTAL . ' THEN "3 a 4 ano"';
        $serie_escolar .= ' WHEN serie_escolar BETWEEN ' . Pessoa::SERIE_5_ENSINO_FUNDAMENTAL . ' AND ' . Pessoa::SERIE_6_ENSINO_FUNDAMENTAL . ' THEN "5 a 6 ano"';
        $serie_escolar .= ' WHEN serie_escolar BETWEEN ' . Pessoa::SERIE_7_ENSINO_FUNDAMENTAL . ' AND ' . Pessoa::SERIE_8_ENSINO_FUNDAMENTAL . ' THEN "7 a 8 ano"';
        $serie_escolar .= ' WHEN serie_escolar = ' . Pessoa::SERIE_1_ENSINO_MEDIO . ' THEN "1 ano medio"';
        $serie_escolar .= ' WHEN serie_escolar = ' . Pessoa::SERIE_2_ENSINO_MEDIO . ' THEN "2 ano medio"';
        $serie_escolar .= ' WHEN serie_escolar = ' . Pessoa::SERIE_3_ENSINO_MEDIO . ' THEN "3 ano medio"';
        $serie_escolar .= ' WHEN grau_instrucao >= ' . Pessoa::ESCOLARIDADE_SUPERIOR_INCOMPLETO . ' THEN "ensino superior"';
        $serie_escolar .= ' WHEN serie_escolar = ' . Pessoa::SERIE_NAO_INFORMADO . ' THEN "nao informado"';
        $serie_escolar .= ' END) AS educacao_formal';

        $idade = "(YEAR(CURDATE())-YEAR(Pessoa.data_nascimento))-(RIGHT(CURDATE(),5)<RIGHT(Pessoa.data_nascimento,5))";

        $options = array(
            'recursive' => -1,
            'joins' => array(
                array('table' => 'faixas_etarias',
                    'alias' => 'FaixasEtaria',
                    'type' => 'INNER',
                    'conditions' => array(
                        'CASE WHEN ' . $idade . ' > 80 THEN FaixasEtaria.idade = 80 ELSE FaixasEtaria.idade = ' . $idade . 'END',
                    )
                ),
                array('table' => 'domicilios',
                    'alias' => 'Domicilio',
                    'type' => 'INNER',
                    'conditions' => array(
                        'Pessoa.codigo_domiciliar = Domicilio.codigo_domiciliar',
                    )
                ),
            ),
            'fields' => array(
                'COUNT(FaixasEtaria.id) AS total',
                $serie_escolar,
                'FaixasEtaria.descricao',
                'FaixasEtaria.faixa',
            ),
            'group' => array(
                'educacao_formal',
                'FaixasEtaria.descricao',
            ),
            'order' => array(
                'FaixasEtaria.idade',
            ),
            'conditions' => array(
//            'grau_instrucao >= ' => Pessoa::ESCOLARIDADE_SUPERIOR_INCOMPLETO,
            )
        );

        switch ($this->data['Relatorio']['filtro']) {
            case 'regiao_id':
                $conditions = array(
                    'Domicilio.regiao_id' => $this->data['Relatorio']['regiao_id']
                );
                break;
            case 'cras_id':
                $conditions = array(
                    'Domicilio.cras_id' => $this->data['Relatorio']['cras_id']
                );
                break;
            case 'bairro_id':
                $conditions = array(
                    'Domicilio.bairro_id' => $this->data['Relatorio']['bairro_id']
                );
                break;
        }

        $inicio = microtime(true);
        $pessoas = $this->Pessoa->find('all', $options);

        $educacaoFormal['tempo'] = microtime(true) - $inicio;
        $educacaoFormal['total'] = $this->Pessoa->find('count', array('conditions' => array($this->pessoa_count . ' > 0',)));
        foreach ($pessoas as $educacao) {
            $educacaoFormal
                    [$educacao['FaixasEtaria']['faixa']]
                    [$educacao[0]['educacao_formal']]
                    [$educacao['FaixasEtaria']['descricao']] = $educacao[0]['total'];
            $educacaoFormal[$educacao[0]['educacao_formal']] += $educacao[0]['total'];
        }

        $bairros = $this->Domicilio->Bairro->find('list', array(
            'order' => 'Bairro.nome'
                ));
        $cras = $this->Domicilio->Cras->find('list');
        $regioes = $this->Domicilio->Regiao->find('list');

        $this->set(compact('educacaoFormal', 'bairros', 'cras', 'regioes'));
    }

}
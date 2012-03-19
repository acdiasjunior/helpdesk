<?php

class IndicesController extends AppController {

    var $name = 'Indices';
    var $helpers = array('Javascript', 'Js');
    var $components = array('RequestHandler');
    var $pessoa_count = '(SELECT COUNT(*) FROM pessoas WHERE pessoas.codigo_domiciliar = Domicilio.codigo_domiciliar)';

    function index() {
        //$indices = $this->Indice->query("SELECT AVG(idf) as media, MAX(idf) as maximo, MIN(idf) as minimo FROM indices;");

        /* SELECT bairros.id, bairros.nome, AVG( indices.idf ) AS idf, AVG( `vulnerabilidade` ) AS vulnerabilidade,
         *  AVG( `conhecimento` ) AS conhecimento, AVG( `trabalho` ) AS trabalho, AVG( `recursos` ) AS recursos,
         *  AVG( `desenvolvimento` )AS desenvolvimento, AVG( `habitacao` ) AS habitacao
          FROM indices
          INNER JOIN domicilios ON domicilios.codigo_domiciliar = indices.codigo_domiciliar
          INNER JOIN bairros ON bairros.id = domicilios.bairro_id
          GROUP BY bairros.id */

        $joins = array(
            array('table' => 'domicilios',
                'alias' => 'Domicilio',
                'type' => 'INNER',
                'conditions' => array(
                    'Indice.codigo_domiciliar = Domicilio.codigo_domiciliar',
                )
            ),
            array('table' => 'regioes',
                'alias' => 'Regiao',
                'type' => 'LEFT',
                'conditions' => array(
                    'Regiao.id = Domicilio.regiao_id',
                )
            ),
            array('table' => 'bairros',
                'alias' => 'Bairro',
                'type' => 'LEFT',
                'conditions' => array(
                    'Bairro.id = Domicilio.bairro_id',
                )
            ),
            array('table' => 'cras',
                'alias' => 'Cras',
                'type' => 'LEFT',
                'conditions' => array(
                    'Cras.id = Domicilio.cras_id',
                )
            ),
        );
        $fields = array(
            'AVG(Indice.idf) AS idf_media',
            'MAX(Indice.idf) AS idf_max',
            'MIN(Indice.idf) AS idf_min',
            'AVG(Indice.vulnerabilidade) AS vulnerabilidade',
            'AVG(Indice.conhecimento) AS conhecimento',
            'AVG(Indice.trabalho) AS trabalho',
            'AVG(Indice.recursos) AS recursos',
            'AVG(Indice.desenvolvimento) AS desenvolvimento',
            'AVG(Indice.habitacao) AS habitacao',
        );
        $conditions = array();

        foreach ($this->Indice->indicadores as $indicador)
            $options['fields'][] = "AVG($indicador) AS $indicador";

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

        $options = array(
            'recursive' => -1,
            'joins' => $joins,
            'fields' => $fields,
            'conditions' => $conditions,
        );

        $inicio = microtime(true);
        $indices = $this->Indice->find('all', $options);

        $fields = array(
            'COUNT(*) AS total',
            '(CASE
                    WHEN Indice.idf <= 0.6 THEN "ate06"
                    WHEN Indice.idf > 0.6 AND Indice.idf <= 0.7 THEN "de06a07"
                    WHEN Indice.idf > 0.7 AND Indice.idf <= 0.8 THEN "de07a08"
                    WHEN Indice.idf > 0.8 AND Indice.idf <= 0.9 THEN "de08a09"
                    WHEN Indice.idf > 0.9 THEN "maior09"
                 END) AS idf',
        );
        $group = array('idf');

        $options = array(
            'recursive' => -1,
            'joins' => $joins,
            'fields' => $fields,
            'conditions' => $conditions,
            'group' => $group,
        );

        $totais = array(
            'total' => 0
        );

        foreach ($this->Indice->find('all', $options) as $total) {
            $totais[$total[0]['idf']] = $total[0]['total'];
            $totais['total'] += $total[0]['total'];
        }

        $indices['tempo'] = microtime(true) - $inicio;

        $this->set(compact('indices', 'totais'));
    }

    function atualizarIndices($atualizar = null) {
        $this->loadModel('Domicilio');
        $retorno['status'] = 1;
        switch ($atualizar) {
            case 'total':
                $retorno['total'] = $this->Domicilio->find('count', array('conditions' => array($this->pessoa_count . ' > 0')));
                break;
            case 'desatualizados':
                $retorno['desatualizados'] = $this->Domicilio->find('count', array(
                    'conditions' => array(
                        $this->pessoa_count . ' > 0',
                        'OR' => array(
                            'Indice.modified <' => date('Y-m-d'),
                            'Indice.modified IS NULL',
                        )
                    )
                        ));
                break;
            case 'atualizar':
                if (isset($this->params['form']['limit']))
                    $limite = $this->params['form']['limit'];

                $domicilios = $this->Domicilio->find('list', array(
                    'joins' => array(
                        array('table' => 'indices',
                            'alias' => 'Indice',
                            'type' => 'LEFT',
                            'conditions' => array(
                                'Domicilio.codigo_domiciliar = Indice.codigo_domiciliar',
                            )
                        )
                    ),
                    'conditions' => array(
                        $this->pessoa_count . ' > 0',
                        'OR' => array(
                            'Indice.modified <' => date('Y-m-d'),
                            'Indice.modified IS NULL',
                        )
                    ),
                    'limit' => $limite,
                        )
                );
                foreach ($domicilios as $codigo_domiciliar) {

                    set_time_limit(2);

                    $this->data = array();

                    $this->Domicilio->id = $codigo_domiciliar;
                    $domicilio = $this->Domicilio->read();

                    $contador = array('idade_ativa' => 0, 'idade_ativa_ocupado' => 0, 'membros' => 0);
                    $somatorio = array('valor_renda' => 0, 'valor_beneficio' => 0);

                    $dimensao = $this->Indice->dimensoes;

                    foreach ($domicilio['Pessoa'] as $pessoa) {
                        foreach ($dimensao as $nome => $valor) {
                            foreach ($valor as $indicador => $padrao) {
                                if ($dimensao[$nome][$indicador] === $padrao) {
                                    $retorno = $this->calculaIndicadorPessoa($pessoa, $indicador, $dimensao[$nome][$indicador]);
                                    $dimensao[$nome][$indicador] = $retorno['valor'];
                                }
                            }
                        }

                        $contador['membros']++;
                        //V.9 Mais da metade dos membros encontra-se em idade ativa
                        if ($pessoa['idade'] >= Pessoa::IDADE_ADOLESCENTE)
                            $contador['idade_ativa']++;
                        //T.1 Mais da metade dos membros em idade ativa encontram-se ocupados
                        if ($pessoa['idade'] >= Pessoa::IDADE_ADOLESCENTE && $pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_TRABALHA)
                            $contador['idade_ativa_ocupado']++;
                        //R.2 Renda familiar per capita superior a linha de extema pobreza
                        //R.5 Renda familiar per capita superior a linha de pobreza
                        $somatorio['valor_renda'] += $pessoa['valor_renda'];
                        //R.6 Maior parte da renda familiar não advém de transferências
                        $somatorio['valor_beneficio'] += $pessoa['valor_beneficio'];
                    }
                    
                    foreach ($dimensao['habitacao'] as $indicador => $valor) {
                        $retorno = $this->calculaIndicadorDomicilio($domicilio['Domicilio'], $indicador, $dimensao[$nome][$indicador]);
                        $dimensao['habitacao'][$indicador] = $retorno['valor'];
                    }

                    //H.3 Densidade de até 2 moradores por dormitório
                    if (($contador['membros'] / $domicilio['Domicilio']['comodos']) > 2)
                        $dimensao['habitacao']['h3'] = 0;

                    //V.9 Mais da metade dos membros encontra-se em idade ativa
                    if ($contador['idade_ativa'] < ($contador['membros'] / 2))
                        $dimensao['vulnerabilidade']['v9'] = 0;

                    //T.1 Mais da metade dos membros em idade ativa encontram-se ocupados
                    if ($contador['idade_ativa_ocupado'] > ($contador['idade_ativa'] / 2))
                        $dimensao['trabalho']['t1'] = 1;

                    //R.2 Renda familiar per capita superior a linha de extema pobreza
                    if (($somatorio['valor_renda'] + $somatorio['valor_beneficio']) / $contador['membros'] < 70)
                        $dimensao['recursos']['r2'] = 0;

                    //R.5 Renda familiar per capita superior a linha de pobreza
                    if (($somatorio['valor_renda'] + $somatorio['valor_beneficio']) / $contador['membros'] < 140)
                        $dimensao['recursos']['r5'] = 0;

                    //R.6 Maior parte da renda familiar não advém de transferências
                    if ($somatorio['valor_renda'] < $somatorio['valor_beneficio'])
                        $dimensao['recursos']['r6'] = 0;
                    
                    //NAO V.1 Ausência de Gestantes
                    //NAO V.2 Ausência de Mães Amamentando
                    //NAO V.6 Ausência de portadores de deficiência
                    //NAO V.8 Presença de cônjuge
                    //NAO R.1 Despesa familiar per capita superior a linha de extema pobreza
                    //NAO R.3 Despesa com alimentos superior a linha de extema pobreza
                    //NAO R.4 Despesa familiar per capita superior a linha de pobreza
                    /// SALVANDO OS DADOS
                    foreach ($dimensao as $key => $value)
                        foreach ($value as $k => $v)
                            $this->data['Indice'][$k] = $v;

                    $this->data['Indice']['idf'] = array_sum($this->data['Indice']) / count($this->data['Indice']);
                    $this->data['Indice']['codigo_domiciliar'] = $codigo_domiciliar;

                    $this->data['Domicilio']['codigo_domiciliar'] = $this->data['Indice']['codigo_domiciliar'];
                    $this->data['Domicilio']['idf'] = $this->data['Indice']['idf'];

                    foreach ($dimensao as $key => $value)
                        $this->data['Indice'][$key] = array_sum($dimensao[$key]) / count($dimensao[$key]);

                    $this->data['IndicesHistorico'] = $this->data['Indice'];

                    if (!$this->Indice->saveAll($this->data)) {
                        $retorno['status'] = 0;
                    }
                }
        }
        if ($atualizar != null) {
            $retorno['desatualizados'] = $this->Domicilio->find('count', array(
                'conditions' => array(
                    $this->pessoa_count . ' > 0',
                    'OR' => array(
                        'Indice.modified <' => date('Y-m-d'),
                        'Indice.modified IS NULL',
                    )
                )
                    ));
            echo json_encode($retorno);
            die();
        }
    }

    public function calculaIndicadorPessoa($pessoa, $indicador, $valor = null, $idade_min = null, $idade_max = null) {
        $usuario = false;
        if (($idade_min == null && $idade_max == null) || ($pessoa['idade'] >= $idade_min && $pessoa['idade'] < $idade_max)) {
            switch ($indicador) {
                case 'v3': //V.3 Ausência de crianças
                    if ($pessoa['idade'] < Pessoa::IDADE_ADOLESCENTE) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'v4': //V.4 Ausência de crianças e adolescente
                    if ($pessoa['idade'] < Pessoa::IDADE_JOVEM) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'v5': //V.5  Ausência de crianças, adolescente e jovens
                    if ($pessoa['idade'] < Pessoa::IDADE_ADULTO) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'v7': //V.7 Ausência de Idosos
                    if ($pessoa['idade'] >= Pessoa::IDADE_IDOSO) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'c1': //C.1 Ausência de Adultos Analfabetos
                    if ($pessoa['idade'] >= Pessoa::IDADE_ADULTO && $pessoa['grau_instrucao'] < Pessoa::ESCOLARIDADE_ATE_4A_INCOMPLETA) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'c2': //C.2 Ausência de Adultos Analfabetos Funcionais
                    if ($pessoa['idade'] >= Pessoa::IDADE_ADULTO && $pessoa['grau_instrucao'] < Pessoa::ESCOLARIDADE_4A_COMPLETA) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'c3': //C.3 Presença de pelo menos um adulto com fundamental completo
                    if ($pessoa['idade'] >= Pessoa::IDADE_ADULTO) {
                        if ($pessoa['grau_instrucao'] >= Pessoa::ESCOLARIDADE_FUNDAMENTAL_COMPLETO) {
                            $valor = 1;
                            $usuario = false;
                        } else {
                            $usuario = true;
                        }
                    } else {
                        $usuario = false;
                    }
                    break;
                case 'c4': //C.4 Presença de pelo menos um adulto com secundário completo
                    if ($pessoa['idade'] >= Pessoa::IDADE_ADULTO) {
                        if ($pessoa['grau_instrucao'] >= Pessoa::ESCOLARIDADE_MEDIO_COMPLETO) {
                            $valor = 1;
                            $usuario = false;
                        } else {
                            $usuario = true;
                        }
                    } else {
                        $usuario = false;
                    }
                    break;
                case 'c5': //C.5 Presença de pelo menos um adulto com alguma educação superior
                    if ($pessoa['idade'] >= Pessoa::IDADE_ADULTO) {
                        if ($pessoa['grau_instrucao'] >= Pessoa::ESCOLARIDADE_SUPERIOR_INCOMPLETO) {
                            $valor = 1;
                            $usuario = false;
                        } else {
                            $usuario = true;
                        }
                    } else {
                        $usuario = false;
                    }
                    break;
                case 't2': //T.2 Presença de pelo menos um ocupado no setor formal
                    if ($pessoa['tipo_trabalho'] == Pessoa::TRABALHO_ASSALARIADO_COM_CARTEIRA
                            || $pessoa['tipo_trabalho'] == Pessoa::TRABALHO_AUTONOMO_COM_PREVIDENCIA) {
                        $valor = 1;
                        $usuario = false;
                    } else {
                        $usuario = true;
                    }
                    break;
                case 't3': //T.3 Presença de pelo menos um ocupado em atividade não agrícola
                    if ($pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_TRABALHA &&
                            $pessoa['tipo_trabalho'] != Pessoa::TRABALHO_TRABALHADOR_RURAL
                            && $pessoa['tipo_trabalho'] != Pessoa::TRABALHO_EMPREGADOR_RURAL) {
                        $valor = 1;
                        $usuario = false;
                    } else {
                        $usuario = true;
                    }
                    break;
                case 't4': //T.4 Presença de pelo menos um ocupado com rendimento superior a 1 salário mínimo
                    if ($pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_TRABALHA && $pessoa['valor_renda'] > 545) {
                        $valor = 1;
                        $usuario = false;
                    } else {
                        $usuario = true;
                    }
                    break;
                case 't5':  //T.5 Presença de pelo menos um ocupado com rendimento superior a 2 salários mínimos
                    if ($pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_TRABALHA && $pessoa['valor_renda'] > (545 * 2)) {
                        $valor = 1;
                        $usuario = false;
                    } else {
                        $usuario = true;
                    }
                    break;
                case 'd1': //D.1 Ausência de pelo menos uma criança de menos de 10 anos trabalhando
                    if ($pessoa['idade'] < 10
                            && $pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_TRABALHA
                            && $pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_INFORMADO) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'd2': //D.2 Ausência de pelo menos uma criança de menos de 16 anos de trabalhando
                    if ($pessoa['idade'] < 16
                            && $pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_TRABALHA
                            && $pessoa['tipo_trabalho'] != Pessoa::TRABALHO_NAO_INFORMADO) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'd3': //D.3 Ausência de pelo menos uma criança de 0-6 anos fora da escola
                    if ($pessoa['idade'] <= 6 && $pessoa['frequenta_escola'] == Pessoa::ESCOLA_NAO_FREQUENTA) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'd4': //D.4 Ausência de pelo menos uma criança de 7-14 anos fora da escola
                    if ($pessoa['idade'] >= 7 && $pessoa['idade'] <= 14 && $pessoa['frequenta_escola'] == Pessoa::ESCOLA_NAO_FREQUENTA) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'd5': //D.5 Ausência de pelo menos uma criança de 7-17 anos fora da escola
                    if ($pessoa['idade'] >= 7 && $pessoa['idade'] <= 17 && $pessoa['frequenta_escola'] == Pessoa::ESCOLA_NAO_FREQUENTA) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'd6': //D.6 Ausência de pelo menos uma criança com até 14 anos com mais de 2 anos de atraso
                    if (($pessoa['idade'] >= 7 && $pessoa['idade'] <= 14) && ($pessoa['serie_escolar'] - $pessoa['idade'] < 0)) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'd7': //D.7 Ausência de pelo menos um adolescente de 10 a 14 anos analfabeto
                    if ($pessoa['idade'] >= 10 && $pessoa['idade'] <= 14 && $pessoa['grau_instrucao'] == Pessoa::ESCOLARIDADE_ANALFABETO) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
                case 'd8': //D.8 Ausência de pelo menos um jovem de 15 a 17 anos analfabeto
                    if ($pessoa['idade'] >= 15 && $pessoa['idade'] <= 17 && $pessoa['grau_instrucao'] == Pessoa::ESCOLARIDADE_ANALFABETO) {
                        $valor = 0;
                        $usuario = true;
                    }
                    break;
            }
        }
        return array('valor' => $valor,
            'nome' => $pessoa['nome'],
            'nis' => $pessoa['nis'],
            'usuario' => $usuario
        );
    }

    public function calculaIndicadorDomicilio($domicilio, $indicador, $valor = null) {

        $vulnerabilidade = false;

        switch ($indicador) {
            case 'h1': //H.1 Domicílio próprio
                if ($domicilio['situacao_domicilio'] != Domicilio::DOMICILIO_PROPRIO) {
                    $valor = 0;
                    $vulnerabilidade = true;
                }
                break;
            case 'h2': //H.2 Domicílio próprio, cedido ou invadido
                if ($domicilio['situacao_domicilio'] != Domicilio::DOMICILIO_PROPRIO &&
                        $domicilio['situacao_domicilio'] != Domicilio::DOMICILIO_CEDIDO &&
                        $domicilio['situacao_domicilio'] != Domicilio::DOMICILIO_ALUGADO) {
                    $valor = 0;
                    $vulnerabilidade = true;
                        }
                break;
            case 'h4': //H.4 Material de construção permanente
                if ($domicilio['tipo_construcao'] != Domicilio::CONSTRUCAO_TIJOLO_ALVENARIA) {
                    $valor = 0;
                    $vulnerabilidade = true;
                }
                break;
            case 'h5': //H.5 Acesso adequado à água
                if ($domicilio['tipo_abastecimento'] != Domicilio::ABASTECIMENTO_REDE_PUBLICA) {
                    $valor = 0;
                    $vulnerabilidade = true;
                }
                break;
            case 'h6': //H.6 Esgotamento sanitário adequado
                if ($domicilio['escoamento_sanitario'] != Domicilio::ESCOAMENTO_REDE_PUBLICA) {
                    $valor = 0;
                    $vulnerabilidade = true;
                }
                break;
            case 'h7': //H.7 Lixo é coletado
                if ($domicilio['destino_lixo'] != Domicilio::LIXO_COLETADO) {
                    $valor = 0;
                    $vulnerabilidade = true;
                }
                break;
            case 'h8': //H.8 Acesso à eletricidade
                if ($domicilio['tipo_iluminacao'] != Domicilio::ILUMINACAO_RELOGIO_PROPRIO &&
                        $domicilio['tipo_iluminacao'] != Domicilio::ILUMINACAO_RELOGIO_COMUNITARIO) {
                    $valor = 0;
                    $vulnerabilidade = true;
                        }
                break;
        }
        return array('valor' => $valor, 'vulnerabilidade' => $vulnerabilidade);
    }

    function beforeRender() {
        parent::beforeRender();
        $this->loadModel('Bairro');
        $this->loadModel('Cras');
        $this->loadModel('Regiao');
        $bairros = $this->Bairro->find('list', array('order' => 'Bairro.nome'));
        $cras = $this->Cras->find('list');
        $regioes = $this->Regiao->find('list');
        $this->set(compact('bairros', 'cras', 'regioes'));
    }

    function beforeFilter() {
        // executa o beforeFilter do AppController
        parent::beforeFilter();
        // adicione ao método allow as actions que quer permitir sem o usuário estar logado
        $this->Auth->allow(array('atualizarIndices'));
    }

}
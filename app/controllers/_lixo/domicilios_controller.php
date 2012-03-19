<?php

class DomiciliosController extends AppController {

    var $name = 'Domicilios';
    var $helpers = array('Javascript', 'Js');
    var $components = array('RequestHandler');
    var $pessoa_count = '(SELECT COUNT(*) FROM pessoas WHERE `pessoas`.`codigo_domiciliar` = `Domicilio`.`codigo_domiciliar`)';

    function index() {
        $this->set('title_for_layout', 'Listagem de Domicílios');
    }

    function lista() {

        $this->layout = 'ajax';

        $conditions = array(
            $this->pessoa_count . ' != 0',
        );

        if ($this->params['form']['query'] != '')
            if ($this->params['form']['qtype'] == 'Domicilio.idf')
                $conditions['Domicilio.idf <='] = $this->params['form']['query'];
            else
                $conditions[$this->params['form']['qtype'] . ' LIKE'] = '%' . str_replace(' ', '%', $this->params['form']['query']) . '%';

        $this->paginate = array(
            'page' => $this->params['form']['page'],
            'limit' => $this->params['form']['rp'],
            'order' => array(
                $this->params['form']['sortname'] => $this->params['form']['sortorder']
            ),
            'conditions' => $conditions
        );
        $domicilios = $this->paginate('Domicilio');
        $page = $this->params['form']['page'];
        $total = $this->Domicilio->find('count', array('conditions' => $conditions));
        $this->set(compact('domicilios', 'page', 'total'));
    }

    function cadastro($id = null) {
        if (empty($this->data)) {
            $this->data = $this->Domicilio->read();
        } else {
            if ($this->Domicilio->save($this->data)) {
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

    function excluir($id) {
        if (!empty($id)) {
            if ($this->Domicilio->Pessoa->findAllByDomicilioId($id)) {

                $this->Session->setFlash('Não foi possível excluir o domicilio.<br />Existem individuos associados.');
            } else {

                $this->PessoasFisica->delete($id);

                App::import('Model', 'Condutor');
                $this->Condutor = new Condutor();
                $this->Condutor->delete($id);

                $this->Session->setFlash('O cliente com código: ' . $id . ' foi excluído.');
            }
            $this->redirect(array('controller' => $this->name, 'action' => 'index'));
        } else {
            $this->Session->setFlash('Erro ao tentar excluir: código inexistente!');
            $this->redirect(array('controller' => $this->name, 'action' => 'index'));
        }
    }

    function listaDomiciliosBairro($bairro_id) {
        $this->layout = 'ajax';

        $conditions = array('Domicilio.bairro_id =' => $bairro_id);
        if ($this->params['form']['query'] != '')
            $conditions[] = array($this->params['form']['qtype'] . ' LIKE' => '%' . str_replace(' ', '%', $this->params['form']['query']) . '%');

        $this->paginate = array(
            'page' => $this->params['form']['page'],
            'limit' => $this->params['form']['rp'],
            'order' => array(
                $this->params['form']['sortname'] => $this->params['form']['sortorder']
            ),
            'conditions' => $conditions
        );
        $domicilios = $this->paginate('Domicilio');
        $page = $this->params['form']['page'];
        $total = $this->Domicilio->find('count', array('conditions' => $conditions));
        $this->set(compact('domicilios', 'page', 'total'));
    }

    function importar($arquivo = null) {
        if (empty($this->data)) {
            //Abre a tela de importação
        } else {
            if ($this->isUploadedFile($this->data['Domicilio']['arquivo'])) {

                $colunas_simples = array(
                    'COD DOMIC' => 'codigo_domiciliar',
                    'TP LOG' => 'tipo_logradouro',
                    'LOGRADOURO' => 'logradouro',
                    'NO' => 'numero',
                    'COMP' => 'complemento',
                    //'NOME R. L.' => 'nome_responsavel_legal',
                    //'RENDA FAMILIAR' => 'renda_familiar',
                    //'QT PESSOAS' => 'pessoas_count',
                    //'RENDA PERCAPITA' => 'renda_per_capita',
                    'CEP' => 'cep',
                    'DDD' => 'ddd',
                    'TELEFONE' => 'telefone',
                    'ULT ATUALIZ' => 'data_atualizacao',
                    'ENTREVISTADOR' => 'entrevistador',
                    'DT INCLUSAO' => 'data_inclusao',
                    'QT COMODOS' => 'comodos',
                    //'BAIRRO',
                    'NIS R L' => 'nis_responsavel',
                        //TIPO ABASTEC
                        //TIPO ILUM
                        //ESCOAMENTO SAN
                        //DESTINO LIXO
                        //TIPO CONSTR
                        //TIPO DE DOMIC
                        //TRAT. ÁGUA
                        //SITU DOMICÍLIO
                        //ÁREA
                        //PLAN CAIXA
                        //SITU CADASTRAL
                        //MODALIDADE
                        //SITU DOMICÍLIO
                );
                $colunas_combinadas = array(
                    'AREA' => 'tipo_localidade',
                    'SITU DOMICILIO' => 'situacao_domicilio',
                    'TIPO DE DOMIC' => 'tipo_domicilio',
                    'TIPO CONSTR' => 'tipo_construcao',
                    'TIPO ABASTEC' => 'tipo_abastecimento',
                    'TRAT AGUA' => 'tratamento_agua',
                    'TIPO ILUM' => 'tipo_iluminacao',
                    'ESCOAMENTO SAN' => 'escoamento_sanitario',
                    'DESTINO LIXO' => 'destino_lixo',
                    'BAIRRO' => 'bairro_id',
                );
                $combinacoes = array(
                    'AREA' => $this->Domicilio->tipoLocalidade(),
                    'SITU DOMICILIO' => $this->Domicilio->situacaoDomicilio(),
                    'TIPO DE DOMIC' => $this->Domicilio->tipoDomicilio(),
                    'TIPO CONSTR' => $this->Domicilio->tipoConstrucao(),
                    'TIPO ABASTEC' => $this->Domicilio->tipoAbastecimentoAgua(),
                    'TRAT AGUA' => $this->Domicilio->tratamentoAgua(),
                    'TIPO ILUM' => $this->Domicilio->tipoIluminacao(),
                    'ESCOAMENTO SAN' => $this->Domicilio->escoamentoSanitario(),
                    'DESTINO LIXO' => $this->Domicilio->destinoLixo(),
                    'BAIRRO' => $this->Domicilio->Bairro->find('list')
                );

                $handle = fopen($this->data['Domicilio']['arquivo']['tmp_name'], "r");
                $header = fgetcsv($handle, 0, ';');

                while (($row = fgetcsv($handle, 0, ';')) !== FALSE) {

                    set_time_limit(1);

                    $this->data = array();

                    foreach ($header as $key => $value) {

                        $value = strtoupper(Inflector::slug(utf8_encode($value), ' '));
                        $header[$key] = $value;

                        $row[$key] = utf8_encode($row[$key]);

                        if ($value == 'ULT ATUALIZ' || $value == 'DT INCLUSAO') {
                            if ($row[$key] == '1899-12-30 00:00:00')
                                $row[$key] = null;
                            $row[$key] = (strtotime($row[$key]) !== false) ? date('d/m/Y', strtotime($row[$key])) : null;
                        }

                        //var_dump($row); die();

                        if (array_key_exists($value, $colunas_simples)) {
                            $this->data['Domicilio'][$colunas_simples[$value]] = $row[$key];
                        } else if (array_key_exists($value, $colunas_combinadas)) {
                            $this->data['Domicilio'][$colunas_combinadas[$value]] = array_search($row[$key], $combinacoes[$value]);
                        }
                    }

                    $this->Domicilio->create();
                    $this->Domicilio->set($this->data);

                    if (!$this->Domicilio->validates()) {
                        die('erro na validacao de um registro');
                    }

                    // save the row
                    if ($this->data['Domicilio']['logradouro'] != '') {
                        if (!$this->Domicilio->save($this->data, false)) {
                            echo '<pre>' . var_dump($this->data) . '</pre><br>';
                            die('Erro ao gravar o registro!');
                        }
                    }
                }

                $this->Domicilio->query('UPDATE domicilios SET cras_id = (SELECT cras_id FROM bairros WHERE bairros.id = domicilios.bairro_id), regiao_id = (SELECT regiao_id FROM bairros WHERE bairros.id = domicilios.bairro_id)');
                $this->Domicilio->query("UPDATE domicilios SET tipo_logradouro = 'RUA' WHERE tipo_logradouro = 'R';
                        UPDATE domicilios SET tipo_logradouro = 'AVENIDA' WHERE tipo_logradouro = 'AV';
                        UPDATE domicilios SET tipo_logradouro = 'TRAVESSA' WHERE tipo_logradouro = 'TV';
                        UPDATE domicilios SET tipo_logradouro = 'ESTRADA' WHERE tipo_logradouro = 'EST';
                        UPDATE domicilios SET tipo_logradouro = 'FAZENDA' WHERE tipo_logradouro = 'FAZ';
                        UPDATE domicilios SET tipo_logradouro = 'SITIO' WHERE tipo_logradouro = 'SIT';
                        UPDATE domicilios SET tipo_logradouro = 'PC' WHERE tipo_logradouro = 'PC';
                        UPDATE domicilios SET tipo_logradouro = 'ALAMEDA' WHERE tipo_logradouro = 'AL';
                        UPDATE domicilios SET tipo_logradouro = 'QTS' WHERE tipo_logradouro = 'QTS';
                        UPDATE domicilios SET tipo_logradouro = 'RODOVIA' WHERE tipo_logradouro = 'ROD';
                        UPDATE domicilios SET tipo_logradouro = 'R L' WHERE tipo_logradouro = 'R L';
                        UPDATE domicilios SET tipo_logradouro = 'TRAVESSA' WHERE tipo_logradouro = 'TR';
                        UPDATE domicilios SET tipo_logradouro = 'LD' WHERE tipo_logradouro = 'LD';
                        UPDATE domicilios SET tipo_logradouro = 'VILA' WHERE tipo_logradouro = 'VL';
                        UPDATE domicilios SET tipo_logradouro = 'GALERIA' WHERE tipo_logradouro = 'GAL';
                        UPDATE domicilios SET tipo_logradouro = 'AVENIDA' WHERE tipo_logradouro = 'A';
                        UPDATE domicilios SET tipo_logradouro = 'TRAVESSA' WHERE tipo_logradouro = 'TRV';
                        UPDATE domicilios SET tipo_logradouro = 'CONJUNTO' WHERE tipo_logradouro = 'CJ';");

                // close the file
                fclose($handle);

                $this->Session->setFlash('Todos os registros foram importados!');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash("Upload do arquivo falhou!");
            }
        }
    }

}
<?php

class ChamadosController extends AppController {

    var $name = 'Chamados';
    var $components = array(
        'Email' => array(
            'smtpOptions' => array(
                'port' => '465',
                'timeout' => '30',
                'host' => 'ssl://smtp.googlemail.com',
                'username' => 'helpdesk@virtualbs.com.br',
                'password' => 'virtual3435',
            ),
            'sendAs' => 'text',
            'delivery' => 'smtp',
            'from' => 'HelpDesk Virtual <helpdesk@virtualbs.com.br>',
            'replyTo' => 'Suporte Infra <infra@virtualbs.com.br>',
        )
    );

    function admin_index() {
        $this->set('title_for_layout', 'Todos os chamados');
    }

    function index() {
        $this->set('title_for_layout', 'Todos os chamados');
    }

    function admin_lista($action) {

        switch ($action) {
            case 'admin_index':
                $conditions = array();
                break;
            case 'admin_abertos':
                $conditions = array('Chamado.status' => Chamado::STATUS_ABERTO);
                break;
            case 'admin_andamento':
                $conditions = array('Chamado.status' => Chamado::STATUS_ANDAMENTO);
                break;
            case 'admin_fechados':
                $conditions = array('Chamado.status' => Chamado::STATUS_FECHADO);
                break;
        }

        $this->layout = 'ajax';

        if ($this->params['form']['query'] != '')
            $conditions[] = array(
                $this->params['form']['qtype'] . ' LIKE' => '%' . str_replace(' ', '%', $this->params['form']['query']) . '%'
            );

        $this->paginate = array(
            'contain' => array(
                'Usuario' => array(
                    'Grupo',
                ),
                'ChamadosInteracao' => array(
                    'Usuario',
                ),
                'Responsavel',
                'Subcategoria' => array(
                    'Categoria',
                ),
            ),
            'page' => $this->params['form']['page'],
            'limit' => $this->params['form']['rp'],
            'order' => array(
                $this->params['form']['sortname'] => $this->params['form']['sortorder']
            ),
            'conditions' => $conditions,
        );

        $chamados = $this->paginate('Chamado');

        $page = $this->params['form']['page'];
        $total = $this->Chamado->find('count', array('conditions' => $conditions));
        $this->set(compact('chamados', 'page', 'total'));
    }

    function lista($action) {
        switch ($action) {
            case 'index':
                $conditions = array();
                break;
            case 'abertos':
                $conditions = array('Chamado.status' => Chamado::STATUS_ABERTO);
                break;
            case 'andamento':
                $conditions = array('Chamado.status' => Chamado::STATUS_ANDAMENTO);
                break;
            case 'fechados':
                $conditions = array('Chamado.status' => Chamado::STATUS_FECHADO);
                break;
        }

        $conditions['Usuario.id'] = $this->Session->read('Auth.Usuario.id');

        $this->layout = 'ajax';

        if ($this->params['form']['query'] != '')
            $conditions[] = array(
                $this->params['form']['qtype'] . ' LIKE' => '%' . str_replace(' ', '%', $this->params['form']['query']) . '%'
            );

        $this->paginate = array(
            'contain' => array(
                'Usuario' => array(
                    'Grupo',
                ),
                'ChamadosInteracao' => array(
                    'Usuario',
                ),
                'Responsavel',
                'Subcategoria' => array(
                    'Categoria',
                ),
            ),
            'page' => $this->params['form']['page'],
            'limit' => $this->params['form']['rp'],
            'order' => array(
                $this->params['form']['sortname'] => $this->params['form']['sortorder']
            ),
            'conditions' => $conditions,
        );

        $chamados = $this->paginate('Chamado');
        $page = $this->params['form']['page'];
        $total = $this->Chamado->find('count', array('conditions' => $conditions));
        $this->set(compact('chamados', 'page', 'total'));
    }

    function abrir() {
        if (!empty($this->data)) {
            $this->Chamado->set('ip', $this->RequestHandler->getClientIP());
            $this->Chamado->set('status', Chamado::STATUS_ABERTO);
            $this->Chamado->set('data_abertura', date('d/m/Y H:i:s'));
            if ($this->Chamado->save($this->data)) {
                $this->Chamado->contain(array(
                    'Usuario' => array(
                        'Grupo',
                    ),
                    'Subcategoria' => array(
                        'Categoria',
                    ),
                ));
                $this->enviarEmailAberturaChamadoUsuario($this->Chamado->read());
                $this->Session->setFlash('Chamado aberto!');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
        $categorias = $this->categoriasUsuario();
        $this->set(compact('categorias'));
    }

    function interagir($id = null) {
        // Formulario nao foi submetido
        if (empty($this->data)) {
            //Nao foi especificado o ID
            if (is_null($id))
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            // Seta as associacoes que interessam a action
            $this->Chamado->contain(
                    array(
                        'Usuario' => array(
                            'Grupo',
                        ),
                        'ChamadosInteracao' => array(
                            'Usuario',
                        ),
                        'Responsavel',
                        'Subcategoria' => array(
                            'Categoria',
                        ),
                    )
            );
            $this->data = $this->Chamado->read();
            if ($this->data == false) {
                $this->Session->setFlash('Erro ao abrir.<br />Chamado inexistente!');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        } else {
            $this->Chamado->ChamadosInteracao->set('ip', $this->RequestHandler->getClientIP());
            $this->Chamado->ChamadosInteracao->set('data_interacao', date('d/m/Y H:i:s'));
            if ($this->Chamado->ChamadosInteracao->save($this->data)) {
                $this->Chamado->id = $this->data['ChamadosInteracao']['chamado_id'];
                $this->Chamado->set('status', $this->data['Chamado']['status']);
                if ($this->Chamado->save()) {
                    $this->enviarEmailInteracaoUsuario($this->Chamado->ChamadosInteracao->read());
                    $this->Session->setFlash('Cadastro salvo.');
                    $this->redirect(array('controller' => $this->name, 'action' => 'interagir', $this->Chamado->id));
                }
            }
        }
    }

    function admin_interagir($id = null) {
        // Formulario nao foi submetido
        if (empty($this->data)) {
            //Nao foi especificado o ID
            if (is_null($id))
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            // Seta as associacoes que interessam a action
            $this->Chamado->contain(
                    array(
                        'Usuario' => array(
                            'Grupo',
                        ),
                        'ChamadosInteracao' => array(
                            'Usuario',
                        ),
                        'Responsavel',
                        'Subcategoria' => array(
                            'Categoria',
                        ),
                    )
            );
            $this->data = $this->Chamado->read();
            if ($this->data == false) {
                $this->Session->setFlash('Erro ao abrir.<br />Chamado inexistente!');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        } else {
            $this->Chamado->ChamadosInteracao->set('ip', $this->RequestHandler->getClientIP());
            $this->Chamado->ChamadosInteracao->set('data_interacao', date('d/m/Y H:i:s'));
            if ($this->Chamado->ChamadosInteracao->save($this->data)) {
                $this->Chamado->id = $this->data['ChamadosInteracao']['chamado_id'];
                $this->Chamado->set('status', $this->data['Chamado']['status']);
                if ($this->Chamado->save()) {
                    $this->enviarEmailInteracaoUsuario($this->Chamado->ChamadosInteracao->read());
                    $this->Session->setFlash('Cadastro salvo.');
                    $this->redirect(array('controller' => $this->name, 'action' => 'interagir', $this->Chamado->id));
                }
            }
        }
    }

    function admin_atribuirChamado($id = null) {
        if (is_null($id))
            $this->redirect(array('controller' => $this->name, 'action' => 'index'));
        $chamado = $this->Chamado->read();
        if (empty($chamado['Responsavel']['id'])) {
            $this->Chamado->create();
            $this->Chamado->set($chamado);
            $responsavel = $this->Session->read('Auth.Usuario');
            $this->Chamado->set('responsavel_id', $responsavel['id']);
            if ($this->Chamado->save()) {
                $this->enviarEmailAberturaChamadoUsuario($this->Chamado->read());
                $this->Session->setFlash('Cadastro salvo.');
                $this->redirect(array('controller' => $this->name, 'action' => 'interagir', $id));
            } else {
                $this->Session->setFlash('Erro ao atribuir chamado.');
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
    }

    function admin_abertos() {
        $this->set('title_for_layout', 'Chamados abertos');
        $this->render('admin_index');
    }

    function admin_andamento() {
        $this->set('title_for_layout', 'Chamados em andamento');
        $this->render('admin_index');
    }

    function admin_fechados() {
        $this->set('title_for_layout', 'Chamados fechados');
        $this->render('admin_index');
    }

    function abertos() {
        $this->set('title_for_layout', 'Chamados abertos');
        $this->render('index');
    }

    function andamento() {
        $this->set('title_for_layout', 'Chamados abertos');
        $this->render('index');
    }

    function fechados() {
        $this->set('title_for_layout', 'Chamados abertos');
        $this->render('index');
    }

    function enviarEmailInteracaoUsuario($interacao) {
        $this->loadModel('Modelo');
        $this->autoRender = false;
        $this->Email->to = "{$interacao['Usuario']['nome']} <{$interacao['Usuario']['email']}>";
        $this->Email->subject = "HelpDesk - Nova interação - Chamado #{$interacao['Chamado']['id']}";
        $body = $this->Modelo->find('first', array('conditions' => array('nome' => 'interacao_usuario')));
        $body = Chamado::trocaVariaveis($interacao, $body['Modelo']['texto']);
        $this->Email->send($body);
        var_dump($this->Email->smtpError);
    }

    function enviarEmailAberturaChamadoUsuario($chamado) {
        $this->loadModel('Modelo');
        $this->autoRender = false;
        $this->Email->to = "{$chamado['Usuario']['nome']} <{$chamado['Usuario']['email']}>";
        $this->Email->subject = "HelpDesk - Novo chamado - Chamado #{$chamado['Chamado']['id']}";
        $body = $this->Modelo->find('first', array('conditions' => array('nome' => 'abertura_chamado_usuario')));
        $body = Chamado::trocaVariaveis($chamado, $body['Modelo']['texto']);
        $this->Email->send($body);
        if (empty($this->Email->smtpError)) {
            $this->enviarEmailAberturaChamadoSuporte($chamado);
        } else {
            $this->Session->setFlash('Erro ao enviar email.');
            $this->redirect(array('action' => 'index'));
        }
    }

    function enviarEmailAberturaChamadoSuporte($chamado) {
        $this->autoRender = false;
        $admins = $this->Chamado->Usuario->find('all', array(
            'fields' => array(
                'Usuario.nome',
                'Usuario.email'
            ),
            'conditions' => array(
                'OR' => array(
                    'Usuario.tipo_usuario' => Usuario::TIPO_SUPORTE,
                    'Usuario.tipo_usuario' => Usuario::TIPO_ADMINISTRADOR,
                )
            )
                )
        );

        foreach ($admins as $suporte) {
            $this->Email->reset();
            $this->Email->to = "{$suporte['Usuario']['nome']} <{$suporte['Usuario']['email']}>";
            $this->Email->subject = "HelpDesk - Novo chamado - Chamado #{$chamado['Chamado']['id']}";
            $body = $this->Modelo->find('first', array('conditions' => array('nome' => 'abertura_chamado_suporte')));
            $body = Chamado::trocaVariaveis($chamado, $body['Modelo']['texto'], $suporte);
            $this->Email->send($body);
            if (!empty($this->Email->smtpError)) {
                $this->Session->setFlash('Erro ao enviar email.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    private function categoriasUsuario() {
        $userid = $this->Session->read('Auth.Usuario.id');
        $this->loadModel('Usuario');
        $this->Usuario->id = $userid;
        $user = $this->Usuario->find('first', array(
            'contain' => array(
                'Grupo' => array(
                    'Categoria' => array(
                        'Subcategoria'
                    )
                )
            ),
            'conditions' => array(
                'Usuario.id' => $userid
            )
                ));
        $categorias = array();
        foreach ($user['Grupo']['Categoria'] as $categoria) {
            if (count($categoria['Subcategoria']) > 0)
                $categorias[$categoria['id']] = $categoria['descricao'];
        }
        return $categorias;
    }

    function beforeFilter() {
        parent::beforeFilter();
        if ($this->Session->read('Auth.Usuario.tipo_usuario') == Usuario::TIPO_USUARIO) {
            $this->options['conditions'][] = array('Usuario.id' => $this->Session->read('Auth.Usuario.id'));
        }
    }

}
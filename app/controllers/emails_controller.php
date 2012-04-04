<?php

class EmailsController extends AppController {

    var $name = 'Emails';
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
    var $uses = array();

    function enviarEmailInteracaoUsuario() {
        $this->loadModel('Modelo');
        $this->loadModel('Interacao');

        $interacoes = $this->Interacao->find('list', array('conditions' => array('Interacao.email_enviado' => false)));

        foreach ($interacoes as $id) {
            set_time_limit(30);
            $this->Interacao->id = $id;
            $interacao = $this->Interacao->read();
            $this->autoRender = false;
            $this->Email->to = "{$interacao['Usuario']['nome']} <{$interacao['Usuario']['email']}>";
            $this->Email->subject = "HelpDesk - Nova interação - Chamado #{$interacao['Chamado']['id']}";
            $body = $this->Modelo->find('first', array('conditions' => array('nome' => 'interacao_usuario')));
            $body = Chamado::trocaVariaveis($interacao, $body['Modelo']['texto']);
            $this->Email->send($body);
        }
    }

    function enviarEmailAberturaChamadoUsuario() {
        $this->autoRender = false;
        $this->loadModel('Modelo');
        $this->loadModel('Chamado');

        $chamados = $this->Chamado->find('list', array('conditions' => array('Chamado.email_enviado' => false)));

        foreach ($chamados as $id) {
            set_time_limit(30);
            $this->Chamado->id = $id;
            $chamado = $this->Chamado->read();
            $this->autoRender = false;
            $this->Email->to = "{$chamado['Usuario']['nome']} <{$chamado['Usuario']['email']}>";
            $this->Email->subject = "HelpDesk - Novo chamado - Chamado #{$chamado['Chamado']['id']}";
            $body = $this->Modelo->find('first', array('conditions' => array('nome' => 'abertura_chamado_usuario')));
            $body = Chamado::trocaVariaveis($chamado, $body['Modelo']['texto']);
            $this->Email->send($body);
            if (empty($this->Email->smtpError)) {
                $chamado['Chamado']['email_enviado'] = true;
                $this->Chamado->save($chamado);
                $this->enviarEmailAberturaChamadoSuporte($chamado);
            } else {
                $this->Session->setFlash('Erro ao enviar email.');
                $this->redirect(array('action' => 'index'));
            }
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

    function beforeFilter() {
        $this->Auth->autoRedirect = false;
        parent::beforeFilter();
        $this->Auth->allow(array(
            'enviarEmailInteracaoUsuario',
            'enviarEmailAberturaChamadoUsuario',
            'enviarEmailAberturaChamadoSuporte'
        ));
    }

}
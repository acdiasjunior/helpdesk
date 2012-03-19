<?php

class EmailsController extends AppController {

    var $name = 'Emails';
    var $components = array('Email');
    var $uses = array();
    
    function enviaEmail() {
        $this->autoRender = false;
        $this->Email->smtpOptions = array(
            'port' => '465',
            'timeout' => '30',
            'host' => 'ssl://smtp.googlemail.com',
            'username' => 'helpdesk@virtualbs.com.br',
            'password' => 'virtual3435',
        );
        $this->Email->sendAs = 'text';
        $this->Email->delivery = 'smtp';
        $this->Email->from = 'HelpDesk Virtual <helpdesk@virtualbs.com.br>';
        $this->Email->replyTo = 'Suporte Infra <infra@virtualbs.com.br>';
        $this->Email->to = 'Junior <acdiasjunior@gmail.com>';
        $this->Email->subject = 'Teste';
        $this->Email->send('Hello message body!');
        var_dump($this->Email->smtpError);
    }

}
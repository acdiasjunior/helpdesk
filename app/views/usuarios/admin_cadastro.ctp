<?php

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'autocomplete', 'consultacep', 'maskinput'), false);

echo $this->Html->tag('h1', 'Cadastro de Usuários');

echo $this->Form->create('Usuario');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Identificação');
echo $this->Form->input('id');
echo $this->Form->input('nome', array('label' => 'Nome completo'));
echo $this->Form->input('grupo_id', array('label' => 'Grupo'));
echo $this->Form->input('tipo_usuario', array('label' => 'Tipo de Usuário', 'options' => Usuario::tipoUsuario()));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('email', array('label' => 'E-mail'));
echo $this->Form->input('telefone', array('label' => 'Telefone', 'class' => 'masktelefone'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Informações Login');
echo $this->Form->input('username', array('label' => 'Login'));
if(!isset($this->data['Usuario']))
    echo $this->Form->input('password', array('label' => 'Senha'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'usuarios', 'action' => 'index')) . "';"
    ));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();

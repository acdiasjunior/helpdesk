<?php

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'autocomplete', 'consultacep', 'maskinput'), false);

echo $this->Html->tag('h1', 'Cadastro de Usuários');

echo $this->Form->create('Usuario');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Senha');
echo $this->Form->input('nova_senha', array('label' => 'Nova Senha', 'type' => 'password'));
// echo $this->Form->input('nova_senha_confirma', array('label' => 'Confirmação da Senha', 'type' => 'password'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'pages', 'action' => 'display')) . "';"
    ));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();

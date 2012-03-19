<?php

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker'), false);

echo $this->Form->create('Regiao');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Endereço');
echo $this->Form->input('id', array('label' => 'Cód.'));
echo $this->Form->input('descricao', array('label' => 'Descrição'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'regioes', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();
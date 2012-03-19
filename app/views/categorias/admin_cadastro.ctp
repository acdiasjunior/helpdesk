<?php

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker'), false);

echo $this->Form->create('Categoria');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Categoria');
echo $this->Form->input('id');
echo $this->Form->input('descricao', array('label' => 'Descrição', 'class' => 'edit50'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Grupos associados');
echo $this->Form->input('Grupo', array('multiple' => 'checkbox'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => $this->params['controller'], 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();
<?php

echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker'), false);

echo $this->Form->create('Indicador');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Indicador');
echo $this->Form->input('id', array('label' => 'ID'));
echo $this->Form->input('dimensao_id', array('label' => 'Dimensão'));
echo $this->Form->input('codigo', array('label' => 'Código'));
echo $this->Form->input('descricao', array('label' => 'Descrição', 'class' => 'edit40'));
echo $this->Form->input('label', array('label' => 'Label', 'class' => 'edit40'));
echo $this->Form->input('coluna', array('label' => 'Coluna', 'disabled' => 'disabled'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Estratégias');
echo $this->Form->input('Estrategia', array('multiple' => 'checkbox'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'indicadores', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();
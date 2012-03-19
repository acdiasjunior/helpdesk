<?php

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker'), false);

echo $this->Form->create('Estrategia');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Estratégia');
echo $this->Form->input('Estrategia.id');
echo $this->Form->input('Estrategia.codigo', array('label' => 'Cód.', 'class' => 'edit4'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('Estrategia.descricao', array('label' => 'Descrição', 'type' => 'textarea', 'rows' => '7', 'class' => 'edit100'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('Estrategia.idade_min', array('label' => 'Idade Mínima'));
echo $this->Form->input('Estrategia.idade_max', array('label' => 'Idade Máxima (exclusivo)'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Indicadores Relacionados');
echo $this->Form->input('Indicador', array('multiple' => 'checkbox', 'label' => ''));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'estrategias', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();
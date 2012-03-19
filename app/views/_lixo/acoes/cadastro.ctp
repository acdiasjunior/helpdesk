<?php

$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker'), false);

echo $this->Form->create('Acao');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Ação');
echo $this->Form->input('id');
echo $this->Form->input('codigo', array('label' => 'Código', 'class' => 'edit4'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('descricao', array('label' => 'Descrição', 'type' => 'textarea', 'rows' => '3', 'class' => 'edit100'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Dados');
echo $this->Form->input('responsavel', array('label' => 'Responsável', 'options' => Acao::responsavel()));
echo $this->Form->input('usuarios', array('label' => 'Usuários', 'options' => Acao::usuarios()));
echo $this->Form->input('atividade', array('label' => 'Atividade', 'options' => Acao::atividade()));
echo $this->Form->input('rede', array('label' => 'Rede de Proteção Social', 'options' => Acao::rede()));
echo $this->Form->input('ponto_socioassistencial', array('label' => 'Ponto Socioassistencial', 'options' => Acao::pontoSocioassistencial()));
echo $this->Form->input('sistema_setorial_apoio', array('label' => 'Sistema Setorial de Apoio', 'options' => Acao::sistemaSetorialApoio()));
echo $this->Form->input('sistema_logistico', array('label' => 'Sistema Logístico', 'options' => Acao::sistemaLogistico()));
echo $this->Form->input('prazo_minimo', array('label' => 'Prazo Mínimo'));
echo $this->Form->input('prazo_maximo', array('label' => 'Prazo Máximo'));
echo $this->Form->input('encaminhamento', array('label' => 'Encaminhamento', 'class' => 'edit100'));
echo $this->Form->input('pactuacao_familia', array('label' => 'Pactuação Família', 'class' => 'edit40'));
echo $this->Form->input('observacoes', array('label' => 'Observações', 'class' => 'edit40'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Estratégia');
echo $this->Form->input('Estrategia', array('style' => 'width: 800px;'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'acoes', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();
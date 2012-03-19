<?php

foreach($this->data as $acao) {
    echo '<strong>ID</strong>: ' . $acao['Acao']['id'] . '<br />';
    echo '<strong>Código</strong>: ' . $acao['Acao']['codigo'] . '<br />';
    echo '<strong>Descrição</strong>: ' . $acao['Acao']['descricao'] . '<br />';
    echo '<strong>Responsavel</strong>: ' . Acao::responsavel($acao['Acao']['responsavel']) . '<br />';
    echo '<strong>Usuarios</strong>: ' . Acao::usuarios($acao['Acao']['usuarios']) . '<br />';
    echo '<strong>Atividade</strong>: ' . Acao::atividade($acao['Acao']['atividade']) . '<br />';
    echo '<strong>Rede</strong>: ' . Acao::rede($acao['Acao']['rede']) . '<br />';
    echo '<strong>Ponto Socioassistencial</strong>: ' . Acao::pontoSocioassistencial($acao['Acao']['ponto_socioassistencial']) . '<br />';
    echo '<strong>Sistema Setorial Apoio</strong>: ' . Acao::sistemaSetorialApoio($acao['Acao']['sistema_setorial_apoio']) . '<br />';
    echo '<strong>Sistema Logistico</strong>: ' . Acao::sistemaLogistico($acao['Acao']['sistema_logistico']) . '<br />';
    echo '<strong>Prazo minimo</strong>: ' . $acao['Acao']['prazo_minimo'] . ' ';
    echo '<strong>Prazo maximo</strong>: ' . $acao['Acao']['prazo_maximo'] . '<br />';
    echo '<strong>Encaminhamento</strong>: ' . $acao['Acao']['encaminhamento'] . '<br />';
    echo '<strong>Pactuação Família</strong>: ' . $acao['Acao']['pactuacao_familia'] . '<br />';
    echo '<strong>Observaçoes</strong>: ' . $acao['Acao']['observacoes'] . '<br />';
    echo '<br /><br />';
}
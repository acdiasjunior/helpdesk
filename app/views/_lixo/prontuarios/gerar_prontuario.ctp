<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * * região, cras ou bairro
* codigo domiciliar
* responsavel legal
* cpf
* idf familiar (opções: exatamente, até, entre ou acima) > exibir balão com autopreenchimento com níveis D1 a D5.
 */
?>
<script type="text/javascript">

    $(function() {
        
        $('.filtro').parent().hide();
        if($('#ProntuarioFiltro').val() != '')
            $('.' + $('#ProntuarioFiltro').val()).parent().show();
        
        $('#ProntuarioFiltro').change(function(){
            $('.filtro').val('').parent().hide();
            $('.' + $(this).val()).parent().show();
        });
    });

</script>
<?php
echo $this->Form->create('Prontuario', array('url' => array('controller' => $this->params['controller'], 'action' => $this->params['action'])));

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Selecione o filtro para busca');
echo $this->Form->input('filtro', array('options' => array('regiao_id' => 'Região', 'cras_id' => 'Cras', 'bairro_id' => 'Bairro'), 'empty' => 'Selecione o tipo de filtro'));
echo $this->Form->input('regiao_id', array('options' => $regioes, 'empty' => 'Selecione a Região', 'class' => 'filtro regiao_id'));
echo $this->Form->input('cras_id', array('options' => $cras, 'empty' => 'Selecione o CRAS', 'class' => 'filtro cras_id'));
echo $this->Form->input('bairro_id', array('options' => $bairros, 'empty' => 'Selecione o bairro', 'class' => 'filtro bairro_id'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('codigo_domiciliar', array('label' => 'Código Domicíliar'));
echo $this->Form->input('nis_responsavel', array('label' => 'NIS Responsável Legal'));
echo $this->Form->input('cpf_responsavel', array('label' => 'CPF Responsável Legal'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('idf', array('label' => 'IDF'));
echo $this->Form->input('tipo', array('label' => 'Tipo de busca', 'options' => array('<=' => 'Menor ou Igual que', '=' => 'Exatamente', '>' => 'Acima de')));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->end('Filtrar');
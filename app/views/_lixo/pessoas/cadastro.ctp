<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<script type="text/javascript">
    $(function() {        
        $("#flex").flexigrid({
            url: '/helpdesk/pessoas/listaMembros/<?php echo $this->data['Pessoa']['nis'] ?>',
            dataType: 'json',
            colModel : [
                {display: 'NIS', name : 'Pessoa.nis', width : 80, sortable : true, align: 'center', hide: false},
                {display: 'Nome', name : 'Pessoa.nome', width : 250, sortable : true, align: 'left'},
                {display: 'Idade', name : 'Pessoa.data_nascimento', width : 80, sortable : true, align: 'center'}
            ],
            searchitems : [
                {display: 'Nome', name : 'Pessoa.nome', isdefault: true}
            ],
            sortname: "Pessoa.nome",
            sortorder: "asc",
            usepager: true,
            useRp: true,
            rp: 10,
            rpOptions: [10,15,20,25,40],
            width: 700,
            height: 150,
            singleSelect: true,
            errormsg:'Erro de conexão',
            pagestat:'Exibindo de {from} a {to} de um total de {total} registros.',
            pagetext:'Página',
            outof:'de',
            findtext:'Busca',
            procmsg:'Processando, por favor aguarde ...',
            nomsg:'Nenhum item'
        });
        
        $('#flex').dblclick( function(){
            var id = $('.trSelected').find('td[abbr="Pessoa.nis"]').text();
            if(id != '')
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoas', 'action' => 'cadastro')); ?>/' + id);
        });
        
    });
</script><?php
$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker', 'autocomplete'), false);

echo $this->Form->create('Pessoa');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Identificação');
echo $this->Form->input('Pessoa.nis', array('label' => 'NIS', 'type' => 'text', 'class' => 'edit14'));
echo $this->Form->input('Pessoa.nome', array('label' => 'Nome', 'class' => 'edit40'));
echo $this->Form->hidden('Pessoa.responsavel_nis');
if (!$responsavel)
    echo $this->Form->input('Responsavel.nome', array('label' => 'Responsável Legal', 'class' => 'nomeResponsavelAutocomplete edit40'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('Pessoa.data_nascimento', array('label' => 'Data Nascimento', 'type' => 'text', 'class' => 'maskdata data'));
echo $this->Form->input('Pessoa.idade', array('label' => 'Idade', 'value' => $this->data['Pessoa']['idade'] . ' anos ' . $this->data['Pessoa']['meses'] . ' meses'));
echo $this->Form->input('Pessoa.genero', array('label' => 'Gênero', 'type' => 'select', 'options' => Pessoa::genero()));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Documentação');
echo $this->Form->input('cpf', array('label' => 'CPF', 'class' => 'maskcpf edit14'));
echo $this->Form->input('titulo_eleitor', array('label' => 'Título Eleitor', 'class' => 'edit14'));
echo $this->Form->input('zona', array('label' => 'Zona', 'class' => 'edit8'));
echo $this->Form->input('sessao', array('label' => 'Sessão', 'type' => 'text'));
echo $this->Form->input('inep', array('label' => 'Inep', 'type' => 'text'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Informações Pessoais');
echo $this->Form->input('estado_civil', array('options' => Pessoa::estadoCivil(),'label' => 'Estado Civil'));
echo $this->Form->input('cor', array('options' => Pessoa::cor(),'label' => 'Cor'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('grau_instrucao', array('options' => Pessoa::grauInstrucao(),'label' => 'Grau de instrução'));
echo $this->Form->input('serie_escolar', array('options' => Pessoa::serieEscolar(),'label' => 'Série Escolar'));
echo $this->Form->input('frequenta_escola', array('options' => Pessoa::frequentaEscola(),'label' => 'Frequenta Escola'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('tipo_trabalho', array('options' => Pessoa::tipoTrabalho(),'label' => 'Tipo de Trabalho'));
echo $this->Form->input('ocupacao', array('label' => 'Ocupação'));
echo $this->Form->input('valor_renda', array('label' => 'Renda Mensal'));
echo $this->Form->input('valor_beneficio', array('label' => 'Valor Benefício'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Domicílio');
echo $this->Form->input('Domicilio.codigo_domiciliar', array('label' => 'Cód. Domiciliar'));
echo $this->Form->input('Domicilio.cep', array('class' => 'maskcep', 'label' => 'Cep'));
echo $this->Form->input('Domicilio.tipo_logradouro', array('label' => 'Tipo'));
echo $this->Form->input('Domicilio.logradouro', array('label' => 'Logradouro'));
echo $this->Form->input('Domicilio.numero', array('label' => 'Número'));
echo $this->Form->input('Domicilio.complemento', array('label' => 'Complemento'));
echo $this->Form->input('Domicilio.bairro', array('label' => 'Bairro'));
echo $this->Form->input('Domicilio.cidade', array('label' => 'Cidade'));
echo $this->Form->input('Domicilio.uf', array('label' => 'UF', 'size' => '2'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Observações');
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('observacoes', array('label' => 'Observações', 'rows' => '5', 'cols' => '70'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Informações do Registro');
echo $this->Form->input('entrevistador', array('label' => 'Entrevistador', 'class' => 'edit40'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('data_pequisa', array('label' => 'Data da Pesquisa', 'type' => 'text', 'class' => 'maskdata data'));
echo $this->Form->input('data_inclusao', array('label' => 'Data da Inclusão', 'type' => 'text', 'class' => 'maskdata data'));
echo $this->Form->input('data_atualizacao', array('label' => 'Data da Atualização', 'type' => 'text', 'class' => 'maskdata data'));
echo $this->Html->tag('/fieldset', null);

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Serviços Associados');
echo $this->Form->input('Servico', array('multiple' => 'checkbox', 'label' => ''));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'pessoas', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();

if ($responsavel) {
    echo $this->Html->tag('div', '', array('style' => 'height: 20px;'));
    echo $this->Html->tag('fieldset', null);
    echo $this->Html->tag('legend', 'Pessoa - Membros');
    echo '<table id="flex" style="display: none"></table>';
    echo $this->Html->tag('/fieldset', null);
}
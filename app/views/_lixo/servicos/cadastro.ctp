<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<script type="text/javascript">
    $(function() {        
        $("#flex").flexigrid({
            url: '/helpdesk/pessoas/listaPessoasServico/<?php echo $this->data['Servico']['id'] ?>',
            dataType: 'json',
            colModel : [
                {display: 'NIS', name : 'Pessoa.nis', width : 80, sortable : true, align: 'center', hide: false},
                {display: 'Nome', name : 'Pessoa.nome', width : 250, sortable : true, align: 'left'},
                {display: 'Idade', name : 'Pessoa.idade', width : 80, sortable : true, align: 'center'}
            ],
            buttons : [
                {name: 'Incluir', bclass: 'add', onpress : actions},
                {separator: true},
                {name: 'Excluir', bclass: 'delete', onpress : actions},
                {separator: true}
            ],
            searchitems : [
                {display: 'Nome', name : 'Pessoa.nome', isdefault: true}
            ],
            sortname: "Pessoa.nome",
            sortorder: "asc",
            usepager: true,
            useRp: true,
            rp: 15,
            rpOptions: [10,15,20,25,40],
            //title: 'Domicílio - Pessoas',
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
        }).disableSelection();
    
        function actions(com, grid) {
            var id = $('.trSelected', grid).find('td[abbr="Pessoa.nis"]').text();
            var nome = $('.trSelected', grid).find('td[abbr="Pessoa.nome"]').text();
            switch(com)
            {
                case "Incluir":
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoas', 'action' => 'cadastro')); ?>');
                    break;
                case "Excluir":
                    if(id != '')
                    {
                        if(confirm('Deseja realmente excluir?\nCliente: ' + nome))
                            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoas', 'action' => 'excluir')); ?>/' + id);
                    }
                    else
                        alert('Selecione um registro primeiro!');
                    break;
                }
            }
        });
</script>
<?php
$javascript->link(array('jquery.ui.datepicker-pt-BR', 'jquery.maskedinput-1.2.2.min', 'errormessage', 'maskinput', 'datepicker'), false);

echo $this->Form->create('Servico');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Endereço');
echo $this->Form->input('id', array('label' => 'Cód.'));
echo $this->Form->input('tipo_servico', array('label' => 'Tipo de Serviço', 'options' => Servico::tipoServico()));
echo $this->Form->input('descricao', array('label' => 'Descrição', 'class' => 'edit40'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('descricao_detalhada', array('label' => 'Descrição Detalhada', 'class' => 'edit100'));
echo $this->Html->div('', '', array('style' => 'clear: both;'));
echo $this->Form->input('faixa_etaria', array('label' => 'Faixa Etária'));
echo $this->Form->input('horario', array('label' => 'Horário'));
echo $this->Form->input('per_capita', array('label' => 'Valor per capita'));
echo $this->Form->input('capacidade', array('label' => 'Capacidade'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'servicos', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();

if ($this->data) {
    echo $this->Html->tag('div', '', array('style' => 'height: 20px;'));
    echo $this->Html->tag('fieldset', null);
    echo $this->Html->tag('legend', 'Serviços - Pessoas');
    echo '<table id="flex" style="display: none"></table>';
    echo $this->Html->tag('/fieldset', null);
}
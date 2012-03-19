<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<script type="text/javascript">
    $(function() {        
        $("#flex").flexigrid({
            url: '/helpdesk/domicilios/listaDomiciliosBairro/<?php echo $this->data['Bairro']['id'] ?>',
            dataType: 'json',
            colModel : [
                {display: 'Cód. Domiciliar', name : 'Domicilio.codigo_domiciliar', width : 80, sortable : true, align: 'center', hide: false},
                {display: 'Responsavel', name : 'Responsavel.nome', width : 260, sortable : true, align: 'left'},
                {display: 'Logradouro', name : 'Domicilio.logradouro', width : 220, sortable : true, align: 'left'},
                {display: 'Número', name : 'Domicilio.numero', width : 40, sortable : true, align: 'center'},
                {display: 'Pessoas', name : 'Domicilio.pessoa_count', width : 50, sortable : true, align: 'left'}
            ],
            buttons : [
                {name: 'Incluir', bclass: 'add', onpress : actions},
                {separator: true},
                {name: 'Excluir', bclass: 'delete', onpress : actions},
                {separator: true}
            ],
            searchitems : [
                {display: 'Nome', name : 'Bairro.nome', isdefault: true}
            ],
            sortname: "Bairro.nome",
            sortorder: "asc",
            usepager: true,
            useRp: true,
            rp: 15,
            rpOptions: [10,15,20,25,40],
            //title: 'Domicílio - Pessoas',
            width: 870,
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
            var id = $('.trSelected').find('td[abbr="Domicilio.codigo_domiciliar"]').text();
            if(id != '')
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'cadastro')); ?>/' + id);
        }).disableSelection();
    
        function actions(com, grid) {
            var id = $('.trSelected', grid).find('td[abbr="Domicilio.codigo_domiciliar"]').text();
            var nome = $('.trSelected', grid).find('td[abbr="Responsavel.nome"]').text();
            switch(com)
            {
                case "Incluir":
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'cadastro')); ?>');
                    break;
                case "Excluir":
                    if(id != '')
                    {
                        if(confirm('Deseja realmente excluir?\nCliente: ' + nome))
                            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'excluir')); ?>/' + id);
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

echo $this->Form->create('Bairro');

echo $this->Html->tag('fieldset', null);
echo $this->Html->tag('legend', 'Endereço');
echo $this->Form->input('id', array('label' => 'Cód.'));
echo $this->Form->input('nome', array('label' => 'Nome'));
echo $this->Form->input('regiao_id', array('label' => 'Região'));
echo $this->Form->input('cras_id', array('label' => 'CRAS'));
echo $this->Html->tag('/fieldset', null);

echo $this->Form->button('Fechar', array(
    'type' => 'button',
    'onClick' => "window.location.href = '" . $this->Html->url(array('controller' => 'bairros', 'action' => 'index')) . "';"
));
echo $this->Form->button('Salvar', array('type' => 'submit'));
echo $this->Form->end();

if ($this->data) {
    echo $this->Html->tag('div', '', array('style' => 'height: 20px;'));
    echo $this->Html->tag('fieldset', null);
    echo $this->Html->tag('legend', 'Bairros - Domicílios');
    echo '<table id="flex" style="display: none"></table>';
    echo $this->Html->tag('/fieldset', null);
}
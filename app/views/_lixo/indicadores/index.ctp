<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => 'indicadores', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'ID', name : 'Indicador.id', width : 50, sortable : true, align: 'center', hide: true},
            {display: 'Dimensão', name : 'Indicador.dimensao', width : 150, sortable : true, align: 'left'},
            {display: 'Código', name : 'Indicador.codigo', width : 80, sortable : true, align: 'left'},
            {display: 'Descrição', name : 'Indicador.descricao', width : 600, sortable : true, align: 'left'},
            {display: 'Label', name : 'Indicador.label', width : 600, sortable : true, align: 'left', hide: true}
        ],
        buttons : [
            {name: 'Incluir', bclass: 'add', onpress : actions},
            {separator: true},
            {name: 'Editar', bclass: 'edit', onpress : actions},
            {separator: true},
            {name: 'Excluir', bclass: 'delete', onpress : actions},
            {separator: true}
        ],
        searchitems : [
            {display: 'Indicador', name : 'Indicador.nome', isdefault: true}
        ],
        sortname: "Indicador.codigo",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: 'indicadores',
        width: 920,
        height: 370,
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
        var id = $('.trSelected').find('td[abbr="Indicador.id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'indicadores', 'action' => 'cadastro')); ?>/' + id);
    });
    //}).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Indicador.id"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="Indicador.nome"]').text();
        switch(com)
        {
            case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'indicadores', 'action' => 'cadastro')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'indicadores', 'action' => 'cadastro')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Excluir":
                if(id != '')
                {
                    if(confirm('Deseja realmente excluir?\nCliente: ' + nome))
                        $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'indicadores', 'action' => 'excluir')); ?>/' + id);
                }
                else
                    alert('Selecione um registro primeiro!');
                break;
            }
        }
</script>
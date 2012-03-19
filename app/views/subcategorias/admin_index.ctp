<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('admin' => true, 'controller' => 'subcategorias', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'ID', name : 'Subcategoria.id', width : 30, sortable : true, align: 'center', hide: false},
            {display: 'Categoria', name : 'Categoria.descricao', width : 250, sortable : true, align: 'left'},
            {display: 'Descrição', name : 'Subcategoria.descricao', width : 320, sortable : true, align: 'left'},
            {display: 'Prioridade', name : 'Subcategoria.prioridade', width : 80, sortable : true, align: 'left'},
            {display: 'TMA', name : 'Subcategoria.tma', width : 50, sortable : true, align: 'center'}
        ],
        buttons : [
            {name: 'Incluir', bclass: 'add', onpress : actions},
            {separator: true},
            {name: 'Editar', bclass: 'edit', onpress : actions},
            {separator: true},
            {name: 'Excluir', bclass: 'delete', onpress : actions},
            {separator: true}
        ],
//        searchitems : [
//            {display: 'Ação', name : 'Subcategoria.descricao', isdefault: true}
//        ],
        sortname: "Subcategoria.descricao",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: 'Subcategorias',
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
        var id = $('.trSelected').find('td[abbr="Subcategoria.id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'subcategorias', 'action' => 'editar')); ?>/' + id);
    });
    //}).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Subcategoria.id"]').text();
        var descricao = $('.trSelected', grid).find('td[abbr="Subcategoria.descricao"]').text();
        switch(com)
        {
            case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'subcategorias', 'action' => 'incluir')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'subcategorias', 'action' => 'editar')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Excluir":
                if(id != '')
                {
                    if(confirm('Deseja realmente excluir?\nSubcategoria: ' + descricao))
                        $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'subcategorias', 'action' => 'excluir')); ?>/' + id);
                }
                else
                    alert('Selecione um registro primeiro!');
                break;
            }
        }
</script>
<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categorias', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'ID', name : 'Categoria.id', width : 50, sortable : true, align: 'center', hide: false},
            {display: 'Descrição', name : 'Categoria.descricao', width : 350, sortable : true, align: 'left'},
            {display: 'Categorias', name : 'Categoria.subcategoria_count', width : 60, sortable : true, align: 'center'}
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
//            {display: 'Ação', name : 'Categoria.descricao', isdefault: true}
//        ],
        sortname: "Categoria.descricao",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: 'Categorias',
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
        var id = $('.trSelected').find('td[abbr="Categoria.id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categorias', 'action' => 'editar')); ?>/' + id);
    });
    //}).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Categoria.id"]').text();
        var descricao = $('.trSelected', grid).find('td[abbr="Categoria.descricao"]').text();
        switch(com)
        {
            case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categorias', 'action' => 'incluir')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categorias', 'action' => 'editar')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Excluir":
                if(id != '')
                {
                    if(confirm('Deseja realmente excluir?\nCategoria: ' + descricao))
                        $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'categorias', 'action' => 'excluir')); ?>/' + id);
                }
                else
                    alert('Selecione um registro primeiro!');
                break;
            }
        }
</script>
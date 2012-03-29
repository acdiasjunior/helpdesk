<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('admin' => true, 'controller' => 'usuarios', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'ID', name : 'Usuario.id', width : 50, sortable : true, align: 'center', hide: false},
            {display: 'Nome', name : 'Usuario.nome', width : 140, sortable : true, align: 'left'},
            {display: 'Login', name : 'Usuario.username', width : 120, sortable : true, align: 'left'},
            {display: 'Email', name : 'Usuario.email', width : 200, sortable : true, align: 'left'},
            {display: 'Grupo', name : 'Grupo.nome', width : 180, sortable : true, align: 'left'},
            {display: 'Tipo', name : 'Usuario.tipo_usuario', width : 110, sortable : true, align: 'left'}
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
            {display: 'Nome', name : 'Usuario.nome', isdefault: true},
            {display: 'Login', name : 'Usuario.username', isdefault: true},
            {display: 'Grupo', name : 'Grupo.nome', isdefault: true}
        ],
        sortname: "Usuario.nome",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: 'Usuários',
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
        var id = $('.trSelected').find('td[abbr="Usuario.id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'usuarios', 'action' => 'editar')); ?>/' + id);
    });
    //}).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Usuario.id"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="Usuario.nome"]').text();
        switch(com)
        {
            case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'usuarios', 'action' => 'incluir')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'usuarios', 'action' => 'editar')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Excluir":
                if(id != '')
                {
                    if(confirm('Deseja realmente excluir?\nUsuario: ' + nome))
                        $(location).attr('href','<?php echo $this->Html->url(array('admin' => true, 'controller' => 'usuarios', 'action' => 'excluir')); ?>/' + id);
                }
                else
                    alert('Selecione um registro primeiro!');
                break;
            }
        }
</script>
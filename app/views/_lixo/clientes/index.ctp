<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => 'clientes', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'Id', name : 'id', width : 40, sortable : true, align: 'center'}, //, hide: true},
            {display: 'Tipo', name : 'tipo', width : 120, sortable : true, align: 'left'},
            {display: 'Nome', name : 'nome', width : 250, sortable : true, align: 'left'},
            {display: 'Cidade', name : 'cidade', width : 160, sortable : true, align: 'left'},
            {display: 'UF', name : 'uf', width : 30, sortable : true, align: 'center'},
            {display: 'Email', name : 'email', width : 160, sortable : true, align: 'left'}
        ],
        buttons : [
            {name: 'Incluir PF', bclass: 'add', onpress : actions},
            {name: 'Incluir PJ', bclass: 'add', onpress : actions},
            {name: 'Editar', bclass: 'edit', onpress : actions},
            {name: 'Excluir', bclass: 'delete', onpress : actions},
            {separator: true}
        ],
        searchitems : [
            {display: 'Nome', name : 'nome', isdefault: true},
            {display: 'Cidade', name : 'cidade'},
            {display: 'UF', name : 'uf'},
            {display: 'E-mail', name : 'email'}
        ],
        sortname: "nome",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [10,15,20,25,40],
        title: 'Clientes',
        width: 920,
        height: 350,
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
        var id = $('.trSelected').find('td[abbr="id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'clientes', 'action' => 'cadastro')); ?>/' + id);
    }).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="id"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="nome"]').text();
        switch(com)
        {
            case "Incluir PF":
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoasFisicas', 'action' => 'cadastro')); ?>');
                break;
            case "Incluir PJ":
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoasJuridicas', 'action' => 'cadastro')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'clientes', 'action' => 'cadastro')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Excluir":
                if(id != '')
                {
                    if(confirm('Deseja realmente excluir?\nCliente: ' + nome))
                        $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'clientes', 'action' => 'excluir')); ?>/' + id);
                }
                else
                    alert('Selecione um registro primeiro!');
                break;
            }
        }
</script>
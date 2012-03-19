<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => 'pessoas', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'NIS', name : 'Pessoa.nis', width : 80, sortable : true, align: 'center'}, //, hide: true},
            {display: 'Nome', name : 'Pessoa.nome', width : 240, sortable : true, align: 'left'},
            {display: 'Idade', name : 'Pessoa.data_nascimento', width : 45, sortable : true, align: 'center'},
            {display: 'Responsável Legal', name : 'Responsavel.nome', width : 240, sortable : true, align: 'left'},
            {display: 'NIS Responsável', name : 'Responsavel.nis', width : 80, sortable : true, align: 'center'}
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
            {display: 'NIS', name : 'Pessoa.nis'},
            {display: 'Nome', name : 'Pessoa.nome', isdefault: true},
            {display: 'Responsável', name : 'Responsavel.nome'},
            {display: 'NIS Responsável', name : 'Responsavel.nis'}
        ],
        sortname: "Pessoa.nome",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: 'Cadastro - Pessoas',
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
        var id = $('.trSelected').find('td[abbr="Pessoa.nis"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoas', 'action' => 'cadastro')); ?>/' + id);
    });
    //}).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Pessoa.nis"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="nome"]').text();
        switch(com)
        {
            case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoas', 'action' => 'cadastro')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'pessoas', 'action' => 'cadastro')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
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
</script>
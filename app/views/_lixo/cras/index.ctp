<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => 'cras', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'Cód.', name : 'Cras.id', width : 30, sortable : true, align: 'center', hide: true},
            {display: 'Descrição', name : 'Cras.descricao', width : 190, sortable : true, align: 'left'},
            {display: 'Logradouro', name : 'Cras.logradouro', width : 190, sortable : true, align: 'left'},
            {display: 'Numero', name : 'Cras.numero', width : 40, sortable : true, align: 'center'},
            {display: 'Bairro', name : 'Bairro.nome', width : 105, sortable : true, align: 'left'},
            {display: 'Cidade', name : 'Cras.cidade', width : 105, sortable : true, align: 'left'},
            {display: 'UF', name : 'Cras.uf', width : 30, sortable : true, align: 'left'},
            {display: 'Região', name : 'Regiao.descricao', width : 70, sortable : true, align: 'center'}
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
            {display: 'Descrição', name : 'Cras.descricao', isdefault: true},
            {display: 'Logradouro', name : 'Cras.logradouro'},
            {display: 'Bairro', name : 'Bairro.nome'},
            {display: 'Cidade', name : 'Cras.cidade'}
        ],
        sortname: "Cras.descricao",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: 'CRAS',
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
        var id = $('.trSelected').find('td[abbr="Cras.id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'cras', 'action' => 'cadastro')); ?>/' + id);
    });
    //}).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Cras.id"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="nome"]').text();
        switch(com)
        {
            case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'cras', 'action' => 'cadastro')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'cras', 'action' => 'cadastro')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Excluir":
                if(id != '')
                {
                    if(confirm('Deseja realmente excluir?\nCliente: ' + nome))
                        $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'cras', 'action' => 'excluir')); ?>/' + id);
                }
                else
                    alert('Selecione um registro primeiro!');
                break;
            }
        }
</script>
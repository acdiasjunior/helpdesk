$(document).ready(function(){
    $("#flex").flexigrid({
        url: webroot + '/chamados/lista/' + filtro,
        dataType: 'json',
        colModel : [
        {
            display: 'ID', 
            name : 'Chamado.id', 
            width : 50, 
            sortable : true, 
            align: 'center', 
            hide: false
        },

        {
            display: 'Responsável', 
            name : 'Responsavel.nome', 
            width : 150, 
            sortable : true, 
            align: 'left'
        },

        {
            display: 'Categoria', 
            name : 'Categoria.descricao', 
            width : 370, 
            sortable : true, 
            align: 'left'
        },

        {
            display: 'Status', 
            name : 'Chamado.status', 
            width : 80, 
            sortable : true, 
            align: 'left'
        }
        ],
        buttons : [
        {
            name: 'Interagir', 
            bclass: 'edit', 
            onpress : actions
        },

        {
            separator: true
        }
        ],
        searchitems : [
        {
            display: 'Usuário', 
            name : 'Usuario.nome', 
            isdefault: true
        },

        {
            display: 'Responsável', 
            name : 'Responsavel.nome'
        },

        {
            display: 'Categoria', 
            name : 'Categoria.descricao'
        }
        ],
        sortname: "Chamado.id",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: '<?php echo $title_for_layout; ?>',
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
    
    $('#flex').click( function(){
        var id = $('.trSelected').find('td[abbr="Chamado.id"]').text();
        var status = $('.trSelected').find('td[abbr="Chamado.status"]').text();
        if(id != '')
            interagir(id, status);
    });
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Chamado.id"]').text();
        var status = $('.trSelected', grid).find('td[abbr="Chamado.status"]').text();
        switch(com)
        {
            case "Interagir":
                interagir(id, status);
                break;
        }
    }
    
    function interagir(id, status) {
        document.location = webroot + '/chamados/interagir/' + id;
    }
});
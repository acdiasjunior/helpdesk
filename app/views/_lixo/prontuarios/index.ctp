<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
?>
<table id="flex" style="display: none"></table> 
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => 'prontuarios', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'ID', name : 'Prontuario.id', width : 40, sortable : true, align: 'center'}, //, hide: true},
            {display: 'Núm.', name : 'Prontuario.numero_prontuario', width : 60, sortable : true, align: 'center'},
            {display: 'Cód. Domiciliar', name : 'Domicilio.codigo_domiciliar', width : 80, sortable : true, align: 'center'},
            {display: 'IDF', name : 'Indice.indice', width : 40, sortable : true, align: 'center'},
            {display: 'Usuário', name : 'Usuario.nome', width : 220, sortable : true, align: 'left'},
            {display: 'Data', name : 'Prontuario.created', width : 110, sortable : true, align: 'center'}
            /*
             * $prontuario['Prontuario']['id'],
            $prontuario['Prontuario']['numero'],
            $prontuario['Domicilio']['codigo_domiciliar'],
            round($prontuario['Indice']['idf'],2),
            $prontuario['Usuario']['nome'],
            $prontuario['Prontuario']['created'],
             */
        ],
        buttons : [
            {name: 'Exibir', bclass: 'show', onpress : actions},
            {separator: true}
        ],
        searchitems : [
            {display: 'Cód. Domiciliar', name : 'Domicilio.codigo_domiciliar', isdefault: true},
            {display: 'Responsável', name : 'Responsavel.nome'},
            {display: 'Logradouro', name : 'Domicilio.logradouro'},
            {display: 'Bairro', name : 'Bairro.nome'},
            {display: 'Cidade', name : 'Domicilio.cidade'}
        ],
        sortname: "Domicilio.codigo_domiciliar",
        sortorder: "asc",
        usepager: true,
        useRp: true,
        rp: 15,
        rpOptions: [15,30,50,100],
        title: 'Prontuários',
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
        var id = $('.trSelected').find('td[abbr="Prontuario.id"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'prontuarios', 'action' => 'exibirProntuario')); ?>/' + id);
    });
    //}).disableSelection();
    
    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Prontuario.id"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="Usuario.nome"]').text();
        switch(com)
        {
            case "Exibir":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'prontuarios', 'action' => 'exibirProntuario')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
             default:
                 break;
        }
    }
</script>
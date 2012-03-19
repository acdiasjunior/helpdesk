<?php
echo $this->Html->css(array('flexigrid'));
echo $javascript->link(array('flexigrid.pack', 'button'));
$flexigridSession = $this->params['controller'] . '.' . $this->params['action'] . '.flexigrid';
?>
<table id="flex" style="display: none"></table>
<script type="text/javascript">
    $("#flex").flexigrid({
        url: '<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'lista')); ?>',
        dataType: 'json',
        colModel : [
            {display: 'Cód. Dom.', name : 'Domicilio.codigo_domiciliar', width : 55, sortable : true, align: 'center'}, //, hide: true},
            {display: 'Responsável', name : 'Responsavel.nome', width : 210, sortable : true, align: 'left'},
            {display: 'Logradouro', name : 'Domicilio.logradouro', width : 190, sortable : true, align: 'left'},
            {display: 'Numero', name : 'Domicilio.numero', width : 40, sortable : true, align: 'center'},
            {display: 'Bairro', name : 'Bairro.nome', width : 105, sortable : true, align: 'left'},
            {display: 'IDF', name : 'Indice.idf', width : 30, sortable : true, align: 'center'},
            {display: 'Renda Familiar', name : 'Domicilio.renda_familiar', width : 70, sortable : true, align: 'center'},
            {display: 'Qtd.', name : 'Domicilio.pessoa_count', width : 20, sortable : true, align: 'center'},
            {display: 'Renda per Cap.', name : 'Domicilio.renda_per_capita', width : 70, sortable : true, align: 'center'}
        ],
        buttons : [
            {name: 'Incluir', bclass: 'add', onpress : actions},
            {separator: true},
            {name: 'Editar', bclass: 'edit', onpress : actions},
            {separator: true},
            {name: 'Excluir', bclass: 'delete', onpress : actions},
            {separator: true},
            {name: 'Prontuario', bclass: 'prontuario', onpress : actions},
            {separator: true}
        ],
        searchitems : [
            {display: 'Cód. Domiciliar', name : 'Domicilio.codigo_domiciliar', isdefault: true},
            {display: 'Responsável', name : 'Responsavel.nome'},
            {display: 'IDF <=', name : 'Domicilio.idf'},
            {display: 'Logradouro', name : 'Domicilio.logradouro'},
            {display: 'Bairro', name : 'Bairro.nome'},
            {display: 'Cidade', name : 'Domicilio.cidade'}
        ],
        sortname: '<?php echo ($this->Session->check($flexigridSession)) ? $this->Session->read($flexigridSession . '.sortname') : 'Domicilio.codigo_domiciliar'; ?>',
        sortorder: '<?php echo ($this->Session->check($flexigridSession)) ? $this->Session->read($flexigridSession . '.sortorder') : 'asc'; ?>',
        page: <?php echo ($this->Session->check($flexigridSession)) ? $this->Session->read($flexigridSession . '.page') : 1; ?>,
        usepager: true,
        useRp: true,
        rp: <?php echo ($this->Session->check($flexigridSession)) ? $this->Session->read($flexigridSession . '.rp') : '15'; ?>,
        rpOptions: [15,30,50,100],
        qtype: '<?php echo ($this->Session->check($flexigridSession)) ? $this->Session->read($flexigridSession . '.qtype') : 'Domicilio.codigo_domiciliar'; ?>',
        query: '<?php echo ($this->Session->check($flexigridSession)) ? $this->Session->read($flexigridSession . '.query') : ''; ?>',
        title: 'Domicílios',
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
        var id = $('.trSelected').find('td[abbr="Domicilio.codigo_domiciliar"]').text();
        if(id != '')
            $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'cadastro')); ?>/' + id);
    });
    //}).disableSelection();

    function actions(com, grid) {
        var id = $('.trSelected', grid).find('td[abbr="Domicilio.codigo_domiciliar"]').text();
        var nome = $('.trSelected', grid).find('td[abbr="Responsavel.nome"]').text();
        switch(com)
        {
            case "Incluir":
                $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'cadastro')); ?>');
                break;
            case "Editar":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'cadastro')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Excluir":
                if(id != '')
                {
                    if(confirm('Deseja realmente excluir?\nResponsável Legal: ' + nome))
                        $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'domicilios', 'action' => 'excluir')); ?>/' + id);
                }
                else
                    alert('Selecione um registro primeiro!');
                break;
            case "Prontuario":
                if(id != '')
                    $(location).attr('href','<?php echo $this->Html->url(array('controller' => 'prontuarios', 'action' => 'gerar')); ?>/' + id);
                else
                    alert('Selecione um registro primeiro!');
                break;
            }
        }
        
        window.onbeforeunload = function() {
            $.ajax({
                url: '<?php echo $this->Html->url(array('controller' => 'usuarios', 'action' => 'gravaParametros')) ?>',
                type: 'POST',
                async: false,
                data: {
                    controller: '<?php echo $this->params['controller'] ?>',
                    action: '<?php echo $this->params['action'] ?>',
                    rp: $(".flexigrid .pGroup select").val(),
                    qtype: $(".flexigrid .sDiv select").val(),
                    query: $(".flexigrid .qsbox").val(),
                    page: $('.flexigrid .pcontrol :input').val(),
                    sortname: $('.flexigrid .sorted').attr('abbr'),
                    sortorder: $('.flexigrid .sorted div').attr('class').substr(1,5)
                }
            });
        };
        
</script>
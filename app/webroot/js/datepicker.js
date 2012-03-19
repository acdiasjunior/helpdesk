// JavaScript Document

$(document).ready(function ()
{
    //$.datepicker.setDefaults( $.datepicker.regional[ "pt-BR" ] );
    $(".maskdata").datepicker({
        showOn: "button",
        buttonImage: "/prefeitura/img/calendar.gif",
        buttonImageOnly: true
    });

    $('#SolicitacaoDataSolicitacao').datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss'
    });
    
    var data_solicitacao = $('#SolicitacaoDataSolicitacao').datetimepicker('getDate');
    
    $('#SolicitacaoDataPrevisao').datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss',
	minDate: data_solicitacao
    });
    $(".maskdatahora").datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss'
    });
});

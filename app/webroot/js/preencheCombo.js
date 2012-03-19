// JavaScript Document

$(document).ready(function () 
{

    $("#RelatorioRegiaoId").change(function ()
    {
        id = $(this).val();
        $.ajax({
            url: "/prefeitura/cras/preencheCombo/" + id,
            success: function(data){
                $("#RelatorioCrasId").html(data);
            }
        }); 
    });

    $("#RelatorioCrasId").change(function ()
    {
        id = $(this).val();
        $.ajax({
            url: "/prefeitura/bairros/preencheCombo/" + id,
            success: function(data){
                $("#RelatorioBairroId").html(data);
            }
        }); 
    });

});

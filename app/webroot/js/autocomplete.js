// JavaScript Document
$(function() {
    $(".nomeResponsavelAutocomplete").autocomplete({
        minLength: 2,
        source: function(request, response) {
            $.ajax({
                url: "/prefeitura/pessoas/listaNomesResponsavel",
                data: request,
                dataType: "json",
                type: "POST",
                success: function(data){
                    response(data);
                }
            });
        },
        select: function(event, response) {
            $('input[id$="ResponsavelId"]').val(response.item.id);
        }
    })
    .blur(function ()
    {
        if($(this).val() == '')
            $('input[id$="ResponsavelId"]').val('');
    });
    
    $(".nomesAutocomplete").autocomplete({
        minLength: 2,
        source: function(request, response) {
            $.ajax({
                url: "/prefeitura/pessoas/listaNomes",
                data: request,
                dataType: "json",
                type: "POST",
                success: function(data){
                    response(data);
                }
            });
        },
        select: function(event, response) {
            $('#DomicilioResponsavelId').val(response.item.id);
        }
    })
    .blur(function ()
    {
        if($(this).val() == '')
            $('#DomicilioResponsavelId').val('');
    });
    
    $(".nomeConjugeAutocomplete").autocomplete({
        minLength: 2,
        source: function(request, response) {
            $.ajax({
                url: "/prefeitura/pessoas/listaNomesConjuge/" + $('select[id$="Sexo"]').val(),
                data: request,
                dataType: "json",
                type: "POST",
                success: function(data){
                    response(data);
                }
            });
        },
        select: function(event, response) {
            $('input[id$="ConjugeId"]').val(response.item.id);
        }
    })
    .blur(function ()
    {
        if($(this).val() == '')
            $('input[id$="ConjugeId"]').val('');
    });
    
    $(".profissaoAutocomplete").autocomplete({
        minLength: 2,
        source: function(request, response) {
            $.ajax({
                url: "/prefeitura/profissoes/listaProfissoes",
                data: request,
                dataType: "json",
                type: "POST",
                success: function(data){
                    response(data);
                }
            });
        },
        select: function(event, response) {
            $('input[id$="ProfissaoId"]').val(response.item.id);
        }
    })
    .blur(function ()
    {
        if($(this).val() == '')
            $('input[id$="ProfissaoId"]').val('');
    });
});
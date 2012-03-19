// JavaScript Document

function consultaCep()
{
    $('.loading').css('visibility','visible');
    var cep = $('input[id$="Cep"]').val();
    var resultado = $.ajax({
        dataType: 'json',
        url: '/prefeitura/ceps/consultaCep/' + cep,
        async: false,
        success: function(resultadoCEP){
            if(resultadoCEP.alerta == "") {
                $('input[id$="Logradouro"]').val(resultadoCEP.logradouro);
                $('input[id$="Bairro"]').val(resultadoCEP.bairro);
                $('input[id$="Cidade"]').val(resultadoCEP.cidade);
                $('input[id$="Uf"]').val(resultadoCEP.uf);
            }else{
                alert('CEP não encontrado!');
                $('input[id$="Logradouro"]').val('');
                $('input[id$="Bairro"]').val('');
                $('input[id$="Cidade"]').val('');
                $('input[id$="Uf"]').val('');
            }
        }
    });
    $('.loading').css('visibility', 'hidden');
}
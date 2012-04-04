$(document).ready(function() {
    $('#ChamadoSubcategoriaId').parent().hide();
    $('#ChamadoCategoriaId').change(function (){
        $('#ChamadoSubcategoriaId').parent().hide();
        id = $(this).val();
        $.ajax({
            url: webroot + '/subcategorias/listaSubcategorias/' + id,
            success: function(data){
                $("#ChamadoSubcategoriaId").html(data);
                $('#ChamadoSubcategoriaId').parent().show();
            }
        });
    });
        
    $('#ChamadoAbrirChamadoForm').validate({
        rules: {
            'data[Chamado][categoria_id]' : {required: true},
            'data[Chamado][assunto]' : {required: true},
            'data[Chamado][texto]' : {required: true}
        },
        messages: {
            'data[Chamado][categoria_id]' : {required: 'Você deve selecionar uma categoria.'},
            'data[Chamado][assunto]' : {required: 'Por favor, informe o assunto.'},
            'data[Chamado][texto]' : {required: 'Escreva uma descrição do problema.'}
        }
    });
});
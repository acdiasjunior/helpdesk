$(function(){
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
});
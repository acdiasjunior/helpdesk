/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function validaCampo(campo, aba, texto){
    var valor = $("#" + campo).val();
    if(valor == '')
    {
        $('#' + campo).after('<div class="error-message" title="Fechar">' + texto + '</div>')
        .change(function ()
        {
            $(this).parent().find(".error-message").hide();
        });
        $(".error-message")
        .click(function ()
        {
            $(this).hide();
        });
        $("#tabs").tabs("select",aba);
        $("#" + campo).focus();
        return true;
    }else{
        return false;
    }
}
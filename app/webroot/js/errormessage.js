// JavaScript Document

$(document).ready(function () 
{

    $(".error input").change(function ()
    {
        $(this).parent().find(".error-message").hide();
    });

    $(".error-message")
    .attr("title", "Fechar")
    .click(function ()
    {
        $(this).hide();
    });

});

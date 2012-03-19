// JavaScript Document

$(document).ready(function () 
{
    jQuery(function($){
        $('.quicksave')
        .click(function(){
            $(this).parents("form:first").ajaxSubmit({
                success: function(responseText, responseCode) {
                    $('#ajax-save-message').hide().html(responseText).fadeIn();
                    setTimeout(function(){
                        $('#ajax-save-message').fadeOut();
                    }, 5000);
                }
            });
            return false;
        });
    });
});
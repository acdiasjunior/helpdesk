// JavaScript Document

$(function() {
    var $first = $('form:not(.filter) :input:visible:first');
    var label = $first.prev().html();
    var maxchar = parseInt($first.attr('maxchar'));
    
    $('.keycount')
    .focus(function(){
        label = $(this).prev().html();
        console.log(label);
        maxchar = parseInt($(this).attr('maxchar'));
    })
    .keyup(function()
    {
        if($(this).val().length > maxchar)
            $(this).val($(this).val().substr(0, maxchar));
        var total = parseInt($(this).val().length);
        $(this).prev().html(label + ' - caracteres digitados: <b>' + total + '</b> de ' + maxchar + '.');
    })
    .blur(function(){
        $(this).prev().html(label);
    });
});
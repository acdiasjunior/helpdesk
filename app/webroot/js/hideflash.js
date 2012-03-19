// JavaScript Document

$(document).ready(function () 
{
    setTimeout(hideflash, 6000);
});

function hideflash () {
    $('#authMessage').fadeOut(800);
    $('#flashMessage').fadeOut(800);
}
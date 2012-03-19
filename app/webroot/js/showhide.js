// JavaScript Document

$(document).ready(function () 
{
	showhide('equipe','Equipe');
	showhide('atividades','Atividades');
	showhide('identificacao','Identificação');
	showhide('observacoes','Observações');
	showhide('dadoslocalidade','Dados da Localidade');
	showhide('descricao','Descrição');
	showhide('datadeslocamento','Data e Deslocamento');
	showhide('deslocamentos','Deslocamentos');
	showhide('movimentos','Movimentação Financeira');
});

function showhide (classe,titulo) {
	$('legend.' + classe).click( function()
	{
		$('div.' + classe).animate({
			height: 'toggle'
		}, 200, function() {
			if($('div.' + classe).css('display') == 'block') {
				$('legend.' + classe).text(titulo + ' [ - ]');
			}else{
				$('legend.' + classe).text(titulo + ' [ + ]');
			}
		});
	});
}

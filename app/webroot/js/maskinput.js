// JavaScript Document

// JavaScript Document

$(document).ready(function () 
{
	$.mask.definitions['~']='[0-3]';
	$.mask.definitions['^']='[0-1]';
	$.mask.definitions['#']='[1-2]';
	$(".maskdata").mask("~9/^9/#999");
        $(".maskdatahora").mask("~9/^9/#999 99:99:99");
	$(".maskplaca").mask("aaa-9999");
	$(".masktelefone").mask("(99) 9999-9999");
	$(".maskcep").mask("99.999-999");
	$(".maskcpf").mask("999.999.999-99");
	$(".maskcnpj").mask("99.999.999/9999-99");
	
	/*
	var tipo = $('select:regex(id,Tipo)').val();
	if(typeof tipo != 'undefined'){
		setMask(tipo);
	}
	
	$('select:regex(id,Tipo)').change(function ()
	{
		var tipo = $(this).val();
		if(typeof tipo != 'undefined'){
			setMask(tipo);
		};
	});
	*/
});
/*
function setMask (tipo) {
	if(tipo == 'F') {
		$('input:regex(id,CpfCnpj)').unmask("99.999.999/9999-99");
		$('input:regex(id,CpfCnpj)').mask("999.999.999-99");
		$('label:regex(for,NomeRazao)').text('Nome');
		$('label:regex(for,CpfCnpj)').text('CPF');
		$('label:regex(for,RgIe)').text('RG');
		$('label:regex(for,InscMun)').text('Titulo Eleitor');
	} else if(tipo == 'J') {
		$('input:regex(id,CpfCnpj)').unmask("999.999.999-99");
		$('input:regex(id,CpfCnpj)').mask("99.999.999/9999-99");
		$('label:regex(for,NomeRazao)').text('Razão Social');
		$('label:regex(for,CpfCnpj)').text('CNPJ');
		$('label:regex(for,RgIe)').text('Insc. Estadual');
		$('label:regex(for,InscMun)').text('Insc. Municipal');
	}
}


/*
$(document).ready(function () 
{
	$.mask.definitions['~']='[0-3]';
	$.mask.definitions['^']='[0-1]';
	$.mask.definitions['#']='[1-2]';
	$(".maskdata").mask("~9/^9/#999");
	$(".maskplaca").mask("aaa-9999");
	$(".masktelefone").mask("(99) 9999-9999");
	$(".maskcep").mask("99.999-999");
	$(".maskcpf").mask("999.999.999-99");
	$(".maskcnpj").mask("99.999.999/9999-99");
});
*/

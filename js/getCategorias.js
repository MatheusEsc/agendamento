$(document).ready(function(){
	$('#categoria').empty(); //Limpando a tabela
	$.ajax({
		type:'post',	//Definimos o método HTTP usado
		dataType: 'json',	//Definimos o tipo de retorno
		url: '../controller/getCategorias.php',	//Definindo o arquivo onde serão buscados os dados
		success: function(dados){
			$('#categoria').append('<option value="">-Selecione-</option>');
			for(var i=0;dados.length>i;i++){
				//Adicionando registros retornados na tabela
				$('#categoria').append('<option value="'+dados[i].TA_NOME+'">'+dados[i].TA_NOME+'</option>');
			}
		}
	});
});

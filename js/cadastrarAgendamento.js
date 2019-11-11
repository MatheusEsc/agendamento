	var formulario = document.querySelector("#cadastrar_agendamento");
	
	var botao = document.querySelector("#confirmar");
	botao.addEventListener("click", function(event){
		event.preventDefault();

		$("#info").html("");
		document.querySelector("#erro").style.display = "none";
		document.querySelector("#erro_horario").style.display = "none";
		document.querySelector("#existente").style.display = "none";
		document.querySelector("#campos").style.display = "none";

		var nome = formulario.nome.value;
		var dataNasc = formulario.dataNasc.value;
		var mae = formulario.mae.value;
		var pai = formulario.pai.value;
		var email = formulario.email.value;
		var celular = formulario.celular.value;
		var rg = formulario.rg.value;
		var cpf = formulario.cpf.value;
		var categoria = formulario.categoria.value;
		var dataAg = formulario.dataAg.value;
		var horario = formulario.hr.value;

		if(nome=='' || dataNasc=='' || mae=='' || celular=='' || rg=='' || cpf=='' || categoria=='' || dataAg=='' || horario==''){

			document.querySelector("#campos").style.display = "block";
			botao.disabled=false;

		} else {

			$.ajax({
				url : '../controller/conferirAgendamento.php',
				data: {dataAg : dataAg, cpf : cpf},
				type : 'post',
				dataType : 'json',
				error: function() {	

				},
				success : function(result){

					if(result.retorno==true){

						document.querySelector("#existente").style.display = "block";
						botao.disabled=false;

					} else {

					$.ajax({
						url : '../controller/conferirDisponibilidade.php',
						data: {categoria : categoria, dataAg : dataAg, horario : horario},
						type : 'post',
						dataType : 'json',
						error: function() {					
						},
						success : function(info){

							if (info.retorno==true){

								$.ajax({
									url : '../controller/cadastrarAgendamento.php',
									data: {nome : nome, dataNasc : dataNasc, mae : mae, pai : pai, email : email, celular : celular, rg : rg, cpf : cpf, categoria : categoria, dataAg : dataAg, horario : horario},
									type : 'post',
									dataType : 'json',
									error: function() {

										document.querySelector("#erro").style.display = "block";
										botao.disabled=false;
										
									},
									success : function(dados){

										if (dados.retorno=='erro') {

											document.querySelector("#erro").style.display = "block";
											botao.disabled=false;

										} else {

											$('#info').append(dados.retorno);

											document.getElementById("modal").click();

											formulario.reset();
											$("#instrucoes").html﻿('');
											document.querySelector("#horario").style.display = "none";
											document.querySelector("#spanValido").style.display = "none";

											botao.disabled=false;

										}
										
									},
								});

							} else if (info.retorno==false){

								document.querySelector("#erro_horario").style.display = "block";

							}
							
						},
					});

				}

				},
			});

		}


	})

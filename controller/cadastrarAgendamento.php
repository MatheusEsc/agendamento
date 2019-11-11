<?php

	include('../model/conexao.php');
	include('enviarEmail.php');

	date_default_timezone_set('America/Sao_Paulo');

	$nome = $_POST['nome'];
	$nome = utf8_decode($nome);
	
	$dataNasc = $_POST['dataNasc'];

	$mae = $_POST['mae'];
	$mae = utf8_decode($mae);

	if($_POST['pai']!=""){
		$pai = $_POST['pai'];
	} else {
		$pai = utf8_decode('NÃO PREENCHEU');
	}

	if($_POST['email']!=""){
		$email = $_POST['email'];
	} else {
		$email = utf8_decode('NÃO POSSUI');
	}

	$celular = $_POST['celular'];

	$rg = $_POST['rg'];
	$rg = str_replace(".", "", $rg);
	$rg = str_replace(",", "", $rg);
	$rg = str_replace("-", "", $rg);
	$rg = str_replace("/", "", $rg);

	$cpf = $_POST['cpf'];
	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace(",", "", $cpf);
	$cpf = str_replace("-", "", $cpf);
	$cpf = str_replace("/", "", $cpf);
	
	$categoria = $_POST['categoria'];
	$categoria = utf8_decode($categoria);

	$dataAg = $_POST['dataAg'];

	$horario = $_POST['horario'];

    $codigo = substr($categoria,0,1).substr($categoria,-1,1);

    $codigoFinal = substr($cpf,-2,2);

	$protocolo = $codigo.date("YmdHi").$codigoFinal;

	try{

		mysqli_query($connect, "INSERT INTO agendamentos (AG_ID, AG_CLIENTE, AG_DATA_NASC, AG_MAE, AG_PAI, AG_EMAIL, AG_CELULAR, AG_RG, AG_CPF, AG_CATEGORIA, AG_DATA_AGENDADA, AG_HORARIO, AG_DATA_REGISTRO, AG_STATUS) 
								VALUES (upper('$protocolo'), upper('$nome'), '$dataNasc', upper('$mae'), upper('$pai'), upper('$email'), '$celular', '$rg', '$cpf', upper('$categoria'), '$dataAg', '$horario', NOW(), 'PENDENTE');");


		$retorno = array('retorno' => '<strong>Protocolo: '.$protocolo.'</strong><p>Anote o número do protocolo pois será usado no momento do atendimento.</p><p>Caso tenha cadastrado um e-mail, o resumo de sua solicitação foi enviada na sua caixa de entrada. (Verifique sua caixa de Spam)</p><p style="color: red;">Favor chegar com 10 minutos de antecedência do horário agendado.</p><p><a href="http://clsystems.com.br/agendamento/view/consulta_cancelamento.html" style="text-decoration: none;">CLIQUE AQUI</a> para imprimir seu protocolo.</p><p>Qualquer dúvida entre em contato com a nossa central.</p>');

		echo json_encode($retorno);

		enviarEmail($email,$protocolo,$nome,$categoria,$dataAg,$horario);

				
	}catch(Exception $e){

		$retorno = array('retorno' => 'erro');
					
		echo json_encode($retorno);

	}finally{
		mysqli_close($connect);
	}


?>
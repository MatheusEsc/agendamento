<?php

		include("../model/conexao.php");

		$cpf = $_POST['cpf'];
		$cpf = str_replace(".", "", $cpf);
		$cpf = str_replace(",", "", $cpf);
		$cpf = str_replace("-", "", $cpf);
		$cpf = str_replace("/", "", $cpf);

		$dataAg = $_POST['dataAg'];

	try{

	
		$resultado = mysqli_query($connect, "SELECT * FROM agendamentos WHERE AG_CPF= '$cpf' AND AG_DATA_AGENDADA = '$dataAg' AND AG_STATUS = 'PENDENTE'");

		if(mysqli_num_rows($resultado)>0){

			$retorno = array('retorno' => true);
			
			echo json_encode($retorno);

		} else {

			$retorno = array('retorno' => false);
			
			echo json_encode($retorno);

		}

		
	}finally{

		mysqli_close($connect);

	}

?>
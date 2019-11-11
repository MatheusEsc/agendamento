<?php

 		include("../model/conexao.php");

		$cpf = $_POST['cpf'];
		$cpf = str_replace(".", "", $cpf);
		$cpf = str_replace(",", "", $cpf);
		$cpf = str_replace("-", "", $cpf);
		$cpf = str_replace("/", "", $cpf);

	try{

		$qryLista = mysqli_query($connect, "SELECT AG_ID, AG_CATEGORIA, AG_CLIENTE, DATE_FORMAT(AG_DATA_NASC,'%d/%m/%Y') AG_DATA_NASC, AG_MAE, AG_PAI, DATE_FORMAT(AG_DATA_AGENDADA,'%d/%m/%Y') AG_DATA_AGENDADA, AG_HORARIO, AG_STATUS FROM agendamentos 
											WHERE AG_CPF = '$cpf'
											ORDER BY AG_DATA_AGENDADA DESC, AG_HORARIO DESC 
											LIMIT 1");
		
		while($resultado = mysqli_fetch_assoc($qryLista)){ 
	        $vetor[] = array_map('utf8_encode', $resultado); 
	    }    
	    
	    //Passando vetor em forma de json
	    echo json_encode($vetor);
		
	}finally{

		mysqli_close($connect);

	}

//}
?>
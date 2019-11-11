<?php

		include("../model/conexao.php");

		$categoria = utf8_decode($_POST['categoria']);

	try{

	
		$qryLista = mysqli_query($connect, "SELECT * FROM tipo_atendimento WHERE TA_NOME = '$categoria'");
		
		while($resultado = mysqli_fetch_assoc($qryLista)){ 
	        $vetor[] = array_map('utf8_encode', $resultado); 
	    }    
	    
	    //Passando vetor em forma de json
	    echo json_encode($vetor);

		
	}finally{

		mysqli_close($connect);

	}

?>
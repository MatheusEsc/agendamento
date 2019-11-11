<?php

		include("../control/conexao.php");

		$categoria = utf8_decode($_POST['categoria']);
		$dataAg = utf8_decode($_POST['dataAg']);

	try{

	
		$qryLista = mysqli_query($connect, "SELECT DATE_FORMAT(H.HR_HORA,'%H:%i') HR_HORA FROM horarios H

											INNER JOIN periodos P
											ON H.PD_ID = P.PD_ID

											WHERE H.HR_DATA = '$dataAg'
											AND P.PD_CATEGORIA = '$categoria' 

											ORDER BY H.HR_HORA ASC");
		
		while($resultado = mysqli_fetch_assoc($qryLista)){ 
	        $vetor[] = array_map('utf8_encode', $resultado); 
	    }    
	    
	    //Passando vetor em forma de json
	    echo json_encode($vetor);

		
	}finally{

		mysqli_close($connect);

	}

?>
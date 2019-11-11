<?php

		include("../model/conexao.php");

		$categoria = utf8_decode($_POST['categoria']);
		$dataAg = $_POST['dataAg'];

	try{

	
		$qryLista = mysqli_query($connect, "SELECT DATE_FORMAT(H.HR_HORA,'%H:%i') HR_HORA, SUM(H.HR_QUANTIDADE) QTD_HORA, A.AG_ID QTD_AG FROM horarios H

											LEFT JOIN (SELECT AG_HORARIO, COUNT(AG_ID) AG_ID 
											FROM agendamentos 
											WHERE AG_CATEGORIA = '$categoria'
											AND AG_DATA_AGENDADA = '$dataAg'
											AND AG_STATUS NOT IN ('CANCELADO')
											GROUP BY AG_HORARIO) A ON H.HR_HORA = A.AG_HORARIO
											 
											INNER JOIN periodos P 
											ON H.PD_ID = P.PD_ID
											 
											WHERE H.HR_DATA = '$dataAg'
											AND P.PD_CATEGORIA = '$categoria'

											GROUP BY H.HR_HORA");
		
		while($resultado = mysqli_fetch_assoc($qryLista)){ 
	        $vetor[] = array_map('utf8_encode', $resultado); 
	    }    
	    
	    //Passando vetor em forma de json
	    echo json_encode($vetor);

		
	}finally{

		mysqli_close($connect);

	}

?>
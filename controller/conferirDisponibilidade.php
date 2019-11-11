<?php

		include("../model/conexao.php");

		$categoria = utf8_decode($_POST['categoria']);
		$dataAg = $_POST['dataAg'];
		$horario = date('H:i:s',strtotime($_POST['horario']));

	try{

	
		$resultado = mysqli_query($connect, "SELECT DATE_FORMAT(H.HR_HORA,'%H:%i') HR_HORA, SUM(H.HR_QUANTIDADE) QTD_HORA, A.AG_ID QTD_AG FROM horarios H

											LEFT JOIN (SELECT AG_HORARIO, COUNT(AG_ID) AG_ID 
											FROM agendamentos 
											WHERE AG_CATEGORIA = '$categoria'
											AND AG_DATA_AGENDADA = '$dataAg'
											AND AG_HORARIO = '$horario'
											AND AG_STATUS NOT IN ('CANCELADO')
											GROUP BY AG_HORARIO) A ON H.HR_HORA = A.AG_HORARIO
											 
											INNER JOIN periodos P 
											ON H.PD_ID = P.PD_ID
											 
											WHERE H.HR_DATA = '$dataAg'
											AND H.HR_HORA = '$horario'
											AND P.PD_CATEGORIA = '$categoria'

											GROUP BY H.HR_HORA");


		$horarios = mysqli_fetch_assoc($resultado);

		if($horarios['QTD_AG']<$horarios['QTD_HORA']){

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
<?php

 		include("../model/conexao.php");

		try{

		
			$qryLista = mysqli_query($connect, "SELECT * FROM tipo_atendimento");
			
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
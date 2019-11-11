<?php

    session_start();

    //Conectando ao banco de dados
    include("../model/conexao.php");

    $protocolo = $_GET['protocolo'];

    try
    {

        mysqli_query($connect, "UPDATE agendamentos SET AG_STATUS = 'CANCELADO' WHERE AG_ID = '$protocolo'"); 

        echo "<script>alert('Agendamento cancelado! Para reagendar basta ir para a página principal!');</script>";
        echo "<script>location.href='../view/consulta_cancelamento.html'</script>";        

    }
    finally
    {
      mysqli_close($connect);
    }
    
?>
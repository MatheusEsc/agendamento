<?php

$host = "localhost";
$user = "teste";
$pass = "00000";
$database = "agendamento";

$connect = mysqli_connect($host,$user,$pass) or die("Não foi possível conectar com o banco de dados");
		  mysqli_select_db($connect,$database) or die("Não foi possível selecionar o banco de dados");

?>
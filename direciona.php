<?php

	//abertura de seção
	session_start();

	//inclui o arquivo de conexão
	include("conexao.php");



	//atribui o privilegio do usuario a uma variavel
	$privilegio = $_SESSION['privilegio'];

	//testes e redirecionamentos para as respectivas paginas
	if($privilegio == 2)header("location:login_tecnico.php");
    elseif($privilegio == 3) header("location:admin.php");
    elseif($privilegio == 1) header("location:login_cliente.php");
    else header("location:index.php");
?>	        
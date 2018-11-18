<?php
	

	//atribui os dados necessarios a variaveis
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'tec.com';


	// atribui a vartiavel conexão a função de conexão e os dados necessarios
	$conexao = mysqli_connect($host, $user, $password, $database)
	or die("falha na conexao");

	// aceita acentuação
	mysqli_set_charset($conexao, "utf-8");


?>
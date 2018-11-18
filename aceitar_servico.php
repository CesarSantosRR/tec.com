<?php

	//inicia seção
	session_start();

	//incluir arquivo de conexao
	include("conexao.php");

	//criação de variaveis
	$id = $_GET['id'];
	$idtec = $_SESSION['id'];
	$privilegio = $_SESSION['privilegio'];   


	//sql para alteração de status de problema
	$carregamento = mysqli_query($conexao, "UPDATE problema SET situacao = 'Iniciado' WHERE id = '$id';");


	if($carregamento == true){

		//sql para abertura de serviço
		$sql = mysqli_query($conexao, "INSERT INTO servicos (data_abertura, id_problema, id_tecnico) VALUES (NOW(), '$id', '$idtec')");

		//verificação e direcionamento para as respectivas paginas		
		if ($sql==true){			
	        
	        ?>
                <script>
                alert('Serviço Iniciado');
                window.location.replace ("visualisar_servicos_tec.php");
                </script>

                <?php
	        
	    }
	    else{
	        ?>
                <script>
                alert('Houve Algum Erro');
                window.location.replace ("visualisar_servicos_tec.php");
                </script>

                <?php
	    }
	}

?>
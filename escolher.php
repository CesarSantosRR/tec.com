<?php 

	//inicio da seção 
	session_start();

	//inclui o arquivo de conexão
	include("conexao.php");

	//atribuição de variaveis
	$id_problema = $_SESSION['id_prob'];
	$id_tecnico = $_GET['id'];


	//comando para a alteração do status do problema 
	$carregamento = mysqli_query($conexao, "UPDATE problema SET situacao = 'Iniciado' WHERE id = '$id_problema';");

	//teste se o comando foi executado
	if($carregamento == true){

		//comando para a abertura do serviço
		$sql = mysqli_query($conexao, "INSERT INTO servicos (data_abertura, id_problema, id_tecnico) VALUES (NOW(), '$id_problema', '$id_tecnico')");
		
		//teste se o comando foi executado e redirecionamento para as respectivas paginas
		if ($sql==true){			
	        ?>
                <script>
                alert('Dados Alterados com Sucesso!!');
                window.location.replace ("visualisar_servicos_cli.php");
                </script>

                <?php
	    }
	    else{
	        ?>
                <script>
                alert('Dados não Alterados!!');
                window.location.replace ("visualisar_servicos_cli.php");
                </script>

                <?php
	    }

	}


?>
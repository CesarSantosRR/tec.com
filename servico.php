<?php
	
	//inicio da seção
	session_start();

	//inclui o arquivo de conexão
	include("conexao.php");

	//codigo a ser executado se a opção escolhida for alterar dados do serviço 
	if(isset($_POST['alterar'])){

		//atribuição a uma variavel o id do serviço
		$idserv = $_SESSION['idservico'];

		//atribuição a uma variavel a data de abertura do serviço
		$data_abertura =$_SESSION['data_abertura'];

		//atribuição a uma variavel o tipo do serviço
		$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);

		//atribuição a uma variavel a descrição do serviço
		$descricao_servico = filter_input(INPUT_POST, 'descricao_servico', FILTER_SANITIZE_STRING);

		//atribuição a uma variavel a descrição do problema
		$descricao_problema = filter_input(INPUT_POST, 'descricao_problema', FILTER_SANITIZE_STRING);

		//comando para a alteração do tipo do serviço
		$sql = mysqli_query($conexao, "UPDATE servicos SET tipo = '$tipo', descricao_servico = '$descricao_servico' WHERE id = '$idserv';");

		//comando para boter a id do problema
		$catch_res_id_problema = mysqli_query($conexao, "SELECT id_problema FROM servicos WHERE id = '$idserv'");

		//atribuição dos dados coletados a um array
		$res_id_problema = mysqli_fetch_assoc($catch_res_id_problema);

		//atribuição a uma variavel a id do problema
		$id_problema = $res_id_problema['id_problema'];
		
		//comando para a alteração da descrição do problema
		$sql2 = mysqli_query($conexao, "UPDATE problema SET descricao = '$descricao_problema' WHERE id = '$id_problema';");

		//teste se os comandos foram executados e redirecionamento para as respectivas paginas
		if((sql == true)&&(sql2 == true)){
			?>
                <script>
                alert('Dados Alterados com Sucesso!!');
                window.location.replace ("visualisar_servicos_tec.php");
                </script>

                <?php
		}
		else{
			?>
                <script>
                alert('Dados não Alterados!!');
                window.location.replace ("visualisar_servicos_tec.php");
                </script>

                <?php
		}
	}
	if(isset($_POST['finalizar'])){

		$idserv = $_SESSION['idservico'];
		

		$sql = mysqli_query($conexao, "UPDATE servicos SET data_termino = NOW() WHERE id = '$idserv';");

		

		if(sql == true){
			?>
                <script>
                alert('Serviço Finalizado com Sucesso!!');
                window.location.replace ("visualisar_servicos_tec.php");
                </script>

                <?php
		}
		else{
			?>
                <script>
                alert('Serviço não Finalizado!!');
                window.location.replace ("visualisar_servicos_tec.php");
                </script>

                <?php
		}
	}



?>
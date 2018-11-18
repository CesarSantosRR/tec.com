<?php

	//inicio da seção
	session_start();

	//inclui o arquivo de conexão
	include("conexao.php");

	//atribuição a variaveis os ids do problema e do cliente
	$id = $_GET['id'];
	$id_cliente = $_SESSION['id'];

	//comando para a modificação do status do problema
	$carregamento = mysqli_query($conexao, "UPDATE problema SET situacao = 'Finalizado' WHERE id = '$id';");

	//teste se o comando foi executado
	if($carregamento == true){

		//comando para a busca do id do serviço referente ao problema a ser finalizado
		$catch = mysqli_query($conexao, "SELECT servicos.id  FROM servicos INNER JOIN problema ON problema.id = servicos.id_problema WHERE id_cliente = '$id_cliente'");

		//atribuição dos dados coletados em um array
		$catch_id = mysqli_fetch_assoc($catch);

		//atribuição a uma variavel o id do serviço a ser finalizado
		$id_servico = $catch_id['id'];
		
		//comando para a alteração do status do serviço
		$sql = mysqli_query($conexao, "UPDATE servicos SET data_termino = NOW() WHERE id = '$id_servico';");
		

		//teste se o comando foi executado e redirecionamento
		if ($sql==true){			
	        ?>
                <script>
                alert('Serviço Finalizado com Sucesso!!');
                window.location.replace ("cliente.php");
                </script>

                <?php
	    }
	    else{
	        ?>
                <script>
                alert('Dados não Alterados!!');
                window.location.replace ("finalizar_problema_cli.php");
                </script>

                <?php
	    }
	}
	

?>
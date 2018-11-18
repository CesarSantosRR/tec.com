<?php

	//inicia seção
	session_start();

	//inclui arquivo de conexão
	include("conexao.php");

	//atribuição de variaveis 
	$id = $_GET['id'];
	$id_cliente = $_SESSION['id'];

	//altera o status do serviço para cancelado
	$carregamento = mysqli_query($conexao, "UPDATE problema SET situacao = 'Cancelado' WHERE id = '$id';");

	//teste se o cancelamento foi executado
	if($carregamento == true){

		//busca os dados do serviço referente ao problema cancelado
		$catch = mysqli_query($conexao, "SELECT servicos.id  FROM servicos INNER JOIN problema ON problema.id = servicos.id_problema WHERE id_cliente = '$id_cliente'");
		$catch_id = mysqli_fetch_assoc($catch);
		$id_servico = $catch_id['id'];
		
		//adicionba a data de termino ao servico cancelado
		$sql = mysqli_query($conexao, "UPDATE servicos SET data_termino = NOW() WHERE id = '$id_servico';");
		
		//testa se o cancelamento foi feito e direciona para as paginas
		if ($sql==true){			
	        ?>
                <script>
                alert('Serviço Cancelado com Sucesso!!');
                window.location.replace ("cliente.php");
                </script>

                <?php
	    }
	    else{
	        ?>
                <script>
                alert('Dados não Alterados!!');
                window.location.replace ("cliente.php");
                </script>

                <?php
	    }
	}
	

?>
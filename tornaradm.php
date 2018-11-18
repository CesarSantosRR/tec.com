<?php

	//inicio da seção 
	session_start();

	//inclui o arquivo de conexão
	include("conexao.php");

	//atribuiçãoi a uma variavel o id do usuario a ser alterado
	$id = $_GET['id'];

	//linha de sql para a busca de dados do usuario a ser alterado
	$result_status = "SELECT status FROM tecnico WHERE id = '$id'";

	//comando para a busca de dados do tecnico no banco de dados
	$resultado_status = mysqli_query($conexao, $result_status);

	//atribuição a um array os dados obtidos
	$status = mysqli_fetch_assoc($resultado_status);

	//teste se o comando foi executado
	if($status['status'] == 1){

		//comando para a modificação do status do tecnico
		$sql = mysqli_query($conexao, "UPDATE tecnico SET status = '2' WHERE id = '$id';");

		//teste se o comando foi executado e redirecionamento para as respectivas paginas
		if ($sql==1){
	        ?>
                <script>
                alert('Dados Alterados com Sucesso!!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	    }
	    else{
	       ?>
                <script>
                alert('Dados Não Alterados!!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	    }
	}
	elseif($status['status'] == 2){
		?>
                <script>
                alert('Este Técnico ja é um Administrador!!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	}
	elseif($status['status'] == 0){
		?>
                <script>
                alert('Este Tecnico Ainda Não Foi Aceito!!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	}

?>
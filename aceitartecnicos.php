<?php

	//inicia seção
	session_start();

	//incluir arquivo de conexao
	include("conexao.php");

	//criação de variaveis
	$id = $_GET['id'];

	//seleção de dados do tecnico
	$result_status = "SELECT status FROM tecnico WHERE id = '$id'";

	$resultado_status = mysqli_query($conexao, $result_status);

	$status = mysqli_fetch_assoc($resultado_status);


	if($status['status'] == 0){

		//muda o status de tecnico cadastrado
		$sql = mysqli_query($conexao, "UPDATE tecnico SET status = '1' WHERE id = '$id';");


		//teste e direcionamento para as respectivas paginas
		if ($sql=true){
	       ?>
                <script>
                alert('Alteração Realizada com Sucesso!!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	    }
	    else{
	        ?>
                <script>
                alert('Alteração Realizada com Sucesso!!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	    }
	}
	elseif($status['status'] == 1){
		?>
                <script>
                alert('Este Tecnico ja esta Aceito!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	}
	elseif($status['status'] == 2){
		?>
                <script>
                alert('Este Tecnico Ja é um Administrador!');
                window.location.replace ("visualisar_tecnicos.php");
                </script>

                <?php
	}

?>
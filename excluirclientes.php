<?php

	//inicio da seção 
	session_start();

	//inclui o arquivo de conexão
	include("conexao.php");

	//atribuição de uma variavel com o id do cliente
	$id = $_GET['id'];


	//comando para a exclusão do cliente
	$sql = mysqli_query($conexao, "DELETE FROM cliente WHERE id = '$id';");

	//teste s eo comando foi executado e redirecionamento para as respectivas paginas
	if ($sql==1){
	    ?>
                <script>
                alert('Dados Excluidos com Sucesso!!');
                window.location.replace ("visualisar_clientes.php");
                </script>

                <?php
	}
	else{
	    ?>
                <script>
                alert('Dados não Excluidos!!');
                window.location.replace ("visualisar_clientes.php");
                </script>

                <?php
	}
?>
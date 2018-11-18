<?php

    //inicio da seção
	session_start();
    
    //inclui o arquivo de conexão
    include("conexao.php");
    
    
       
   
    //atribuição a uma variavel os dados vindos do formulario para a informação do problema   
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

    //atribuição a uma variavel a id do cliente
    $id_cliente = $_SESSION['id'];
  
    //comando para a criação do problema
    $sql = mysqli_query($conexao, "INSERT INTO problema (id_cliente, descricao, situacao) VALUES ('$id_cliente', '$descricao', 'Pendente' )");

    //teste se o comando foi executado e redirecionamento para as respectivas paginas
    if ($sql == true){
    	?>
                <script>
                alert('Problema Registrado!!');
                window.location.replace ("visualisar_problemas_cli.php");
                </script>

                <?php 

    }
    else{
        ?>
                <script>
                alert('Dados não Registrados!!');
                window.location.replace ("cliente.php");
                </script>

                <?php
    }
        
        
    
?>
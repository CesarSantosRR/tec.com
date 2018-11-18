<?php
  
  //abertura de seção
  session_start();

  //inclusão do arquivo de conexão
  include("conexao.php");

  //Atribuição de variaveis
  $id_servico = $_SESSION['id_servico'];
  $avaliacao = $_POST['avaliacao'];


  //altera o campo de avaliação do serviço
  $comando = mysqli_query($conexao, "UPDATE servicos SET avaliacao = 1 WHERE id = '$id_servico'");

  //busca a id do tecnico responsavel pelo serviço
  $sql = mysqli_query($conexao, "SELECT id_tecnico FROM servicos WHERE id = '$id_servico'");
  $catch_idtec = mysqli_fetch_assoc($sql);
  $id_tecnico = $catch_idtec['id_tecnico'];
  

  //busca as informações do tecnico responsavel pelo serviço
  $catch = mysqli_query($conexao, "SELECT * FROM tecnico WHERE id = '$id_tecnico'");
  $catch_dados = mysqli_fetch_assoc($catch);

  //atribui o valor da avaliação total do tecnico a uma variavel
  $avaliacao_total = $catch_dados['avaliacao_total'];

  //adiciona o valor da avaliação atual a variavel avaliação total
  $avaliacao_total = $avaliacao_total + $avaliacao;
  
  //atribuio a quantidade de serviços do tecnico a uma variavel
  $qtd_servicos = $catch_dados['qtd_serv'];

  //incrementa a quantidade de serviços prestados por aquele tecnico
  $qtd_servicos++;
  
  //calcula a media das avaliações desse tecnico
  $nova_avaliacao = $avaliacao_total/$qtd_servicos;

  
  //grava a nova media do tecnico no banco de dados
  $gravar = mysqli_query($conexao, "UPDATE tecnico SET avaliacao = '$nova_avaliacao', avaliacao_total = '$avaliacao_total', qtd_serv = '$qtd_servicos' WHERE id = '$id_tecnico'");


  //testes e direcionamentos para as respectivas paginas
  if ($gravar == true){
                ?>
                <script>
                alert('Dados Inseridos com Sucesso!');
                window.location.replace ("visualisar_servicos_cli.php");
                </script>

                <?php
            }
            else{?>
                <script>
                alert('Dados Não Registrados!');
                window.location.replace ("visualisar_servicos_cli.php");
                </script><?php
                  }
                ?>
          
          

  ?>
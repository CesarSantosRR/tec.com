<?php
    
    //abertura de seção
    session_start();

    //inclusão do arquivo de conexão
    include("conexao.php");

    //testa o privilegio do usuario
    if(($_SESSION['privilegio'] != 2)&&($_SESSION['privilegio'] != 3)){
        echo("<script>");
        echo("alert('Você não tem permissão para acessar esta pagina')");
        echo("</script>"); 
        header('location:login_tecnico.php');    
    
    }
    //atribui a uma variavel o id do tecnico
    $id_tecnico = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Visualisar Problemas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/estilo.css">
        <!-- colocando o icone na barra de endereço do navegador -->
        <link rel="shortcut icon" href="img/icone.png" type="image/x-png"/>
    </head> 
    <body>
      <header id="headerlogin">
            <h2><b>Área do Administrador<br><br>Visualizar Problemas</b></h2>
      </header>
      <div class="volta">
          <a href="admin.php"><button type="button" class="btn btn-primary btvolta">Voltar</button></a>
      </div><br><br>

        <div class="container-fluid" >
            <div class="table-responsive table-bordered table-hover">
            <table class="table">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Id Cliente</th>
                  <th>Descrição</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <?php 
                //linha sql para busca de dados no banco de dados
                $result_usuario = "SELECT * FROM problema ";

                //comando para busca de dados no banco de dados
                $resultado_usuario = mysqli_query($conexao, $result_usuario);

                //loop enquanto houver dados no array vindo do banco de dados
                while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
               ?>
              <tbody>
                <tr>
                  <td><?php  echo $row_usuario['id'];?></td>
                  <td><?php  echo $row_usuario['id_cliente'];?></td>
                  <td><?php  echo $row_usuario['descricao'];?></td>
                  <td><?php  echo $row_usuario['situacao'];?></td>
                  <td> <a href="aceitar_servico.php?id=<?php  echo $row_usuario['id']; ?>"><button class="btn btn-primary btadmprob"<?php if(($row_usuario['situacao']=="Iniciado")||($row_usuario['situacao']=="Cancelado")||($row_usuario['situacao']=="Finalizado")) echo "disabled"?>>Aceitar Serviço</button></a><a href="visualizar_cliente.php?id=<?php  echo $row_usuario['id_cliente']; ?>"><button class="btn btn-primary btadmprob" >Ver Cliente</button></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table> 
          </div>
        </div>
        
        <script src="jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        
        <br><br><br>
        <footer id="footerlogin">
            <div class="container">
                <div class="footerindex">
                    <br><h6 id="facefooter"><b>Facebook:</b> <a id="face" href ="https://www.facebook.com/Teccom-621638164884532/" target="blank">facebook.com/tec.com</a></h6>
                    <h6 id="emailfooter"><b>Email:</b> tec.com.oficial@gmail.com</h6>
                    <h6 id="turmafooter"><b>CEP- Centro de Educação Profissional "Tancredo Neves"<a id="aadmin" href="admin.php">-</a> IM3A - Alexandre, César, Jeferson</b></h6><br/>
                </div>
            </div>
        </footer>
    </body>
</html>
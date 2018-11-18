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
        <title>Visualizar técnicos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/estilo.css?version=3">
        <!-- colocando o icone na barra de endereço do navegador -->
        <link rel="shortcut icon" href="img/icone.png" type="image/x-png"/>
    </head>
    <body>
      <header id="headerlogin">
            <h2><b>Área do Administrador<br><br>Técnicos Cadastrados</b></h2>
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
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Email</th>
                  <th>CPF</th>
                  <th>Data de Nascimento</th>
                  <th>Rua</th>
                  <th>Número</th>
                  <th>Complemento</th>
                  <th>Bairro</th>
                  <th>Cidade</th>
                  <th>Estado</th>
                  <th>Formação</th>
                  <th>Instituição</th>
                  <th>Login</th>
                  <th>Status</th>
                  <th>Avaliação</th>
                  <th>Serviços Prestados</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <?php 
                $result_usuario = "SELECT * FROM tecnico";

                $resultado_usuario = mysqli_query($conexao, $result_usuario);

                 while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
               ?>
              <tbody>
                <tr>
                  <td><?php  echo $row_usuario['id'];?></td>
                  <td><?php  echo $row_usuario['nome'];?></td>
                  <td><?php  echo $row_usuario['telefone'];?></td>
                  <td><?php  echo $row_usuario['email'];?></td>
                  <td><?php  echo $row_usuario['cpf'];?></td>
                  <td><?php  echo $row_usuario['data_nasc'];?></td>
                  <td><?php  echo $row_usuario['rua'];?></td>
                  <td><?php  echo $row_usuario['numero'];?></td>
                  <td><?php  echo $row_usuario['complemento'];?></td>
                  <td><?php  echo $row_usuario['bairro'];?></td>
                  <td><?php  echo $row_usuario['cidade'];?></td>
                  <td><?php  echo $row_usuario['estado'];?></td>  
                  <td><?php  echo $row_usuario['formacao'];?></td>
                  <td><?php  echo $row_usuario['instituicao'];?></td>
                  <td><?php  echo $row_usuario['login'];?></td>
                  <td><?php  if($row_usuario['status'] == 2)echo "Administrador"; elseif($row_usuario['status'] == 1)echo "Técnico"; elseif($row_usuario['status'] == 0)echo "Aguardando Aprovação";?></td>
                  <td><?php  echo $row_usuario['avaliacao'];?></td>    
                  <td><?php  echo $row_usuario['qtd_serv'];?></td>
                  <td> <a href="aceitartecnicos.php?id=<?php  echo $row_usuario['id']; ?>"><button class="btn btn-primary btadm"<?php if(($row_usuario['status'] == 2)||($row_usuario['status'] == 1))echo "disabled"?>>Aceitar Técnico</button></a><a href="tornaradm.php?id=<?php  echo     $row_usuario['id']; ?>"><button class="btn btn-primary btadm"<?php if($row_usuario['status'] == 2) echo "disabled"?>>Tornar Administrador</button></a><a href="excluirtecnicos.php?id=<?php  echo $row_usuario['id']; ?>"><button class="btn btn-danger btadm">Excluir</button></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table> 
          </div>
        </div>

        <script src="jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        
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

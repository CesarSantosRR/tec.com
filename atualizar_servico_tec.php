<?php
    //abertira de seção
    session_start();

    //inclusão do arquivo de conexao
    include("conexao.php");

    //atribuição de variaveis
    $idserv = $_GET['id'];
    $id_tecnico = $_SESSION['id'];
    $privilegio = $_SESSION['privilegio'];
   
    //busca de dados referentes ao serviço
    $result_usuario = "SELECT servicos.id AS idserv, servicos.data_abertura, servicos.data_termino, servicos.tipo, servicos.descricao_servico, problema.descricao, cliente.nome, cliente.telefone, cliente.email FROM (servicos INNER JOIN problema ON problema.id = servicos.id_problema) INNER JOIN cliente ON problema.id_cliente = cliente.id WHERE servicos.id = '$idserv'";
    $resultado_usuario = mysqli_query($conexao, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);

    //atribuição de variaveis
    $_SESSION['idservico'] = $row_usuario['idserv'];
    $_SESSION['data_abertura'] = $row_usuario['data_abertura'];

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Atualizar Serviço</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/estilo.css?version=165">
        <!-- colocando o icone na barra de endereço do navegador -->
        <link rel="shortcut icon" href="img/icone.png" type="image/x-png"/>
    </head>
    <body>
        <header id="header_cadastro">
            <h2><b>Atualizar Serviço</b></h2>
        </header>
        <div class="volta">
          <a href="direciona.php"><button type="button" class="btn btn-primary btvolta">Voltar</button></a>
        </div><br/><br/>
        <!-- inicio do formulario -->
        <div class="container">
            <div class="formulario">
                <form method="POST" name="Form" action="servico.php">
                    <div class="form-row">
                        <label for="nome">Código:</label>
                        <input type="text" class="form-control" name="idserv"  value="<?php echo  $row_usuario['idserv'];?>" disabled>
                    </div><br/>
                    <div class="form-row">
                        <label for="data_abertura">Data de Abertura:</label>
                        <input type="text" class="form-control" name="data_abertura" id="data_abertura" value="<?php echo $row_usuario['data_abertura'];?>" disabled >
                    </div><br/>
                    <div class="container">
                        <p>
                            Tipo de Serviço<br/>
                            <input type="radio" name="tipo" value="Visita Técnica" <?php if($row_usuario['tipo']=="Visita Técnica") echo "checked"?>/>  Visita Técnica<br>
                            <input type="radio" name="tipo" value="Acesso Remoto" />  Acesso Remoto
                        </p>
                    </div>
                    <div class="form-row">
                        <label for="descricao_servico">Descrição do Serviço:</label>
                        <textarea name="descricao_servico" rows="5" cols="500" placeholder=""><?php echo $row_usuario['descricao_servico'];?></textarea> 
                    </div><hr>
                    <div class="form-row">
                        <label for="descricao_problema">Descrição do Problema:</label>
                        <textarea name="descricao_problema" rows="5" cols="500" value=""><?php echo $row_usuario['descricao'];?></textarea> 
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="alterar">Alterar Informações</button> 
                    <button type="submit" class="btn btn-primary" name="finalizar">Finalizar Serviço</button>                   
                </form> 
            </div>
        </div><br>
        <!-- inicio do rodape -->
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

<?php

    //abertura de seção
    session_start();

    //inclusão do arquivo de conexão
    include("conexao.php");

    //Atribuição de variaveis
    $_SESSION['id_servico'] = $_GET['id'];
  
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Avaliar Técnico</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/estilo.css?version=168">
        <!-- colocando o icone na barra de endereço do navegador -->
        <link rel="shortcut icon" href="img/icone.png" type="image/x-png"/>
    </head>
    <body>
    	<header id="header_cadastro">
            <h2><b>Avaliar Técnico</b></h2>
        </header>
        <div class="volta">
          <a href="cliente.php"><button type="button" class="btn btn-primary btvolta">Voltar</button></a>
        </div>
        <div class="formulario">
            <div class="container"><br>
                <div class="jumbotron jumbavaltec"><form method="POST" name="Form1" action="avaliar.php"><br/>
                    <div class="form-row">
                    	<p>
	                        <label class="label1" for="avaliacao"><b>Informe uma Nota para Este Técnico:</b></label><br/><br/>
							<input type="radio" name="avaliacao" value="5"/><b> 5 -</b>     Muito ruim, não resolveu meu problema.<br/>
	                        <input type="radio" name="avaliacao" value="6"/><b> 6 -</b>     Ruim, não resolveu completamenete meu problema.<br/>
	                        <input type="radio" name="avaliacao" value="7"/><b> 7 -</b>     Regular, resolveu minimamente o meu problema.<br/>
	                        <input type="radio" name="avaliacao" value="8"/><b> 8 -</b>     Bom, resolveu o meu problema.<br/>
	                        <input type="radio" name="avaliacao" value="9"/><b> 9 -</b>     Muito bom, resolveu bem o meu problema.<br/>
	                        <input type="radio" name="avaliacao" value="10"/><b> 10 -</b>   Excelente, resolveu muito bem o meu problema e fui bem atendido(a).<br/>
	                    </p>
		            </div><br/>
		            <button type="submit" class="btn btn-primary" name="avaliar">Avaliar</button>
                </form>
            </div>
            </div>
        </div>
        
        <script src="jquery/dist/jquery.js"></script>
        <script src="popper.js/dist/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        
        <br>
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
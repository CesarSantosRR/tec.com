<?php

    //abertura de seção
    session_start();
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Tec.com / Login Técnico</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/estilo.css?version=6">
        <!-- colocando o icone na barra de endereço do navegador -->
        <link rel="shortcut icon" href="img/icone.png" type="image/x-png"/>
    </head>
    <body>
        <header id="headerlogin">
            <h2><b>Login do Técnico</b></h2>
        </header>
        <div class="container"> 
            <a href="index.php"><button type="button" class="btn btn-primary">Voltar</button></a>
        </div><br/><br/><br/><br/>
        <div class="formulariologin">
            <div class="container">
                <form method="POST" name="Form2" action="valida.php">
                    <br/><div class="form-row">
                        <label class="label1" for="login">Login:</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Login" required>
                    </div>
                    <br/><div class="form-row">
                        <label class="label1 for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
                    </div><br/>
                    <button type="submit" class="btn btn-primary" name="salvar2"><span class="glyphicon glyphicon-cloud"></span>Entrar</button><br/><br/>

                    <a href="cadastro_tecnico.php"><button type="button" class="btn btn-light botaocad"><font color="dodgerblue">Cadastre-se!</font></button></a>
                    
                </form>
            </div>
        </div> <br/><br/>
        
        <footer id="footerlogin">
            <div class="container">
                <div class="footerindex">
                    <br><h6 id="facefooter"><b>Facebook:</b> <a id="face" href ="https://www.facebook.com/Teccom-621638164884532/" target="blank">facebook.com/tec.com</a></h6>
                    <h6 id="emailfooter"><b>Email:</b> tec.com.oficial@gmail.com</h6>
                    <h6 id="turmafooter"><b>CEP- Centro de Educação Profissional "Tancredo Neves"<a id="aadmin" href="admin.php">-</a> IM3A - Alexandre, César, Jeferson</b></h6><br/>
                </div>
            </div>
        </footer>      
        </footer>      
    </body>
</html>

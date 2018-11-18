<?php

	//abertura de seção
	session_start();

	//inclusão do arquivo de conexão
	include("conexao.php");

	//login de clientes
	if(isset($_POST['salvar1'])){

		//atribuição a variaveis os dados vindos do formulario
		$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
		$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

		//linha sql para a busca dos dados do usuario no banco de dados
		$sql = "SELECT * FROM cliente WHERE cpf = '$cpf' && senha = '$senha' LIMIT 1";

		//comando para a busca de dados do usuario no banco de dados
		$result = mysqli_query($conexao, $sql);

		//atribuição dos dados a um array
		$resultado = mysqli_fetch_assoc($result);

		//teste se os dados foram encontrados
		if(!empty($resultado)){		

			//criação de variaveis de seção com os dados dom usuario			
			if($_SESSION['id']!=null)$_SESSION['id']=null;
			$_SESSION['id'] = $resultado['id'];		
			$_SESSION['nome'] = $resultado['nome'];
			$_SESSION['cpf'] = $resultado['cpf'];
			$_SESSION['telefone'] = $resultado['telefone'];
			$_SESSION['rua'] = $resultado['rua'];
			$_SESSION['num'] = $resultado['numero'];
			$_SESSION['complemento'] = $resultado['complemento'];
			$_SESSION['bairro'] = $resultado['bairro'];
			$_SESSION['cidade'] = $resultado['cidade'];
			$_SESSION['estado'] = $resultado['estado'];
			$_SESSION['email'] = $resultado['email'];
			$_SESSION['privilegio'] = 1;

			//redirecionamento para a pagina de destino
			header('location:cliente.php');
		}
		//redirecionamento para a pagina inicial se os dados não forem encontardoas
		else{
			unset($_SESSION['nome']);
			unset($_SESSION['senha']);
			header('location:login_cliente.php');
		}$resultado = mysqli_fetch_assoc($result);
	}

	//login de tecnicos
	if(isset($_POST['salvar2'])){

		//atribuição a variaveis os dados vindos do formulario
		$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

        //linha sql para a busca dos dados do usuario no banco de dados
		$sql = "SELECT * FROM tecnico WHERE login = '$login' && senha = '$senha' LIMIT 1";

		//comando para a busca de dados do usuario no banco de dados
		$result = mysqli_query($conexao, $sql);

		//atribuição dos dados a um array
		$resultado = mysqli_fetch_assoc($result);

		//teste se os dados foram encontrados
		if(!empty($resultado)){

			//teste do privilegio do usuario
			if (($resultado['status'] == 1 )||($resultado['status'] == 2 )){
				//criação de variaveis de seção com os dados dom usuario
				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
				if($_SESSION['id']!=null)$_SESSION['id']=null;
				$_SESSION['id'] = $resultado['id'];
				$_SESSION['nome'] = $resultado['nome'];
				$_SESSION['cpf'] = $resultado['cpf'];
				$_SESSION['telefone'] = $resultado['telefone'];
				$_SESSION['email'] = $resultado['email'];
				$_SESSION['data_nasc'] = $resultado['data_nasc'];
				$_SESSION['rua'] = $resultado['rua'];
				$_SESSION['num'] = $resultado['numero'];
				$_SESSION['complemento'] = $resultado['complemento'];
				$_SESSION['bairro'] = $resultado['bairro'];
				$_SESSION['cidade'] = $resultado['cidade'];
				$_SESSION['estado'] = $resultado['estado'];
				$_SESSION['formacao'] = $resultado['formacao'];
				$_SESSION['instituicao'] = $resultado['instituicao'];
				$_SESSION['avaliacao'] = $resultado['avaliacao'];
				
				//teste do privilegio e direcionamento para as respectivas paginas
				if($resultado['status'] == 1){
					if($_SESSION['privilegio']!=null)$_SESSION['privilegio']=null;
					$_SESSION['privilegio'] = 2;
					header('location:tecnico.php');
				}
				elseif($resultado['status'] == 2){
					if($_SESSION['privilegio']!=null)$_SESSION['privilegio']=null;
					$_SESSION['privilegio'] = 3;
					header('location:admin.php');
				}
			}
			else{
				echo "voce não tem permissão para acessar esta pagina!!";
			}
		}
		else{
			unset($_SESSION['nome']);
			unset($_SESSION['senha']);
			header('location:login_tecnico.php');
		}
	}
	
?>
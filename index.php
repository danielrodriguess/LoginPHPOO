<?php
	session_start();
	require_once "classes/conexao.php";
	require_once "classes/login.php";
	if(isset($_POST['enviarlogin'])){
		$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_MAGIC_QUOTES);
		$senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_MAGIC_QUOTES);
		$l = new login();
		$l->setEmail($email);
		$l->setSenha($senha);
		if($l->logar()){
			header("Location: logado.php");
		}else{
			$erro = "Erro ao logar";
		}
	}
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<?php 
			if(!isset($_SESSION['logado'])){ 
		?>
		<div id='login'>
			<form action="" method='POST' id='form_login'>
				<label for="login">Login:</label>
				<input type='text' name='email' class='input' id='input_email'>
				<label for="login">Senha:</label>
				<input type='password' name='senha' class='input' id='input_senha'>
				<label for="submit"></label>
				<input type='submit' name='enviarlogin' id='bt_login' value='Logar' class='input_button'>
			</form>
			<?php
				echo isset($erro) ? $erro : "";
			?>
		</div>
		<?php 
			}else{
			 	header("Location: logado.php");
			}
		?>
	</body>
</html>
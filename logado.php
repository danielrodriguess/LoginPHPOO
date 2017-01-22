<?php
	require_once "classes/conexao.php";
	require_once "classes/login.php";
	session_start();
	if(isset($_GET['acao'])){
		if($_GET['acao'] == 'logout'){
			login::deslogar();
		}
	}
	if(isset($_SESSION['logstatus'])){
?>
Bem vindo <?php echo $_SESSION['logado']; ?>
<br>
<a href='logado.php?acao=logout'>Sair do sistema</a>
<?php
	}else{
		echo "Você não tem permissão de acesso";
	}
?>
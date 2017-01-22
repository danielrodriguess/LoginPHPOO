<?php
	class login extends conexao{
		private $email;
		private $senha;

		public function setEmail($email){
			$this->email = $email;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}

		public function logar(){
			$pdo = parent::getBanco();
			$logar = $pdo->prepare("select * from usuario where email = ? and senha = ?");
			$logar->bindValue(1,$this->getEmail());
			$logar->bindValue(2,$this->getSenha());
			$logar->execute();
			if($logar->rowCount() == 1){
				$dados = $logar->fetch(PDO::FETCH_OBJ);
				$_SESSION['logado'] = $dados->email;
				$_SESSION['logstatus'] = true;
				return true;
			}else{
				return false;
			}
		}

		public static function deslogar(){
			if(isset($_SESSION['logado'])){
				unset($_SESSION['logstatus']);
				unset($_SESSION['logado']);
				session_destroy();
				header('Location: http://localhost/PHPOOLogin/');
			}
		}
	}
?>
<?php
	abstract class conexao{
		const usuario = "root";
		const senha = "";

		private static $instancia = null;

		private static function conectar(){
			try{
				if(self::$instancia == null){
					$con = "mysql:host=localhost;dbname=login";
					self::$instancia = new PDO($con,self::usuario,self::senha);
					self::$instancia->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				}	
			}catch(PDOException $e2){
				echo "Erro ".$e2->getMessage();
			}
			return self::$instancia;
		}

		protected static function getBanco(){
			return self::conectar();
		}	
	}

<?php

	require_once "config.php";

	class DB{

		private static $db= null;
		private static $pdo;

		final function __construct(){

			try{

				self::getDB();

			}catch (Escepotion $ex){


				$ex->getMessage();
			}

		}


		static function getInstance(){


			if(self::$db == null){


				self::$db= new self();

			}

			return self::$db;
		}

		public function getDB(){

			if(self::$db == null){


				self::$pdo=$conn=new PDO('mysql:host=localhost;dbname=blogue6','root','');

//self::$pdo=$conn=new PDO('mysql:host=localhost;dbname=pag_jordana','root','');

					
			}


			return self::$pdo;

		}

	}
?>
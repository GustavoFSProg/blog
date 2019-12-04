<?php


	require "classes/DB.php";

	$conn=DB::getInstance()->getDB();

	session_start();



  $mail= '';
  $pass= '';
	


?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog 5</title>
    <link rel="icon" href="imagens/favicon.png">

    <!-- Bootstrap -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>

	 <?php
	 	include "header.php";
	 ?>


		<br><br><br><br><br><br>

		<?php

if(isset($_POST['email']) && isset($_POST['senha'])){


		$email=$_POST['email'];
		$senha=$_POST['senha'];

		$query_sel=$conn->prepare("SELECT * FROM login_adm WHERE EMAIL= ?");
		$query_sel->execute(array($email));

		while($linhas= $query_sel->fetchObject()){


			$mail=$linhas->email;
			$pass=$linhas->senha;


		}

		if($email == $mail && $pass == $senha){
   
    ?>


      <div class="container">


        	<div class="col-md-12">

        		<ul style="list-style: none;">
        			<li style="padding:3px;"><a href="cad_posts.php">Cadastro de Posts </a></li>
        			<li style="padding:3px;"><a href="pesquisa_posts.php">Pesquisa de Posts </a></li>
        			<li style="padding:3px;"><a href="cad_categorias.php">Cadastro de Categorias </a></li>
        		
        		</ul>


        	</div>
        </div>
    <?php
			
		}else{

			?>




      <div class="container">


        	<div class="col-md-12">

        		<h3>EMAIL OU SENHA INVÁLIDOS! RETORNE EM ADMINISTRAÇÃO</h3>


        	</div>
        </div>

        <?php  

        }

	}

		?>

      

		  <script src="jquery.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.js"></script>

    </body>

    </html>
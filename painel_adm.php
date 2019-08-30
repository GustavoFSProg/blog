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

	<nav class="navbar navbar-fixed-top navbar-inverse navbar-transparent">

		 <div class="container">

		 	

		<div class="navbar-header">

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-nav">

				<span class="sr-only">alternar navegação</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>

			</button>

		

	</div>

			<div class="collapse navbar-collapse" id="barra-nav">

				<ul class="nav navbar-nav navbar-right"  style="padding:10px 10px; color:yellow;">

	<li style="padding:0px 10px;"><a href="index.php" style="color:yellow;"> Home</a></li>
					<li style="padding:0px 10px;"><a href="#" style="color:yellow;"> Delphi</a></li>
					<li style="padding:0px 10px;"><a href="#" style="color:yellow;"> PHP</a></li>
					<li style="padding:0px 10px;"><a href="#" style="color:yellow;">Java</a></li>
					<li style="padding:0px 10px;"><a href="login_adm.php" style="color:yellow;"> Administração</a></li>
	

				
						<li style="padding:0px 10px;">&nbsp</li>

				</ul style="padding:0px 10px;">
			</div>
		</div>

		</nav>

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
        			<li><a href="cad_posts.php">Cadastro de Posts </a></li>
        			<li><a href="consulta_posts.php">Pesquisa de Posts </a></li>
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
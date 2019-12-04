<?php


	require "classes/DB.php";

	$conn=DB::getInstance()->getDB();

	session_start();


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


       
			<div class="container">

			
					<br><br><br><br>

				<div class="col-md-12">

					<div class="col-md-3"></div>

					<div class="col-md-5">

					<h2>Deseja excluir este post?</h2>
					<br>

					<?php

					if(isset($_GET["id"])){


							$id=$_GET['id'];


					
					?>

					<form action="pesquisa_posts.php?id=<?php echo $id; ?>&excluir=ok" method="post">

						<div align="center">

						<input type="submit" class="btn btn-default" value="SIM">

					</div>

					</form> 

					<br>

					<form action="pesquisa_posts.php">

						<div align="center">
						<input type="submit" class="btn btn-default" value="NÃO">
					</div>

					</form> 

					<?php

					  }
					?>

				</div>
			</div>

			</div>

	</body>
	</html>
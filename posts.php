<?php

	require "classes/DB.php";

	$conn=DB::getInstance()->getDB();

	session_start();

	$visitas_count= 0;


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




			<div class="container">

			
					<br><br><br><br>

				<div class="col-md-12">


					<div class="row">

						

						<div class="col-md-6">

							<?php

							if(isset($_GET['id'])){

								$id=$_GET['id'];


								$query_sel=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
								$query_sel->execute(array($id));

								while($linhasA= $query_sel->fetchObject()){

									$visitas_count=$linhasA->visitas + 1;

									

								}
									$dados=array($visitas_count, $id);


							$query_update=$conn->prepare("UPDATE POSTS SET VISITAS = ? WHERE ID_POSTS= ?");
							$query_update->execute($dados);



								$query_sel=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
								$query_sel->execute(array($id));

								while($linhas= $query_sel->fetchObject()){

									


							?>


	 <h1><?php echo $linhas->titulo; ?></h1>
	 <img src="<?php echo $linhas->imagem; ?>"  widht="100" height="100">


	 <p style="padding:10px;"><?php   echo utf8_encode($linhas->texto);?></p>

	 <p>visitas: <?php 


	 $sel="SELECT * FROM POSTS WHERE ID_POSTS= ?";
	 echo $visitas_count; ?></p>

	<?php


								}

							}

							

							?>

	</div>

</div>

</body>
</html>

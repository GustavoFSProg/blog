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

							$cont=0;
							$id=array();

							 $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA = 1");
							  $query_sel->execute();

							  while($linhas = $query_sel->fetchObject()){

							  	$id[$cont]=$linhas->id_posts;

							  	$_SESSION['ID']=$id[$cont];

							  	$cont= $cont + 1;
							  }


							  $query_post=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
							  $query_post->execute(array($_SESSION['ID'] - 1));

							  while($rows= $query_post->fetchObject()){



							?>

	<a href="posts.php?id=<?php echo $rows->id_posts; ?>"><img src="<?php echo $rows->imagem; ?>" height="150" width="150">

					<h1><?php echo $rows->titulo; ?></h1>

						
							<p style="padding:10px; text-indent:10px; text-align: justify; width:70%;">

								<?php echo utf8_encode($rows->texto); ?>
							</p></a>

							<p>

								<span> Visitas: <?php echo $rows->visitas; ?></span>
							</p>
						
					</div>

					<?php

						}
					?>
					</div>

				</div>

				<div class="col-md-12">


					<div class="row">

						

						<div class="col-md-6">	<?php

							$cont=0;
							$id=array();

							 $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA = 2");
							  $query_sel->execute();

							  while($linhas = $query_sel->fetchObject()){

							  	$id[$cont]=$linhas->id_posts;

							  	$_SESSION['ID']=$id[$cont];

							  	$cont= $cont + 1;
							  }


							  $query_post=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
							  $query_post->execute(array($_SESSION['ID'] - 1));

							  while($rows= $query_post->fetchObject()){



							?>
							
	<a href="posts.php?id=<?php echo $rows->id_posts; ?>"><img src="<?php echo $rows->imagem; ?>" height="150" width="150">

					<h1><?php echo $rows->titulo; ?></h1>

						
							<p style="padding:10px; text-indent:10px; text-align: justify; width:70%;">

								<?php echo utf8_encode($rows->texto); ?>
							</p></a>

							<p>

								<span> Visitas: <?php echo $rows->visitas; ?></span>
							</p>
						
					</div>

					<?php

						}
					?>
						
					</div>

					</div>

				</div>

				<div class="container">
				<div class="col-md-7">

					

				<h1>Categorias</h1>

				<div style="width:60%;height:2px;background:gray;">

				</div>

				<br>

				<h2>Delphi</h2>
<div style="width:30%;height:1px;background:blue;">

				</div>

				<?php

					$query2=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA = 1 LIMIT 3");
					$query2->execute();

					while($lines= $query2->fetchObject()){
				?>

				<div class="container">

					<br>
				<div id="delphi-posts">

				
				

				<h3><?php echo $lines->titulo; ?></h3>
					<a href="posts.php?id=<?php echo $lines->id_posts; ?>"><img src="<?php echo $lines->imagem; ?>" widht="90" height="80">
					<br><br>
					<p style="width:40%"><?php  echo utf8_encode($lines->texto);?></p></a>
					<br><br>
					<span>Data: <?php echo $lines->data;?> </span>
			</div>
</div>

  <?php
	}
		?>

		<br><br>
		</div>
	</div>



		

			<div class="container">

				<div class="col-md-7">

				<h2>PHP</h2>
					<div style="width:30%;height:1px;background:blue;">
				<?php

					$query2=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA = 2 LIMIT 3");
					$query2->execute();

					while($linesb= $query2->fetchObject()){
				?>

				<div class="container">

					<br>
				<div id="delphi-posts">

				
				

				<h3><?php echo $linesb->titulo; ?></h3>
					<a href="posts.php?id=<?php echo $linesb->id_posts; ?>"><img src="<?php echo $linesb->imagem; ?>" widht="90" height="80">
					<br><br>
					<p style="width:40%"><?php  echo utf8_encode($linesb->texto);?></p></a>
					<br><br>
					<span>Data: <?php echo $linesb->data;?> </span>
			</div>
</div>

  <?php
	}
		?>

	</div>
</div>

		<br><br>
		</div>



		


				<br><br>
			</div>
			</div>
		</body>



		</div>
	


	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.js"></script>

	</body>

	</html>
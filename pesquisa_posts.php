<?php


	require "classes/DB.php";

	$conn=DB::getInstance()->getDB();

	$categoria= " ";


      if(isset($_POST['ok'])){

        echo "deu";

        $titulo=$_POST['titulo'];
        $texto=$_POST['texto'];

      
  
        $categ= $_POST['categ'];

      

        echo "entrou";



        $id=$_GET['id'];

        $dados=array($titulo, $texto, $categ,  $id);

        $query_update=$conn->prepare("UPDATE POSTS SET TITULO= ?, TEXTO= ?, CATEGORIA=?  WHERE ID_POSTS= ?");
        if($query_update->execute($dados)){

            echo "Post editado com sucesso!";


        }else{

            echo "ERRO! Post não editado!";
        }
    }



				  if(isset($_GET['excluir']) && isset($_GET['id'])){

				  	 $id=$_GET['id'];


				  		$q_del=$conn->prepare("DELETE FROM POSTS WHERE ID_POSTS= ?");
				  		
				  		if($q_del->execute(array($id))){


				  			echo "Post excluído com sucesso!";
				  		}else{

				  			echo "ERRO! Post não excluído!";
				  		}



				  }

				


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

					<table class="table table-condensed table-stripped">

						<thead>
							<th>Id Post	</th>
							<th>Titulo	</th>
							<th>Categoria	</th>
							<th>Editar	</th>
							<th>Excluir	</th>
						</thead>

						<tbody>

							<?php

							  $q_sel=$conn->prepare("SELECT * FROM POSTS");
							  $q_sel->execute();

							  while($linhas= $q_sel->fetchObject()){

							?>

								<tr class="success">
									<td ><?php  echo $linhas->id_posts;?></td>
									<td ><?php  echo $linhas->titulo;?></td>
									<td ><?php 

										$q_categ=$conn->prepare("SELECT * FROM CATEGORIA WHERE ID_CATEG= ?");
										$q_categ->execute(array($linhas->categoria));

										while($lines_categ= $q_categ->fetchObject()){

											$categoria= $lines_categ->nome_categ;


										}


									 echo $categoria;


									 ?></td>

									 <td ><a href="editar_posts.php?id=<?php  echo $linhas->id_posts;?>&editar=ok"><img src="img/scroll.bmp" width="30" height="25"></a></td>

									  <td ><a href="pergunta.php?id=<?php  echo $linhas->id_posts;?>&excluir=ok"><img src="img/abort.bmp" width="30" height="15"></a></td>
									
								</tr>

								<?php

							       }
								?>

						</tbody>
					</table>

				</div>



			</div>

		</body>
		</html>
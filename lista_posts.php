<?php
  
   require "classes/DB.php";

   $conn=DB::getInstance()->getDB();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <script src="jquery.js"></script>


    <title>Blogue 6</title>
   <!-- <link rel="icon" href="img/ifsem-fundo.png">-->

    <!-- Bootstrap -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">-->

  
    <link href="css/StyleIndex.css" media="screen" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body >

      <?php include "header.php";


     ?>
        <br><br><br><br><br>

         <br><br><br> 


         <div class="container">

          <div class="row">

            <div class="col-md-11">

              <table class="table table-default">

                <thead>

                  <th> ID Posts</th>
                  <th>Titulo</th>
                    <th>Editar</th>
                  <th>Excluir</th>
                
                </thead>

                <tbody>

                  <?php

                  $query_sel=$conn->prepare("SELECT * FROM POSTS");
                  $query_sel->execute();

                  while($linhas = $query_sel->fetchObject()){

                  ?>

                  <tr class="success"> <td><?php echo $linhas->id_posts; ?></td>

                  <td > 
                    <?php echo $linhas->titulo; ?></td>

                    <td> <A href="editar_posts.php?id=<?php   echo $linhas->id_posts; ?>&editar=ok"> <img src="img/scroll.bmp" width="20%" height="80%" > </A></td>
                      
                    <td> <A href="deletar_posts.php?id=<?php   echo $linhas->id_posts; ?>&excluir=ok"> <img src="img/delete.bmp" width="20%" height="90%" ></A></td>

                     </tr>

                  <?php
                }

                ?>
                </tbody>

              </table>

            </div>

          </div>

         </div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>


</body>
</html>
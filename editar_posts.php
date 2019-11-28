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
    <link rel="icon" href="img/ifsem-fundo.png">

    <!-- Bootstrap -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

  
    <link href="css/StyleIndex.css" media="screen" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


    <?php include "header.php";


      


     ?>

         <br><br><br><br><br>




    <div class="container">

      <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-8">

          <br><br>

          <h2>Editar Posts</h2>

          <br>


        <?php


        if(isset($_GET['id'])){

          $id = $_GET['id'];

         $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS = ?");
         $query_sel->execute(array($id));

         while($linhas = $query_sel->fetchObject()){
        ?>

          <form enctype="multipart/form-data" action="atualizar_posts.php" method="post">

            <div class="form-group">
             Título <input type="text" class="form-control" name="titulo" value="<?php echo utf8_encode($linhas->titulo); ?>">

            </div>




              <div class="form-group">

            Resumo <textarea rows="15" name="resumo" class="form-control"><?php echo utf8_encode($linhas->resumo); ?></textarea>
                </div>

                <div class="form-group">

             Texto do Post <textarea rows="20" name="texto" class="form-control"><?php echo utf8_encode($linhas->texto); ?></textarea>
            </div>

              Data<input type="date" name="data" class="form-control" value="<?php  echo $linhas->imagem;?>">

                <br><br>
              <select class="form-control" name="categoria">


              <?php
                $query_categ=$conn->prepare("SELECT * FROM CATEGORIAS");
                $query_categ->execute();

                while($linhas2 = $query_categ->fetchObject()){

                    ?>


                <option value="<?php  echo $linhas2->id_categorias; ?>"><?php  echo $linhas2->nome; ?></option>
             
             


                <?php
              }

           
              
                ?>



              </select>


              <input type="hidden" name="ideia" value="<?php  echo $linhas->id_posts; ?>">

                <br><br><br><br>
                <div align="center">
              <input type="submit" class="btn btn-primary" value="Editar">

                    </div>

                    <?php

                      }

                    }
                    ?>

                        </form>



    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>


</body>
</html>
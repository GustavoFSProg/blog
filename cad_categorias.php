

<?php

  require "classes/DB.php";

  $conn=DB::getInstance()->getDB();

  if(isset($_POST['ok'])){

    $categ=strip_tags(filter_input(INPUT_POST,"categ"));

    $dados=array($categ);

    $query=$conn->prepare("INSERT INTO CATEGORIA VALUES('',?)");
    $query->execute($dados);
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


            <br><br><br><br>
   <section>

    <br><br>
        <div class="container">

            <div class="row">

                <div class="col-md-3"></div>

            <div class="col-md-5">
 <div class="row">

      <h1>Cadastro de categorias</h1>
<br>
                <form action="cad_categorias.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="ok" value="ok">


                    <label for="titulo">Nome da Categoria:</label>
                    <input type="text" class="form-control" name="categ">
                        <br>
                           <br>

                       


                        <div align="center">
                <input type="submit" class="btn btn-primary" value="Cadastrar">

            </div>
            <br><br><br>
            
                </form>



            </div>
        </div>

</div>
</div>
</section>

         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.js"></script>

    </body>

    </html>
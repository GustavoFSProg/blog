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


     <script src="jquery.js"></script>

  </head>

  <body >

      <?php 

      include "header.php";


     ?>

     <br><br><br><br><br><br><br>

     <div class="container">

      <div class="row">

        <div class="col-md-3"></div>

        <div class="col-md-5">

     <div align="center">

        <h2>Login de Usuários</h2>
     </div>

     <br><br>

    <div class="container">

        <div class="row">

      

        <div class="col-md-5">

            <form action="verifica_login.php" method="post">

                <div class="form-group">

                    <input type="text" class="form-control" name="nome">
                </div>


                <div class="form-group">

                    <input type="password" class="form-control" name="senha">
                </div>


                      <br>
               <div align="center">
                <input type="submit" class="btn btn-primary" value="Logar">

              </div>

                <input type="hidden" name="ok" value="ok">
            </form>

        </div>

    </div>

  </div>


    </div>
  </div>
</div>


     <br><br><br> 

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>


</body>
</html>
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


     <br><br><br><br>

     <div class="container">
        <div class="col-md-6">
            <div class="row">
         <h1>Login</h1>

     </div>

     <div class="row">

        <Div class="col-md-12">

            <form action="painel_adm.php" method="post">

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email">

                     <label for="senha">Senha: </label>
                    <input type="password" class="form-control" name="senha">

                    <br><br>
                    <div align="center">
                    <input type="submit" class="btn btn-default" value="Entrar">
                </div>
                </div>

            </form>

        </Div>

     </div>


    </div>
    </div>

     <script src="jquery.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.js"></script>

    </body>

    </html>
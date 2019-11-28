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

            <div class="col-md-4"></div>

            <div class="col-md-8">

   <?php



if(isset($_GET['excluir'])){

         $id=$_GET['id'];

         


        
          $query_delete=$conn->prepare("DELETE FROM POSTS  WHERE ID_POSTS= ?");

          if($query_delete->execute(array($id))){

            echo "<h3>Post deletado com sucesso!</h3>";
          }else{


            echo "<h3>ERRO.Post Não deletado!</h3>";
          }

        }

?>

  </div>
</div>
</div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>


</body>
</html>
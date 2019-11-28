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

  <body >

      <?php include "header.php";


     ?>
        <br><br><br><br><br>

        <div class="container">

        <div class="row">

          <div class="col-md-2"></div>

    <div class="col-md-8">

      <?php

      if(isset($_GET['id'])){



        $id=$_GET['id'];

 
      $query_sel2=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
        $query_sel2->execute(array($id));

        while($linhas2 = $query_sel2->fetchObject()){

          $visitas= $linhas2->visitas + 1;

     $query_update=$conn->prepare("UPDATE POSTS SET VISITAS = ? WHERE ID_POSTS= ?");
     $query_update->execute(array($visitas, $id));


          
      ?>

     <img src="upload/<?php echo $linhas2->imagem;?> " width="35%" height="25%">
     <br><br>

      <h2><?php  echo utf8_encode($linhas2->titulo); ?></h2>

      <p style="text-align: justify; text-indent:20px; font-family:calibri; font-size: 19px;">

       
         <?php  echo utf8_encode($linhas2->texto); ?>
      </p>

        <br><br>
      <span class="visitas" style="font-size: 17px;">Visitas <?php echo $linhas2->visitas ?> </span>

 </div>

<?php
      
    }
  
  }


     if(isset($_POST["comentario"])){


        $id_post=$_GET['id'];

        $nome=strip_tags(filter_input(INPUT_POST, "nome"));
        $comentario=$_POST['coment'];
        $data=date("Y-m-d");

        $dados=array($nome, $comentario, $data, $id_post);


        $query_insert=$conn->prepare("INSERT INTO COMENTARIOS VALUES('',?, ?, ?, ?);");
        $query_insert->execute($dados);

     }
      ?>

</div>
</div>

<br><br>

<?php
    

    if(isset($_POST['comentario'])){

        ?>

          <style>

           input#botao{

            display:none;
           }
        </style>

        <?php



    }
?>

  <div class="container">

    <div class="row">

        <div class="col-md-2"></div>

      <div class="col-md-7">


        <form action="posts.php?id=<?php echo $id; ?>"" method="post">


          <h2>Comentários</h2>
          <div class="form-group">

            <label> Nome </label>
            <input type="text" class="form-control" name="nome">
          </div>


          <input type="hidden" name="comentario" value="ok">

          <div class="form-group">

            <label> Comentário </label>
            <textarea  class="form-control" name="coment" rows="10">   </textarea> 
          </div>
          <br><br>
         <div align="center"><input type="submit" id="botao" class="btn btn-primary" value="Enviar">
         </div>
        </form>
      </div>
    </div>


  </div>
       <br><br><br>

       <div class="container">

      


         

            <div class="col-md-2"></div>
 
                 
              <div class="col-md-5">
                  <h2>Comentários</h2> 

              
                  <br>


 <?php

              if(isset($_GET['id'])){



                $id_post=$_GET['id'];


                $query_sel3=$conn->prepare("SELECT * FROM COMENTARIOS WHERE POST= ?");
                $query_sel3->execute(array($id_post));


                while($linhas3 = $query_sel3->fetchObject()){

              
             ?>
                  <div class="row">
                

 <div class="col-md-7">
                      <img src="img/6.jpg" width="10%" height="35%">

                      <span style="font-size: 18px; font-weight: bold;"
                      > <?php echo $linhas3->nome ?></span><br>

                     <span style="font-size: 18px;"><?php echo $linhas3->comentario; ?></span>
                    </div>
 </div>
                     <?php

                      }
                    }
                     ?>
                  

               </div>

          </div>

       </div> 

       <br><br><br><br>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>


</body>
</html>
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

      <?php include "header.php";


     ?>
        <br><br><br><br><br>
              <div class="container">

                    <div class="row">

                        <div class="col-md-6">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
     <div class="carousel-item active">
     <A href="http://www.pianopoa.com.br"> <img class="d-block w-90" src="img/1.png" alt="Primeiro Slide" width="300"></A>
    </div>
    <div class="carousel-item">
        <A href="#"><img class="d-block w-90" src="img/2.png" alt="Segundo Slide" width="300"></A>
    </div>
    <div class="carousel-item">
      <img class="d-block w-90" src="img/3.png" alt="Terceiro Slide" width="300">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>

</div>




 <div class="col-md-4">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
     <A href="http://www.pianopoa.com.br"> <img class="d-block w-90" src="img/4.JPG" alt="Primeiro Slide" width="300"></A>
    </div>
   <div class="carousel-item">
        <A href="#"><img class="d-block w-90" src="img/5.jpg" alt="Segundo Slide" width="300"></A>
    </div>
    <div class="carousel-item">
      <img class="d-block w-90" src="img/6.jpg" alt="Terceiro Slide" width="300">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
  </a>
</div>

</div>
</div>
</div> 

<br><br><br><br>

 <div class="container">
<div class="row">


  <div class="col-md-5" >

    <?php
     $cont= 0;
        $id_post= array();

        $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA= ?");
        $query_sel->execute(array(1));

        while($linhas = $query_sel->fetchObject()){


            $id_post[$cont]= $linhas->id_posts;

            $cont= $cont + 1;

        }


      $query_sel2=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
        $query_sel2->execute(array($id_post[$cont -1]));

        while($linhas2 = $query_sel2->fetchObject()){


          ?>

    <a href="posts.php?id=<?php  echo $linhas2->id_posts; ?>" style="color:black;text-decoration:none;"><img src="upload/<?php echo $linhas2->imagem;?> " width="75%" height="95%"></a>


 

 
<?php    }?>

   
  
   

 
</div>

<div class="col-md-1"></div>
 <div class="col-md-5" >

      <form action="cad_usuarios.php" method="post">

        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" name="nome" size="60%" class="form-control">
  </div>
          <label for="email" >Email</label>
          <input type="email" class="form-control" name="email" >

          <input type="hidden" name="ok" value="ok">

          <br><br>
          <div align="center">
            <input type="submit" class="btn btn-primary" value="Cadastrar">
          
          </div>
      
      </form>
    </div>
</div>

 <div class="row">

    <div class="col-md-5">

      <?php

        $cont= 0;
        $id_post= array();

        $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA= ?");
        $query_sel->execute(array(1));

        while($linhas = $query_sel->fetchObject()){


            $id_post[$cont]= $linhas->id_posts;

            $cont= $cont + 1;

        }


      $query_sel2=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
        $query_sel2->execute(array($id_post[$cont -1]));

        while($linhas2 = $query_sel2->fetchObject()){


          
      ?>

      <h2><?php  echo utf8_encode($linhas2->titulo); ?></h2>

      <p style="text-align: justify; text-indent:20px; font-family:calibri; font-size: 19px;">

       
         <?php  echo utf8_encode($linhas2->resumo); ?>
      </p></a>


   

 </div>

<?php
      
    }
  
      ?>


   <div class="col-md-1"></div>

    <div class="col-md-5">

        <?php
     $cont= 0;
        $id_post= array();

        $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA= ?");
        $query_sel->execute(array(2));

        while($linhas = $query_sel->fetchObject()){


            $id_post[$cont]= $linhas->id_posts;

            $cont= $cont + 1;

        }


      $query_sel2=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
        $query_sel2->execute(array($id_post[$cont -1]));

        while($linhas2 = $query_sel2->fetchObject()){


          ?>
   <br><br><a href="posts.php?id=<?php echo $linhas2->id_posts; ?>" style="color:black;text-decoration:none;"><img src="upload/<?php echo $linhas2->imagem;?>" width="65%" height="35%">

  

  <br><br>
     <h2><?php echo $linhas2->titulo; ?></h2>


    <p style="text-align: justify; text-indent:20px; font-family:calibri; font-size: 19px;"><?php  echo utf8_encode($linhas2->resumo); ?>
      </p>

</a>
   
  </div>

</div>

<?php

}

?>

  <div class="container">  

  <div class="row">
 
 
    <div class="col-md-6" >
           <?php
     $cont= 0;
        $id_post= array();

        $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA= ?");
        $query_sel->execute(array(2));


        if($query_sel->rowCount() == ''){


            echo "nenhum post econtrado nessa categoria.";

          }else{


        while($linhas = $query_sel->fetchObject()){


            $id_post[$cont]= $linhas->id_posts;

            $cont= $cont + 1;

      }


      $query_sel2=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
        $query_sel2->execute(array($id_post[$cont -1]));


       

        while($linhas2 = $query_sel2->fetchObject()){


          ?>
      <a href="posts.php?id=<?php echo $linhas2->id_posts; ?>" style="color:black;text-decoration:none; "><img style=" margin-top:-80px;" src="upload/<?php echo $linhas2->imagem;?>" width="60%" height="160%">


    </div>

  
 </div> 

</div>  


  <div class="row">


 
    <div class="col-md-5">

    <h2 style= "margin-top:50px;"><?php echo $linhas2->titulo; ?></h2 >

      <p style="text-align: justify; margin-top:10px; text-indent:20px; font-family:calibri; font-size: 19px;">
<?php
    echo utf8_encode($linhas2->resumo);
?>
</p></a>

<?php 

}
?>

    </div> 

    <div class="col-md-1"></div>

   
     <div class="col-md-5" >

       <?php
     $cont= 0;
        $id_post= array();

        $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA= ?");
        $query_sel->execute(array(5));

        while($linhas = $query_sel->fetchObject()){


            $id_post[$cont]= $linhas->id_posts;

            $cont= $cont + 1;

        }


      $query_sel2=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
        $query_sel2->execute(array($id_post[$cont -1]));

        while($linhas2 = $query_sel2->fetchObject()){


          ?>

      <a href="posts.php?id=<?php echo $linhas2->id_posts ?>" style="color:black;text-decoration:none; "><img style=" margin-top:-90px;" src="upload/5.jpg" width="90%" height="40%">
   
    <h2 style= "margin-top:50px;"><?php echo $linhas2->titulo; ?></h2 >

      <p style="text-align: justify; margin-top:10px; text-indent:20px; font-family:calibri; font-size: 19px;"> <?php echo utf8_encode($linhas2->resumo); ?>
</p></a>

<?php 

    }

  }
?>

    </div>


    </div>

  
 </div> 


  <div class="row">


 
  
 </div> 


  <div class="row">


    <div class="col-md-5">


  
 </div> 
  
 </div> 


  <div class="container">

  <div class="row">



    <div class="col-md-0"></div>

   
    <div class="col-md-5">

       <?php
     $cont= 0;
        $id_post= array();

        $query_sel=$conn->prepare("SELECT * FROM POSTS WHERE CATEGORIA= ?");
        $query_sel->execute(array(5));


         if($query_sel->rowCount() == ''){


            echo "nenhum post econtrado nessa categoria.";

          }else{


        while($linhas = $query_sel->fetchObject()){


            $id_post[$cont]= $linhas->id_posts;

            $cont= $cont + 1;

        }


      $query_sel2=$conn->prepare("SELECT * FROM POSTS WHERE ID_POSTS= ?");
        $query_sel2->execute(array($id_post[$cont -1]));

        while($linhas2 = $query_sel2->fetchObject()){


          ?>

      <a href="posts.php?id=<?php echo $linhas2->id_posts; ?>" style="color:black;text-decoration:none;"><img src="upload/<?php echo $linhas2->imagem; ?>" style="margin-top:-505px;" width="60%" height="50%">


    

  
 

  
   

      <h2 style="margin-top:-130px;"><?php   echo $linhas2->titulo; ?></h2>

      <p style="text-align: justify; text-indent:20px; font-family:calibri;  font-size: 19px;">

         <?php   echo utf8_encode($linhas2->resumo); ?>
      </p></a>

        <?php  }
      }


      ?>

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
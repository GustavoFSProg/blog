

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blogue 6</title>
    <link rel="icon" href="imagens/favicon.png">

    <!-- Bootstrap -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
     <script type="text/javascript" src="jquery.js"></script>
  
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparent" style= "background:blue;">

         <div class="container">

            

        <div class="navbar-header ">

            <button  type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-nav">

                <span class="sr-only">alternar navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>

        

    </div>

            <div class="collapse navbar-collapse" id="barra-nav">

                <ul class="nav navbar-nav navbar-right"  style="display:inline; padding:2px 10px; color:yellow;">

    <li style="padding:0px 10px;font-weight: bold;"><a href="index.php" style="color:yellow;"> HOME</a></li>

          <li style="padding:0px 10px;font-weight: bold;"><a href="index.php" style="color:yellow;font-weight: bold;"> POSTS</a></li>
                    
           <li style="padding:0px 10px;font-weight: bold;"><a href="admin.php" style="color:yellow;font-weight: bold;"> ADMINISTRAÇÃO</a></li>
        
                     <li class="dropdown" style="padding:0px 0px"> 
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="font-weight: bold;color:yellow;">
                CATEGORIAS <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu">

                <?php

                  $query_sel=$conn->prepare("SELECT * FROM CATEGORIAS");
                  $query_sel->execute();


                  while($linhas = $query_sel->fetchObject()){

                ?>
                <li> <a href="#"><?php  echo $linhas->nome; ?></a> </li>

                <?php

              }
                ?>
            
              </ul>

            </li>
                
                        <li style="padding:0px 10px;">&nbsp</li>

                </ul style="padding:0px 0px;">
            </div> 
 </div>

    
    
       </nav>   
         
    </body>

    </html>
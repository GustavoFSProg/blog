<?php
  
   require "classes/DB.php";
   require "config_upload.php";

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



    if(isset($_POST['ok'])){


    $arquivo_nome=$_FILES["arquivo"]["name"];
    $arquivo_tamanho=$_FILES["arquivo"]["size"];
    $arquivo_temporario=$_FILES["arquivo"]["tmp_name"];

    $titulo=$_POST['titulo'];
    $resumo=$_POST['resumo'];
    $data= $_POST['data'];
    $texto=$_POST['texto'];
    $categ=$_POST['categoria'];







       if(empty($arquivo_nome)){

        echo "Selececione uma imagem";
        
      }elseif(!empty($arquivo_nome)){


        //UPLOAD DA IMAGEM
         $ext=strrchr($arquivo_nome,".");
         
        $nome_final=($config_upload["renomeia"] ? md5 (time()).$ext : $arquivo_nome);
        $caminho=$config_upload["caminho_absoluto"].$nome_final;
        
        if(move_uploaded_file($arquivo_temporario,$caminho)){
            
            echo "UPLOAD EFETUADO COM SUCESSO!";
            
            
            
        }else
            {
                
                echo "Erro no Upload!";
                
                }

                $dados=array($arquivo_nome, $titulo, $resumo, $texto, $data, $categ);

                //insert no banco

                $query_insert=$conn->prepare("INSERT INTO POSTS VALUES('', ?, ?, ?, ?, ?, ?,'')");
                
                if($query_insert->execute($dados)){

                  ?>  <br><br> <br><br>


                  <?php
                  echo "Post Cadastrado com sucesso!";


                }

              }

            }




     ?>
        <br><br><br><br><br>


    <div class="container">

      <div class="row">

        <div class="col-md-2"></div>

        <div class="col-md-8">

          <br><br>

          <form enctype="multipart/form-data" action="cad_posts.php" method="post">

            <div class="form-group">
             Título <input type="text" class="form-control" name="titulo">

            </div>


            <div class="form-group">
             Imagem <input type="file" class="form-control" name="arquivo">

            </div>
              <div class="form-group">

            Resumo <textarea name="resumo" class="form-control"></textarea>
                </div>

                <div class="form-group">

             Texto do Post <textarea name="texto" class="form-control"></textarea>
            </div>

              Data<input type="date" name="data" class="form-control">

                <br><br>
              <select class="form-control" name="categoria">

                <?php
                $query_categ=$conn->prepare("SELECT * FROM CATEGORIAS");
                $query_categ->execute();

                while($linhas = $query_categ->fetchObject()){



                ?>

                <option value="<?php  echo $linhas->id_categorias; ?>"><?php  echo $linhas->nome; ?></option>
             
             


                <?php

              }
                ?>



              </select>


              <input type="hidden" name="ok" values=ok>

                <br><br><br><br>
                <div align="center">
              <input type="submit" class="btn btn-primary" value="Cadastrar">

                    </div>


                        </form>


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
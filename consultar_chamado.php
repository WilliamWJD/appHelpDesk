<?require_once"validador_acesso.php"?>

<?php 
  //declarando array de chamados
  $chamados=array();
  $arquivo=fopen('arquivo.txt', 'r');
  //FEOF TESTA PELO FIM DE UM ARQUIVO, PERCORRE UM DETERMINADO ARQUIVO ATÉ QUE ELA IDENTIFICA O FIM DO ARQUIVO
  while (!feof($arquivo)) {
    $registro=fgets($arquivo);

    //DETALHAMENTO DO REGISTRO
    $detalheRegistro=explode('#', $registro);

    if($_SESSION['perfil_id']==2){
      if($_SESSION['id'] != $detalheRegistro[0]){
        continue;
      }else{
        //POPULANDO ARRAY COM OS REGISTROS DO ARQUIVO TXT
        $chamados[]=$registro;
      }
    }else{
      //POPULANDO ARRAY COM OS REGISTROS DO ARQUIVO TXT
      $chamados[]=$registro;
    }

       
  }
  fclose($arquivo);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav_item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <!--LOOP --> 
              <? foreach($chamados as $chamado) { ?>               
                <!-- TRANSFORMA CADA POSIÇÃO DEPOIS DO # EM UM INDICE DE ARRAY -->
                <?php
                  $chamado_dados=explode('#', $chamado);

                  if(count($chamado_dados)<3){
                    continue;
                  }
                ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                    <p class="card-text"><?=$chamado_dados[3]?></p>

                  </div>
                </div>
              <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
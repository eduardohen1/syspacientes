<?php
   require_once('variaveis.php');
   require_once('conexao.php');

   $id_usuario = $_GET["id_usuario"];
   $nome_usuario = "";

   $sql = "SELECT nome FROM usuarios WHERE id = " . $id_usuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nome_usuario = $rows[0];
   }
   mysqli_close($conexao_bd);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - ADM</title>
    <link rel="icon" href="img/favicon/favicon2.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

<!-- Static navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SysPacientes</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Contato</a></li>
        <li><a href="#">Sobre</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Outros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ações</a></li>
            <li><a href="#">Serviços</a></li>
            <li><a href="#">Valores</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>

          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="./">Receitas <span class="sr-only">(current)</span></a></li>
        <li><a href="../navbar-static-top/">Comprar </a></li>
        <li><a href="../navbar-fixed-top/">Encerrar sessão</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div><!--/.container-fluid -->
</nav>

<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1><?php echo "<h3>Bem vindo: ". $nome_usuario . "</h3> "; ?></h1>
  <p>Sistema de cadastro de pacientes</p>
</div>

</div> <!-- /container -->
    
</body>
</html>
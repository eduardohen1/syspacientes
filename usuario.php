<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idUsuario = $_GET['idUsuario'];



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - Editar usuário</title>
   <link rel="icon" href="img/favicon/favicon2.ico">
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <h1>Editando o usuário XXXX</h1>
   <hr>
   <div class="container">
   <form>
      <div class="form-group">
         <label for="inputNome">Nome do usuário:</label>
         <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome do usuário">
      </div>
      <div class="form-group">
         <label for="inputEmail">E-mail:</label>
         <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="E-mail">
      </div>
      <div class="form-group">
         <label for="inputPassword">Senha</label>
         <input type="text" class="form-control" id="inputPassword" name="inputPassword">
      </div>      
      <button type="submit" class="btn btn-primary">Gravar</button>
   </form>
   </div>
</body>
</html>
<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idUsuario = $_GET['idUsuario'];
   $nomeUsuario  = "";
   $emailUsuario = "";
   $senhaUsuario = "";

   $sql = "SELECT nome, email, senha FROM usuarios WHERE id = " . $idUsuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nomeUsuario  = $rows[0];      
      $emailUsuario = $rows[1];
      $senhaUsuario = $rows[2];
   }  
   mysqli_close($conexao_bd);

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
   <h1>Editando o usuário <?php echo($nomeUsuario); ?></h1>
   <hr>
   <div class="container">
   <form
      method="post"
      action="usuario_gravar.php">
      <div class="form-group">
         <label for="inputNome">Nome do usuário:</label>
         <input type="text" class="form-control" id="inputNome" 
                name="inputNome" placeholder="Nome do usuário"
                value="<?php echo($nomeUsuario); ?>"
                >
      </div>
      <div class="form-group">
         <label for="inputEmail">E-mail:</label>
         <input type="email" class="form-control" id="inputEmail" 
                name="inputEmail" placeholder="E-mail"
                value="<?php echo($emailUsuario); ?>"
                >
      </div>
      <div class="form-group">
         <label for="inputPassword">Senha</label>
         <input type="text" class="form-control" id="inputPassword" name="inputPassword" value="<?php echo($senhaUsuario);?>">
      </div>
      <input type="hidden" id="inputIdUsuario" name="inputIdUsuario" value="<?php echo($idUsuario) ?>">
      <button type="submit" class="btn btn-success">Gravar</button>&nbsp;
      <a href="admin.php" class="btn btn-warning" role="button">Retornar</a>
   </form>
   </div>
</body>
</html>
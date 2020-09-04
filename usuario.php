<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idUsuario = $_GET['idUsuario'];

   //recuperando dados da sessao
   $id_usuario   = $_SESSION["id_usuario"];   
   $nome_usuario = "";
   
   $sql = "SELECT nome FROM usuarios WHERE id = ".$id_usuario;
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      $nome_usuario = $rows[0];
   }

   //verificar se o parametro de id de edição está vazio:   
   if(strlen($idUsuario)==0) 
      $idUsuario = 0;

   $nomeUsuario  = "";
   $emailUsuario = "";
   $senhaUsuario = "";

   if($idUsuario != 0){
      $sql = "SELECT nome, email, senha FROM usuarios WHERE id = " . $idUsuario;
      $resp = mysqli_query($conexao_bd, $sql);
      if($rows=mysqli_fetch_row($resp)){
         $nomeUsuario  = $rows[0];      
         $emailUsuario = $rows[1];
         $senhaUsuario = $rows[2];
      }  
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
   <div class="container">
      <!-- Static navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#">SysPacientes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="#">Cadastro de pessoas</a>
                <a class="dropdown-item" href="usuario_list2.php">Cadastro de usuários</a>                
                <a class="dropdown-item" href="#">Cadastro de pacientes</a>
              </div>
            </li>
          </ul>  
          <ul class="navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo($nome_usuario); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="minhaconta.php">Minha conta</a>
                <a class="dropdown-item" href="logout.php">Sair</a>                 
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <?php
         if($idUsuario != 0){
            echo("<h1>Editando o usuário: $nomeUsuario</h1>");
         }else{
            echo("<h1>Cadastro de novo usuário:</h1>");
         }
        ?>
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
            <a href="usuario_list2.php" class="btn btn-warning" role="button">Retornar</a>
         </form>
      </div>
    </div>



</body>
</html>
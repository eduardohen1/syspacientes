<?php
   require_once('variaveis.php');
   require_once('conexao.php');

   $email = $_POST["inputEmail"];
   $senha = $_POST["inputPassword"];
   $validou = true;
   $erro    = "";

   //validar login
   $sql = "SELECT id, email, senha FROM usuarios WHERE email = '$email'";
   $resp = mysqli_query($conexao_bd, $sql);
   if($rows=mysqli_fetch_row($resp)){
      echo $rows[0] . " | " . $rows[1] . " | " . $rows[2];
   }
   mysqli_close($conexao_bd);

   
   //exibir ou retornar:
   if($validou){
      echo "<hr>";
      echo "E-mail: " . $email."<br>";
      echo "Senha: ".$senha;
   }else{
      header("location:index.php?erro=$erro");
   }

?>
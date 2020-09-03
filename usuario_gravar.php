<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $senha      = $_POST["inputPassword"];
   $email      = $_POST["inputEmail"];
   $nome       = $_POST["inputNome"];
   $id_usuario = $_POST["inputIdUsuario"];
   
   if(strlen($id_usuario) > 0){
      //atualizar
      $sql = "UPDATE usuario SET nome = '$nome', email='$email', senha='$senha' WHERE id_usuario = $id_usuario";
      mysqli_query($conexao_bd, $sql);
   }else{
      //novo
   }
   mysqli_close($conexao_bd);
   header("location:usuario_list.php");
   
?>
<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $idUsuario = $_GET['idUsuario'];

   //verifico se é vazio:
   if(strlen($idUsuario) > 0){
      $sql = "DELETE FROM usuarios WHERE id = " .$idUsuario;
      mysqli_query($conexao_bd, $sql);
   }else{
      //erro!
   }
   mysqli_close($conexao_bd);
   header("location:usuario_list2.php");
?>
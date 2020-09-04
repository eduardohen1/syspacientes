<?php
   session_start();
   require_once('variaveis.php');
   require_once('conexao.php');

   $senha       = $_POST["inputPassword"];
   $email       = $_POST["inputEmail"];
   $nome        = $_POST["inputNome"];
   $tipo_acesso = $_POST["lstTipoAcesso"];
   $id_usuario  = $_POST["inputIdUsuario"];
   
   if(strlen($id_usuario) > 0){
      if($id_usuario != 0){
         //atualizar
         $sql = "UPDATE usuarios SET 
                  nome='$nome', 
                  email='$email', 
                  senha='$senha',
                  tipo_acesso= $tipo_acesso
                 WHERE id = $id_usuario";
      }else{
         //insert
         $sql = "INSERT INTO usuarios(   nome,    email,    senha,tipo_acesso)
                               VALUES('$nome', '$email', '$senha',$tipo_acesso)";
      }
      mysqli_query($conexao_bd, $sql);
   }else{
      //erro!
   }
   mysqli_close($conexao_bd);
   header("location:usuario_list2.php");
   
?>
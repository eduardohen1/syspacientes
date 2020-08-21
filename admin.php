<?php
   $id_usuario = $_GET["id_usuario"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SysPacientes - ADM</title>
    <link rel="icon" href="img/favicon/favicon2.ico">
</head>
<body>
   <?php
      echo "<h3>Usuário: ". $id_usuario . "</h3>";
   ?>
</body>
</html>
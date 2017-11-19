<?php
include("valida.php");
?>

<html>
<head>
<title>LOGIN</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="box">
<form action="index.php" method="post" enctype="multipart/form-data">
<center>
    <div>
        <input type="text" name="usuario" placeholder="Usuário">
    </div>
    <div class="input-group">
        <input type="password" name="senha" class="form-control" placeholder="Senha">
    </div>

<input type="submit" value="Entrar" name="submit">
<br>

<a href="esquece.php"> Esqueci minha senha </a>
</form>
</div>
</body>
</html>
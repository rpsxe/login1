<?php
//se o botão "sair" for ativado
if(isset($_REQUEST['sair'])){
	// vai destruir a sessão criada
	session_destroy();
	// vai limpar dados
	session_unset($_SESSION['usuarioconecta']);
	session_unset($_SESSION['senhaconecta']);
	// vai redirecionar para "index.php"
	header ("Location: index.php");
	}

?>
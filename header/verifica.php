<?php
ob_start();
session_start();
	//verifica se o usuário já está logado no sistema
if (!isset($_SESSION['usuarioconecta']) && (!isset($_SESSION['senhaconecta']))){
	header ("Location: index.php"); exit;
}
	include ("conecta/conexao.php");

?>
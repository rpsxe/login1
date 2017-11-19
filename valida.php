<?php
ob_start();
session_start();
		// verifica se o usuário já está logado no sistema
		// se já estiver logado no sistema ele vai encaminhar 
		// para "home.php" através do 'header' 
if (isset($_SESSION['usuarioconecta']) && (isset($_SESSION['senhaconecta']))){
	header ("Location: home.php"); exit;
}

		//LOGAR NO SISTEMA
	//incluir "conexao.php" dentro do arquivo
include ("conecta/conexao.php");
	// 'isset' — Informa se a variável foi iniciada
	// verifica se o botão "submit" foi iniciada pelo "$_POST"
if (isset($_POST['submit'])){ 
	//RECUPERAR DADOS DO FORM
		//trim — Retira espaço no ínicio e final de uma string
		//strip_tags — Retira as tags HTML e PHP de uma string
			//var usuário recebeu o que foi preenchido no formulário sem espaço e tags
			// devido ao uso do "trim" e "strip_tags"
	$usuario=trim(strip_tags($_POST['usuario'])); 
	$senha=trim(strip_tags($_POST['senha']));

	//SELECIONAR BANCO DE DADOS
		// selecionar * "tudo" da tabela 'login' onde referencia e senha
	$select = "SELECT * FROM `login` WHERE usuario=:usuario AND senha=:senha";
	try{
		$result = $conexao->prepare($select);
		$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);
		$result->execute();
		$contar = $result->rowCount();
		if($contar==1){
			$usuario=$_POST['usuario']; 
			$senha=$_POST['senha'];
			$_SESSION['usuarioconecta'] = $usuario; 
			$_SESSION['senhaconecta'] = $senha; 
			echo   '<div class="alert alert-success">
					<strong>Sucesso!</strong> 
					Aguarde o redirecionamento.
					</div>';
		header ("Refresh: 3, home.php"); 
		}else{
			echo '
			<div class="alert alert-danger">
			<strong>Senha ou usuário inválido!</strong> Tente novamente.
			</div>';
		}		
	}catch(PDOException $e){
		echo $e;
	}
}

?>

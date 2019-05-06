<?php

	session_start();
	
	$usuario_autenticado=false;

	//relação de usuarios do sistema
	$usuarios=array(
		array('email'=>'admin@admin.com.br', 'senha'=>'admin'),
		array('email'=>'user@user.com.br', 'senha'=>'user'),
	);
	

	foreach ($usuarios as $user) {
		if($user['email']==$_POST['email'] && $user['senha']==$_POST['senha']){
			$usuario_autenticado=true;
		}
	}
	if($usuario_autenticado){
		echo "Autenticado com sucesso";
		$_SESSION['autenticado']='SIM';
		header('Location: home.php');
	}else{
		header('Location: index.php?login=erro');
		$_SESSION['autenticado']='NÃO';
	}



?>
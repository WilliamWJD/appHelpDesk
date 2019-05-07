<?php

	session_start();
	
	$usuario_autenticado=false;
	$usuario_id=null;
	$usuario_perfil=null;

	$perfis=array(1=>'Administrador', 2=> 'Usuario');

	//relação de usuarios do sistema
	$usuarios=array(
		array('id'=>1,'email'=>'admin@admin.com.br', 'senha'=>'admin', 'perfil_id'=>1),
		array('id'=>2, 'email'=>'user@user.com.br', 'senha'=>'user', 'perfil_id'=>2),
		array('id'=>3, 'email'=>'william@william.com.br', 'senha'=>'william', 'perfil_id'=>1),
		array('id'=>4, 'email'=>'elivelton@elivelton.com.br', 'senha'=>'elivelton', 'perfil_id'=>2),
	);
	

	foreach ($usuarios as $user) {
		if($user['email']==$_POST['email'] && $user['senha']==$_POST['senha']){
			$usuario_autenticado=true;
			$usuario_id=$user['id'];
			$usuario_perfil=$user['perfil_id'];
		}
	}
	if($usuario_autenticado){
		echo "Autenticado com sucesso";
		$_SESSION['autenticado']='SIM';
		$_SESSION['id']=$usuario_id;
		$_SESSION['perfil_id']=$usuario_perfil;
		header('Location: home.php');
	}else{	
		$_SESSION['autenticado']='NÃO';
		header('Location: index.php?login=erro');
	}



?>
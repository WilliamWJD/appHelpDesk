<?php
	session_start();

	//ESTAMOS TRABALHANDO NA MONTAGEM DO TEXTO 
	$titulo=str_replace('#', '-', $_POST['titulo']);
	$categoria=str_replace('#', '-', $_POST['categoria']);
	$descricao=str_replace('#', '-', $_POST['descricao']);

	//PHP_ELO QUEBRA DE LINHA
	$texto=$_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

	//ABRINDO ARQUIVO
	$arquivo=fopen('arquivo.txt', 'a');

	//ESCREVENDO TEXTO
	fwrite($arquivo, $texto);

	//FECHANDO ARQUIVO
	fclose($arquivo);

	header('Location: abrir_chamado.php');
?>
<?php

	echo '<pre>';
		print_r($_POST);
	echo '</pre>';


	//ESTAMOS TRABALHANDO NA MONTAGEM DO TEXTO
	$titulo=str_replace('#', '-', $_POST['titulo']);
	$categoria=str_replace('#', '-', $_POST['categoria']);
	$descricao=str_replace('#', '-', $_POST['descricao']);

	//PHP_ELO QUEBRA DE LINHA
	$texto=$titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

	//ABRINDO ARQUIVO
	$arquivo=fopen('arquivo.txt', 'a');

	//ESCREVENDO TEXTO
	fwrite($arquivo, $texto);

	//FECHANDO ARQUIVO
	fclose($arquivo);
?>
<?php

function conn() {
    $cnx = mysqli_connect("localhost", "root", "", "lojaweb");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}

/*function conn() {
	$local = "./biblioteca/manipulacao/local.csv";
	$servidor = "./biblioteca/manipulacao/servidor.csv";
	$arquivo = $local; /*mudar p $servidor*/
	/*$arq = fopen($arquivo, 'r');
		$conexao = fgets($arq);
		$dados = explode(',', $conexao);
                $server = $dados[0];
                $usuario = $dados[1];
                $senha = $dados[2];
                $database = $dados[3];
        fclose($arq);
	$cnx = mysqli_connect($server, $usuario, $senha, $database);
	if (!$cnx) die('Deu errado a conexao!');
	return $cnx;
}
/*
function conn() {
    $cnx = mysqli_connect("localhost", "root", "", "sipaloja");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}
/*QUANDO HOSPEDAR*/
/*function conn() {
    $cnx = mysqli_connect("localhost", "id10017274_bebekarolsampaio", "shawn1998", "id10017274_sipaloja");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}  */
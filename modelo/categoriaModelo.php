<?php

function adicionarCategoria ($descricao){
    $sql = "INSERT INTO categoria (descricao) VALUES ('$descricao')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar produto' . mysqli_error($cnx)); }
    return 'Categoria cadastrado com sucesso!';
}

function pegarTodasCategorias() {
    $sql = "SELECT * FROM categoria";
    $resultado = mysqli_query(conn(), $sql);
    $categorias = array();
    while ($linha - mysqli_fetch_assoc($resultado)) {
        $categorias[] = $linha;
    }
    return $categorias;
}
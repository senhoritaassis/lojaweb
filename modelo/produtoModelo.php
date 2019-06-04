<?php

function adicionarProduto ($nome, $tipo, $preco, $cor, $fabricante, $descricao, $quantidade){
    $sql = "INSERT INTO produto (nome, tipo, preco, cor, fabricante, descricao, quantidade) VALUES ('$nome', '$tipo', '$preco', '$cor', '$fabricante', '$descricao', '$quantidade')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar produto' . mysqli_error($cnx)); }
    return 'Produto cadastrado com sucesso!';
}

function pegarTodosProdutos() {
    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query(conn(), $sql);
    $produto = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $produto[] = $linha;
    }
    return $produto;
}

function pegarProdutoPorId($id){
    //buscar um único produto pelo $id
    $sql = "SELECT * FROM produto WHERE idProduto= $id";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $produto
    $produto = mysqli_fetch_assoc($resultado);
    //retorna o $produto
    return $produto;
}
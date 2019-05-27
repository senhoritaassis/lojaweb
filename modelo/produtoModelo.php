<?php

function adicionarProduto ($nome, $tipo, $preco, $cor, $fabricante, $descricao, $quantidade){
    $sql = "INSERT INTO produto (nome, tipo, preco, cor, fabricante, descricao, quantidade) VALUES ('$nome', '$tipo', '$preco', '$cor', '$fabricante', '$descricao', '$quantidade')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar produto' . mysqli_error($cnx)); }
    return 'Produto cadastrado com sucesso!';
}


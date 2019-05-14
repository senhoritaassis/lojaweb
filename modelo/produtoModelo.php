<?php

function adicionarProduto ($nome, $tipo, $preco, $cor, $fabricnte, $descricao, $quantidade){
    $sql = "INSERT INTO cliente (email, senha, cpf, nome, nascimento, sexo, telefone) VALUES ('$nome', '$tipo', '$preco', '$cor', '$fabricante', '$descricao', '$quantidade')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar cliente' . mysqli_error($cnx)); }
    return 'Cliente cadastrado com sucesso!';
}


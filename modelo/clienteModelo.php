<?php

function adicionarCliente ($email, $senha, $cpf, $nome, $nascimento, $sexo, $telefone){
    $sql = "INSERT INTO cliente (email, senha, cpf, nome, nascimento, sexo, telefone) VALUES ('$email', '$senha', '$cpf', '$nome', '$nascimento', '$sexo', '$telefone')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar cliente' . mysqli_error($cnx)); }
    return 'Cliente cadastrado com sucesso!';
}
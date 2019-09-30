<?php

function adicionarCliente ($email, $senha, $cpf, $nome, $nascimento, $sexo, $tipo, $telefone){
    $sql = "INSERT INTO cliente (email, senha, cpf, nome, nascimento, sexo, tipo, telefone) VALUES ('$email', '$senha', '$cpf', '$nome', '$nascimento', '$sexo', '$tipo', '$telefone')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar cliente' . mysqli_error($cnx)); }
    return 'Cliente cadastrado com sucesso!';
}

function pegarUsuarioPorEmailSenha($email, $senha) {
    $sql = "SELECT * FROM cliente WHERE email= '$email' and senha = '$senha'";
    $resultado = mysqli_query(conn(), $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function pegarTodosClientes() {
    $sql = "SELECT * FROM cliente";
    $resultado = mysqli_query(conn(), $sql);
    $clientes = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $clientes[] = $linha;
    }
    return $clientes;
}

function pegarClientePorId($id){
    //buscar um único cliente pelo $id
    $sql = "SELECT * FROM cliente WHERE idCliente= $id";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $cliente
    $cliente = mysqli_fetch_assoc($resultado);
    //retorna o $cliente
    return $cliente;
}

function deletarCliente($id) {
    $sql = "DELETE FROM cliente WHERE idCliente = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) {
     die('Erro ao deletar cliente' . mysqli_error($cnx));
    }
    
    return 'Cliente deletado com sucesso!';
}

function editarCliente($id, $nome, $email, $senha, $nascimento, $sexo, $tipo, $telefone) {
    $sql = "UPDATE cliente SET nome = '$nome', email = '$email', senha = '$senha', nascimento = '$nascimento', sexo = '$sexo', tipo = '$tipo', telefone = '$telefone' WHERE idCliente = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar cliente' . mysqli_error($cnx));
    }
    return 'Cliente alterado com sucesso!';
}
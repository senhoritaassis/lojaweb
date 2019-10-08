<?php

function adicionarCupom ($descricao, $desconto){
    $sql = "INSERT INTO cupom (descricao, desconto) VALUES ('$descricao', '$desconto')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar o cupom' . mysqli_error($cnx)); }
    return 'Cupom cadastrado com sucesso!';
}

function pegarTodosCupom() {
    $sql = "SELECT * FROM cupom";
    $resultado = mysqli_query(conn(), $sql);
    $cupons = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $cupons[] = $linha;
    }
    return $cupons;
}
function pegarCupomPorId($id){
    //buscar um único cupom pelo $id
    $sql = "SELECT * FROM cupom WHERE idcupom= $id";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $cupom
    $cupom = mysqli_fetch_assoc($resultado);
    //retorna o $produto
    return $cupom;
}

function pegarCupomPorDescricao($descricao){
    //buscar um único cupom pelo $id
    $sql = "SELECT * FROM cupom WHERE nomecupom= $descricao";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $cupom
    $cupom = mysqli_fetch_assoc($resultado);
    //retorna o $produto
    return $cupom;
}

function deletarCupom($id) {
    $sql = "DELETE FROM cupom WHERE idcupom = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) {
     die('Erro ao deletar cupom' . mysqli_error($cnx));
    }
    
    return 'Cupom deletado com sucesso!';
}
function editarCupom($id, $descricao, $desconto) {
    $sql = "UPDATE cupom SET descricao = '$descricao', desconto = '$desconto' WHERE idcupom = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar cupom' . mysqli_error($cnx));
    }
    return 'Cupom alterado com sucesso!';
}


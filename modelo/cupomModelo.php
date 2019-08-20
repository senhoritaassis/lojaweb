<?php

function adicionarCupom ($descricao, $desconto){
    $sql = "INSERT INTO desconto (descricao, desconto) VALUES ('$descricao', '$desconto')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar o cupom' . mysqli_error($cnx)); }
    return 'Cupom cadastrado com sucesso!';
}

function pegarTodosCupom() {
    $sql = "SELECT * FROM cupom";
    $resultado = mysqli_query(conn(), $sql);
    $cupom = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $cupom[] = $linha;
    }
    return $cupom;
}


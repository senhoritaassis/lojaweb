<?php

function adicionarEndereco ($logradouro, $numero, $complemento, $bairro, $cidade, $cep, $idCliente){
    $sql = "INSERT INTO endereco (logradouro, numero, complemento, bairro, cidade, cep, id ) VALUES ('$descricao', '$$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$cep', '$idCliente',)";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if (!$resultado) {die('Erro ao cadastrar o endereco' . mysqli_error($cnx)); }
    return 'Endereco cadastrado com sucesso!';
}

function pegarTodosEndereco() {
    $sql = "SELECT * FROM endereco";
    $resultado = mysqli_query(conn(), $sql);
    $cupom = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $endereco[] = $linha;
    }
    return $endereco;
}
function pegarEnderecoPorId($id){
    //buscar um único endereco pelo $id
    $sql = "SELECT * FROM endereco WHERE idendereco= $id";
    //Roda nosso comando
    $resultado = mysqli_query(conn(), $sql);
    //Joga o resultado no array $cupom
    $cupom = mysqli_fetch_assoc($resultado);
    //retorna o $produto
    return $endereco;
}

function deletarEndereco($id) {
    $sql = "DELETE FROM cupom WHERE idendereco = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) {
     die('Erro ao deletar endereco' . mysqli_error($cnx));
    }
    
    return 'Endereco deletado com sucesso!';
}
function editarEndereco($id, $logradouro, $numero, $complemento, $bairro, $cidade, $cep) {
    $sql = "UPDATE endereco SET logradouro = '$logradouro', numero = '$numero, complemento = '$complemento, bairro = '$bairro', cidade = '$cidade, cep = '$cep WHERE idendereco = $idendereco";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar cupom' . mysqli_error($cnx));
    }
    return 'Endereco alterado com sucesso!';
}


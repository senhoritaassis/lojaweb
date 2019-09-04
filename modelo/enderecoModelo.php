<?php

function adicionarEndereco ($idUsuario,$logradouro, $numero, $complemento, $bairro, $cidade, $cep){
    $sql = "INSERT INTO endereco (idendereco,idusuario,logradouro, numero, complemento, bairro, cidade, cep) "
            . "VALUES (null,'$idUsuario','$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$cep')";
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
     $endereco = mysqli_fetch_assoc($resultado);
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
function editarEndereco($idendereco, $logradouro, $numero, $complemento, $bairro, $cidade, $cep) {
    $sql = "UPDATE endereco SET logradouro = '$logradouro', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', cep = '$cep' WHERE idendereco = '$idendereco'";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar cupom' . mysqli_error($cnx));
    }
    return 'Endereco alterado com sucesso!';
}

function pegarEnderecosPorUsuario ($idUsuario){
    $sql = "SELECT * FROM endereco WHERE idUsuario= $idUsuario";
    $resultado = mysqli_query(conn(), $sql);
    $endereco = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $endereco[]= $linha;
    }
    return $endereco;
}

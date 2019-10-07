<?php

function pegarTodosPedidos(){
    $sql = "SELECT * FROM pedido";
    $resultado = mysqli_query(conn(), $sql);
    $pedidos = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $pedidos[] = $linha;
    }
    return $pedidos;
}
function pegarPedidosPorId($id){
    $sql = "SELECT * FROM pedido WHERE IdUsuario = '$id'";
    $resultado = mysqli_query(conn(), $sql);
    $pedidos = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $pedidos[] = $linha;
    }
    return $pedidos;
}
function adicionarPedido($idFormaPagamento, $idusuario, $idendereco, $datacompra){
    $idUser = $_SESSION["idLogado"];
    $sql = "INSERT INTO pedido(idFormaPagamento, idusuario idendereco, datacompra) 
    VALUES (NULL,'$idusuario','$idFormaPagamento','$idendereco','$datacompra)";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao cadastrar pedido' . mysqli_error($cnx)); }
    return 'Produto cadastrado com sucesso!';
}
function pegarPedidosPorInterDatas(){
    $sql = "SELECT * FROM pedido WHERE 
    DtPedido >= NOW()-INTERVAL 30 DAY";
    $resultado = mysqli_query(conn(), $sql);
    $pedidos = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $pedidos[] = $linha;
    }
    return $pedidos;
}

//function pegarProdutoMunicipio

// function vizualizar pedid


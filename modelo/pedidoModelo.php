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

function adicionarPedido($idFormaPagamento, $idendereco, $produtos){
    $idUser = acessoPegarIDUsuario();

    $dataCompra = date('Y-m-d');
    $sql = "CALL sp_addPedido('$idFormaPagamento','$idUser', '$idendereco','$dataCompra')";

    $resultado = mysqli_query($cnx = conn(), $sql);

    $pedido = mysqli_fetch_assoc($resultado);

    $id_pedido = $pedido['Msg'];

    foreach ($produtos as $produto) {
        $id_produto = $produto['idproduto'];
        $quantidade = $produto['quantidade'];
        $sql = "INSERT INTO pedido_produto VALUES ('$id_produto','$id_pedido','$quantidade')";
        $resultado_pedido_produto = mysqli_query(conn(), $sql);
    }

    // if(!$resultado) { die('Erro ao cadastrar pedido' . mysqli_error($cnx)); }
    // return 'Produto cadastrado com sucesso!';
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
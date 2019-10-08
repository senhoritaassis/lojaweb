<?php

require_once 'modelo/cupomModelo.php';
require_once "modelo/FormaPagamentoModelo.php";
require_once "modelo/pedidoModelo.php";
require_once "modelo/produtoModelo.php";

/** anon */
function index($id) {
    $dados["pedidos"] = pegarPedidosPorId($id);
  
    if (!empty($dados["pedidos"])) {
        exibir("pedido/listar", $dados);
    } else {
        exibir("pedido/vazio");
    }
} 
  
function buscarProd($id) {
    $busca = pegarNomeProdutoPorId($id);
    return $busca["nomeproduto"];
}

function finalizar() {
    $idproduto = array();
    $idFormaPagamento = array();
    $idusuario = array();
    $idendereco = array();
    $datacompra = array();
    $idpedido = array();
    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        $idproduto = $_SESSION["carrinho"][$i]["id"];
        $quantidade = $_SESSION["carrinho"][$i]["quantidade"];
    }

    $array_cupom = pegarTodosCupom();
    if(verificaCupom($array_cupom, $desconto)){
        $valor_total = $valor_bruto - ($desconto/100);
    }

    $pedido = adicionarPedido($idpedido, $idFormaPagamento, $idusuario, $idendereco, $datacompra);
    unset($_SESSION["carrinho"]);
    unset($_SESSION["cupom"]);
    unset($_SESSION["valorTotal"]);
    redirecionar("pedido/formulario");
}

function adicionar() {
    if (ehPost()) {
        $idFormaPagamento = $_POST["FormaPagamento"];
        $idendereco = $_POST["endereco"];
        $id = $_POST["nomeproduto"];
        $carrinho = $_SESSION["carrinho"][$i]["id"];

        $desconto = $_POST['cupom'];
    } else {
        //aqui não existem dados submetidos!
        $dados["FormaPagamento"] = pegarTodasFormaPagamentos();
        exibir("produto/formulario", $dados);
    }
}

function verificaCupom($array_cupom, $desconto) {
    foreach ($array_cupom as $cupom) {
        if ($cupom['nome'] == $desconto) {
            return true;
        }
    }
    return false;
}



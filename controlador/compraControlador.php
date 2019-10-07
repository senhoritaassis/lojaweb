<?php

require_once "modelo/produtoModelo.php";

/** anon */
function index() {
    if (isset($_POST['cupom'])){
        $cupom = $_POST['cupom'];
    } else {
        $cupom = 0;
    }

    $produtosCarrinhoId = array();
    foreach ($_SESSION["carrinho"] as $produtoID) {
        $produtosCarrinhoId[] = pegarProdutoPorId($produtoID["idproduto"]);
    }
    $dados["produtos"] = $produtosCarrinhoId;

    $preco_total = 0;

    //pega e manda quantidade de produtos
    $produtosCarrinhoQuant = array();
    foreach ($_SESSION["carrinho"] as $produtoQuant) {
        $produtosCarrinhoQuant[] = $produtoQuant["quantidade"];
        print_r($produtoQuant);
        $preco_produto = pegarProdutoPorId($produtoQuant["idproduto"]);
        $preco_total += ($produtoQuant["quantidade"] * $preco_produto['preco']);
    }

//    $preco_com_desconto = fazendoDesconto($preco_total, $cupom);

    $dados["valor_total"] = $preco_com_desconto;
    $dados["quantidade"] = $produtosCarrinhoQuant;
    exibir("compra/formulario", $dados);
}

function metodoPagamento() {
    if (ehPost()) {
        extract($_POST);
        $_SESSION["metodo"] = $_POST["pagamento"];
    } else {
        redirecionar("compra/");
    }
}

function fazendoDesconto($valor, $cupom) {
    $valor = $valor - ($valor * ($cupom / 100));
    return $valor;
}

function cancelarCompra() {
    unset($_SESSION["cupom"]);
    unset($_SESSION["valorTotal"]);
    unset($_SESSION["metodo"]);
    redirecionar("./home/");
}

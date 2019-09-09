<?php

require "./modelo/produtoModelo.php";
require "./modelo/cupomModelo.php";

function index() {
    if (ehPost()) {
        extract($_POST);
        $NomeCupom = $cupom;
        $desconto = pegarDesconto($NomeCupom);
        $dados["desconto"] = $desconto;
        if (empty($desconto)) {
            echo "desconto inexistente";
        }
    }

    if (!empty($_SESSION["carrinho"])) {
        $carrinhos = $_SESSION["carrinho"];
        foreach ($carrinhos as $carrinho) {
            $produtos[] = pegarProdutoPorId($carrinho['id']);
        }
        $_SESSION['carrinho'] = $produtos;
        
        $dados['quantidade'] = 0;
        $dados['subtotal'] = 0;
        // colocar um foreach pra calcular a quantidade e o subtotal
        
        var_dump($_SESSION['carrinho']);
        exibir("produto/carrinho", $dados);
    } else {
        exibir("produto/carrinho");
    }
}

function comprar($id) {
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = array();
    }

    $alt = false;

    for ($i = 0; $i < count($_SESSION["carrinho"]); $i++) {
        if ($_SESSION["carrinho"][$i]["id"] == $id) {
            $alt = true;
            $_SESSION["carrinho"][$i]["quantidade"] ++;
        }
    }

    if (!$alt) {
        $produto["id"] = $id;
        $produto["quantidade"] = 1;
        $_SESSION["carrinho"][] = $produto;
    }
    redirecionar("carrinho/index");
}

function deletar($id) {
    unset($_SESSION["carrinho"][$id]);
    redirecionar("carrinho/index");
}
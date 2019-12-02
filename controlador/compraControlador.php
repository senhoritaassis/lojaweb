<?php

require_once "modelo/produtoModelo.php";
require_once "modelo/cupomModelo.php";
require_once "modelo/FormaPagamentoModelo.php";


/** anon */
function index() {
	if (isset($_POST['descricao'])){
		$cupom = $_POST['descricao'];
		$desconto = pegarCupomPorDescricao($cupom);
	} else {
		$desconto['desconto'] = 0;
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
		$preco_produto = pegarProdutoPorId($produtoQuant["idproduto"]);
		$preco_total += ($produtoQuant["quantidade"] * $preco_produto['preco']);
	}

	$dados["fpagamento"] = pegarTodasFormaPagamentos();

	$dados["subtotal"] = $preco_total;
	$dados["desconto"] = $desconto['desconto'];
	$dados["valor_total"] = $preco_total - $desconto['desconto'];
	$dados["quantidade"] = $produtosCarrinhoQuant;
	$_SESSION['valorTotal'] = $dados["valor_total"];
	
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


function cancelarCompra() {
	unset($_SESSION["cupom"]);
	unset($_SESSION["valorTotal"]);
	unset($_SESSION["metodo"]);
	redirecionar("./");
}

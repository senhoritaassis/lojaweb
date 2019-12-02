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
	$idendereco = 1;

	$produtos = $_SESSION['carrinho'];
	$idFormaPagamento = $_POST['pagamento'];

	adicionarPedido($idFormaPagamento, $idendereco, $produtos);

	unset($_SESSION["carrinho"]);
	unset($_SESSION["cupom"]);
	unset($_SESSION["valorTotal"]);
	redirecionar(".");
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

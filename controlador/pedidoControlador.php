<?php

require_once "modelo/pedidoModelo.php";
require_once "modelo/produtoModelo.php";
/** Admin */
function index($id) {
	$dados["pedidos"] = pegarPedidosPorId($id);
	
	if(!empty($dados["pedidos"])){
		exibir("pedido/listar", $dados);
	}else{
		exibir("pedido/vazio");
	}
}
function buscarProd($id){
	$busca = pegarNomeProdutoPorId($id);
	return $busca["nomeproduto"];
}
function finalizar(){
	$idproduto = array();
	$idFormaPagamento = array();
        $idusuario= array();
        $idendereco = array();
	$datacompra = array();
        $idpedido = array();
	for ($i=0; $i < count($_SESSION["carrinho"]); $i++) { 
		$idproduto = $_SESSION["carrinho"][$i]["id"];
		$quantidade = $_SESSION["carrinho"][$i]["quantidade"];
	}
	$pedido = adicionarPedido($idpedido,$idFormaPagamento, $idusuario, $idendereco, $datacompra);
	unset($_SESSION["carrinho"]);
	unset($_SESSION["cupom"]);
        unset($_SESSION["valorTotal"]);
	unset($_SESSION[""]);
        unset($_SESSION['']);
        redirecionar("pedido/formulario");
}


function adicionar() {
    if (ehPost()) {
        $idFormaPagamento = $_POST["FormaPagamento"];
        $idendereco = $_POST["endereco"];
        $id = $_POST["nomeproduto"];
        $idproduto = $_SESSION["carrinho"][$i]["id"];
                
        
        } else {
        //aqui não existem dados submetidos!
        $dados["FormaPagamento"] = pegarTodasFormasPagamento();
        exibir("produto/formulario", $dados);
    }
        
}    
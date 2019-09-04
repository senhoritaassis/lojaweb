<?php 

require "./modelo/produtoModelo.php";
require "./modelo/cupomModelo.php";

function index(){
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
		$carrinho = $_SESSION["carrinho"];
		$dados["carrinho"] = pegarProdutosPorId($carrinho);
		exibir("produto/carrinho",$dados);
	}else{
		exibir("produto/carrinho");
	}
}
function adicionar($id){
        if (!isset($_SESSION["carrinho"])) {
            $_SESSION["carrinho"] = array();
        }
        
        $alt = false;
        
        for ($i=0; $i < count($_SESSION["carrinho"]); $i++) {
            if ($_SESSION["carrinho"][$i]["id"] == $id) {
                $alt = true;
                $_SESSION["carrinho"][$i]["quantidade"]++;               
            }
        }
        
        if (!$alt) {
            $produto["id"] = $id;
            $produto["quantidade"] = 1;
            $_SESSION["carrinho"][] = $produto; 
        }
        redirecionar("carrinho/index");    
}	

function deletar($id){
	unset($_SESSION["carrinho"][$id]);
	redirecionar("carrinho/index");
}
?>




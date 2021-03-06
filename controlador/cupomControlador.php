<?php

require_once "modelo/cupomModelo.php";
require_once "modelo/produtoModelo.php";

/** A */
function adicionar() {
     if(ehPost()) {
        $descricao = $_POST["descricao"];
        $desconto = $_POST["desconto"];
        $errors = array();
        //validação do campo descricao
         if (strlen(trim($descricao)) == 0) {
        //caso nao esteja preenchido, verifiar descricao válido
           $errors[] = "Você deve inserir uma descricao.";
        } 
        //validação do campo desconto
         if (strlen(trim($desconto)) == 0) {
            //caso nao esteja preenchido, verifiar desconto válido
            $errors[] = "Você deve inserir uma desconto.";
        } else {
            if (filter_var($desconto, FILTER_VALIDATE_INT) == false){
                //caso desconto seja invalido, adicionar o array
                $errors[] = "Inserir um desconto válido.";
            }
        }
        //verificar se existem erros antes de adicionar no banco
        $dados = array();
        if (count($errors) > 0){     
           $dados["errors"] = $errors;
           exibir("cupom/formulario",$dados);
           

        } else {
             //chamar a função do modelo para salvar no banco de dados 
            $msg = adicionarCupom($descricao, $desconto);
            redirecionar("cupom/listarCupons");
         }
    } else {
        //aqui não existem dados submetidos!
      
        exibir("cupom/formulario");
    }
}

/** A */
function listarCupons() {
    $dados = array();
    $dados["cupons"] = pegarTodosCupom();
    exibir("cupom/listar", $dados);
}

/** A */
function ver($id) {
//passa o $id para o a função pegarCupomPorId do modelo
$dados["cupom"] = pegarCupomPorId($id);
//chama o arquivo: visao/cupom/visualizar.visao.php
exibir("cupom/visualizar", $dados);
}

/** A */
function deletar($id) {
$msg = deletarCupom($id);
redirecionar("cupom/listarCupons");
}

/** A */
function editar ($id) {
    if (ehPost()) {
        
        $descricao = $_POST["descricao"];
        $desconto = $_POST["desconto"];
        editarCupom($id, $descricao, $desconto);
        redirecionar("cupom/listarCupons");
    } else {
        //aqui não existem dados submetidos!
        exibir("cupom/formulario");
    }
}

/** anon */ 
function confereCupom() {
    if (ehPost()) {
        extract($_POST);
        
        $descricao = $_POST["descricao"];
        $dados["cupom"] = pegarCupomPorDescricao($descricao);
        redirecionar("cupom/desconto");
    } else {
        exibir("cupom/confereCupom");
    }
   
}

/** anon */  
        
function desconto () {
    if(ehPost()){
        $desconto = 10;
        $valorTotal = $_SESSION['total'];
    $valorTotal = $valorTotal - $desconto;
    $dados["produtos"] = $_SESSION["carrinho"];
    $dados["total"] = $valorTotal;
    $_SESSION['total'] = $valorTotal;
    $_SESSION["quantcarrinho"] = 0;
    if (isset($_SESSION["carrinho"])) {
        $produtosCarrinho = array();
        foreach ($_SESSION["carrinho"] as $produtoSessao) {
            $_SESSION["quantcarrinho"] += $produtoSessao["quantidade"];
            $produtoBanco = pegarProdutoPorId ($produtoSessao["idproduto"]);
            $produtosCarrinho[] = $produtoBanco;
        }
        $dados["produtos"] = $produtosCarrinho;
        exibir("compra/formulario", $dados);
    } else {
        exibir("compra/formulario", $dados);
    }
    }
}
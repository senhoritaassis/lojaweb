<?php


require_once "modelo/FormaPagamentoModelo.php";
require_once "modelo/clienteModelo.php";

  
/** A */
function adicionar() {
    if (ehPost()) {
        echo "cliquei no formulario!";
        $descricao = $_POST["descricao"];
        
        //validação do campo descricao
        adicionarFormaPagamento($descricao);
        redirecionar("FormaPagamento/listarFormaPagamento");
    } else {
        //aqui não existem dados submetidos!
       
        exibir("FormaPagamento/formulario");
    }
    }

/** A */
function listarFormaPagamento() {
    $dados = array();
    $dados["FormaPagamentos"] = pegarTodasFormaPagamentos();
    exibir("FormaPagamento/listar", $dados);
}

/** A */
function ver($id) {
//passa o $id para o a função pegarFormaPagamentoPorId do modelo
$dados["FormaPagamento"] = pegarFormaPagamentoPorId($id);
//chama o arquivo: visao/FormaPagamento/visualizar.visao.php
exibir("FormaPagamento/visualizar", $dados);
}

/** A */
function deletar($id) {
$msg = deletarFormaPagamento($id);
redirecionar("FormaPagamento/listarFormaPagamento");
}

/** A */
function editar ($id) {
    if (ehPost()) {
        echo "cliquei no formulario!";
        $descricao = $_POST["descricao"];
        //validação do campo descricao
        editarFormaPagamento($id, $descricao);
        redirecionar("FormaPagamento/listarFormaPagamento");
    } else {
        //aqui não existem dados submetidos!
        exibir("FormaPagamento/formulario");
    }
}

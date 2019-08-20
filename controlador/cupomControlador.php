<?php

require_once "modelo/cupomModelo.php";
require_once "modelo/produtoModelo.php";

function adicionar() {
    if (ehPost()) {
        echo "cliquei no formulario!";
        $descricao = $_POST["descricao"];
        $desconto = $_POST["desconto"];
        //validação do campo descricao
        adicionarCupom($descricao, $desconto);
        redirecionar("cupom/listarCupons");
    } else {
        //aqui não existem dados submetidos!
        exibir("cupom/formulario");
    }
    }

function listarCupons() {
    $dados = array();
    $dados["cupons"] = pegarTodosCupom();
    exibir("cupom/listar", $dados);
}

function ver($id) {
//passa o $id para o a função pegarCupomPorId do modelo
$dados["cupom"] = pegarCupomPorId($id);
//chama o arquivo: visao/cupom/visualizar.visao.php
exibir("cupom/visualizar", $dados);
}

function deletar($id) {
$msg = deletarCupom($id);
redirecionar("cupom/listarCupons");
}

function editar ($id) {
    if (ehPost()) {
        echo "cliquei no formulario!";
        $descricao = $_POST["descricao"];
        $desconto = $_POST["desconto"];
        editarCupom($id, $descricao, $desconto);
        redirecionar("cupom/listarCupons");
    } else {
        //aqui não existem dados submetidos!
        exibir("cupom/formulario");
    }
}
<?php

require_once "modelo/produtoModelo.php";

function adicionar (){
    if(ehPost())    {
       $nome = $_POST["nome"];
       $tipo = $_POST["tipo"];
       $preco = $_POST["preco"];
       $cor = $_POST["cor"];
       $fabricante = $_POST["fabricante"];
       $descricao = $_POST["descricao"];
       $quantidade = $_POST["quantidade"];
       
      
       
    $msg = adicionarProduto($nome, $tipo, $preco, $cor, $fabricante, $descricao, $quantidade);
        echo $msg;
         redirecionar("./produto/listarProdutos");
       
    }else  {
    
    }
    
    exibir("produto/formulario");
}

require_once "modelo/produtoModelo.php";

function listarProdutos() {
    $dados = array();
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produto/listar", $dados);
}


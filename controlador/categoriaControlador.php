<?php

require_once "modelo/categoriaModelo.php";

function adicionar() {
    if (ehPost()) {
        //aqui os dados foram submetidos!

        $descricao = $_POST["descricao"];
        //aqui vai as suas validações dos campos acima
        
       //validação do campo descricao
  if (strlen(trim($descricao)) == 0) {
      //caso nao esteja preenchido, verifiar descricao válido
         $errors[] = "Você deve inserir um descricao";
  } 

        $msg = adicionarCategoria($descricao);
        echo $msg;
         redirecionar("./categoria/listarCategorias");
    } else {
        //aqui não existem dados submetidos!
    }
    exibir("categoria/formulario");
}
require_once "modelo/categoriaModelo.php";

function listarCategorias() {
    $dados = array();
    $dados["categorias"] = pegarTodasCategorias();
    exibir("categoria/listar", $dados);
}

require_once "modelo/categoriaModelo.php";

function ver($id) {
    //passa o $id para o a função pegarUsuarioPorId do modelo
    $dados["categoria"] = pegarCategoriaPorId($id);
    //chama o arquivo: visao/categoria/visualizar.visao.php
    exibir("categoria/visualizar", $dados);
}
 


require_once "modelo/categoriaModelo.php";

function deletar($id) {
    $msg = deletarCategoria($id);
    redirecionar("categoria/listarCategorias");
    
}

require_once "modelo/categoriaModelo.php";

function editar($id) {
    if (ehPost()) {
        $id = $_POST["id"];
        
        editarCategoria($id);
        redirecionar("categoria/listar");
    } else {
        $dados["categoria"] = pegarCategoriaPorId($id);
        exibir("categoria/formulario", $dados);
    }
}

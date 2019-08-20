<?php

require_once "modelo/cupomModelo.php";
require_once "modelo/produtoModelo.php";

function adicionar (){
    if(ehPost())    {
       $descricao = $_POST["descricao"];
       $desconto = $_POST["desconto"];
    //validação do campo descricao
  if (strlen(trim($descricao)) == 0) {
    //caso nao esteja preenchido, verifiar descricao válido
         $errors[] = "Você deve inserir uma descricao";

  
   

  
  //verificar se existem erros antes de adicionar no banco
   $dados = array();
   if (count($errors) > 0){     
      $dados["errors"] = $errors;
      
  } else {
     //chamar a função do modelo para salvar no banco de dados 
    $msg = adicionarCupom($descricao, $desconto);
    echo $msg;
    redirecionar("./cupom/listarCupons");
  }
  $dados["categorias"] = pegarTodasCategorias();
  exibir("produto/formulario", $dados);

}
else {
        //aqui não existem dados submetidos!
    $dados["categorias"] = pegarTodasCategorias();
    exibir("produto/formulario", $dados);
    }
}

function listarCupons() {
    $dados = array();
    $dados["cupons"] = pegarTodosCupons();
    exibir("cupom/listar", $dados);
}



function ver($id) {
    //passa o $id para o a função pegarUsuarioPorId do modelo
    $dados["cupom"] = pegarCupomPorId($id);
    //chama o arquivo: visao/cliente/visualizar.visao.php
    exibir("cupom/visualizar", $dados);
}

function deletar($id) {
    $msg = deletarCupom($id);
    redirecionar("cupom/listarCupons");
    
}

function editar($id) {
    //verifica se a página foi submetida
    if (ehPost()) {
        //pega os dados do formulário
       $descricao = $_POST["descricao"];
       $desconto = $_POST["desconto"];
       
        //chama o editarCupom do cupomModelo
        editarCupom($id, $descricao, $desconto);
        redirecionar("cupom/listarCupons");
    } else {
        //busca os dados do produto que será alterado
        $dados["cupom"] = pegarCupomPorId($id);
        $dados[""] = pegarTodasCategorias();
        exibir("produto/formulario", $dados);
    }
}
}


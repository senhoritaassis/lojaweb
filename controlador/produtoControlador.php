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
       
     //validação do campo nome
  if (strlen(trim($nome)) == 0) {
      //caso nao esteja preenchido, verifiar nome válido
         $errors[] = "Você deve inserir um nome.";
  } 
  
   //validação do campo tipo
  if (strlen(trim($tipo)) == 0) {
      //caso nao esteja preenchido, verifiar tipo válido
         $errors[] = "Você deve inserir um tipo";
  } 
  
   //validação do campo preco
  if (strlen(trim($preco)) == 0) {
      //caso nao esteja preenchido, verifiar preco válido
         $errors[] = "Você deve inserir um preco.";
  } else {
  if (filter_var(preco, FILTER_VALIDATE_INT) == false){
      //caso preco seja invalido, adicionar o array
      $errors[] = "Inserir um preco válido.";
    }
  }
  
  //validação do campo cor
  if (strlen(trim($cor)) == 0) {
      //caso nao esteja preenchido, verifiar cor válido
         $errors[] = "Você deve inserir um cor";
  } 
  
  //validação do campo fabricante
  if (strlen(trim($fabricante)) == 0) {
      //caso nao esteja preenchido, verifiar fabricante válido
         $errors[] = "Você deve inserir um fabricante";
  } 

   //validação do campo descricao
  if (strlen(trim($descricao)) == 0) {
      //caso nao esteja preenchido, verifiar descricao válido
         $errors[] = "Você deve inserir um descricao";
  } 
 
  //validação do campo quantidade
  if (strlen(trim($quantidade)) == 0) {
      //caso nao esteja preenchido, verifiar quantidade válido
         $errors[] = "Você deve inserir um quantidade";
  } else {
  if (filter_var(quantidade, FILTER_VALIDATE_INT) == false){
      //caso preco seja invalido, adicionar o array
      $errors[] = "Inserir um quantidade válido.";
    }
  }
  
  //verificar se existem erros antes de adicionar no banco
  if (count($errors) > 0){
      $dados = array();
      $dados["errors"] = $errors;
      exibir("produto/formulario", $dados);
  } else {
     //chamar a função do modelo para salvar no banco de dados 
    $msg = adicionarProduto($nome, $tipo, $preco, $cor, $fabricante, $descricao, $quantidade);
        echo $msg;
         redirecionar("./produto/listarProdutos");
  }
    
    
}
else {
        //aqui não existem dados submetidos!
         exibir("produto/formulario");
    }
}

function listarProdutos() {
    $dados = array();
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produto/listar", $dados);
}



function ver($id) {
    //passa o $id para o a função pegarUsuarioPorId do modelo
    $dados["produto"] = pegarProdutoPorId($id);
    //chama o arquivo: visao/cliente/visualizar.visao.php
    exibir("produto/visualizar", $dados);
}


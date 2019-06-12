<?php

require_once "modelo/clienteModelo.php";

function adicionar() {
    if(ehPost()) {
        //aqui os dados foram submetidos!
      
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $sexo = $_POST["sexo"];
        $telefone = $_POST["telefone"];
        //aqui vai as suas validações dos campos acima
        
        //validação do campo email
  if (strlen(trim($email)) == 0) {
      //caso nao esteja preenchido, verifiar email válido
         $errors[] = "Voc� deve inserir um e-mail.";
  } else {
  if (filter_var($email, FILTER_VALIDATE_EMAIL) == false){
      //caso email seja invalido, adicionar o array
      $errors[] = "Inserir um e-mail v�lido.";
    }
  }
  
  //validação do campo senha
  if (strlen(trim($senha)) == 0) {
      //caso nao esteja preenchido, verifiar a senha válida
         $errors[] = "Voc� deve inserir uma senha.";
  } 
  
        //validação do campo cpf
  if (strlen(trim($cpf)) == 0) {
      //caso nao esteja preenchido, verifiar cpf válido
         $errors[] = "Voc� deve inserir um cpf.";
  } else {
  if (filter_var($cpf, FILTER_VALIDATE_INT) == false){
      //caso cpf seja invalido, adicionar o array
      $errors[] = "Inserir um cpf v�lido.";
    }
  }
  
        //validação do campo nome
  if (strlen(trim($nome)) == 0) {
      //caso nao esteja preenchido, verifiar nome válido
         $errors[] = "Voc� deve inserir um nome.";
  } 
  
        //validação do campo nascimento
  if (strlen(trim($nascimento)) == 0) {
      //caso nao esteja preenchido, verifiar nascimento válido
         $errors[] = "Voc� deve inserir uma data de nascimento.";
  } 
  
        //validação do campo sexo
  if (strlen(trim($sexo)) == 0) {
      //caso nao esteja preenchido, verifiar sexo válido
         $errors[] = "Voc� deve inserir um sexo.";
  } 
  
  //validação do campo telefone
  if (strlen(trim($telefone)) == 0) {
      //caso nao esteja preenchido, verifiar telefone válido
         $errors[] = "Voc� deve inserir um telefone.";
  } else {
  if (filter_var($telefone, FILTER_VALIDATE_INT) == false){
      //caso cpf seja invalido, adicionar o array
      $errors[] = "Inserir um telefone v�lido.";
    }
  }
  
  //verificar se existem erros antes de adicionar no banco
  if (count($errors) > 0){
      $dados = array();
      $dados["errors"] = $errors;
      exibir("cliente/formulario", $dados);
  } else {
     //chamar a função do modelo para salvar no banco de dados
     $msg = adicionarCliente($email, $senha, $cpf, $nome, $nascimento, $sexo, $telefone);
        echo $msg;
        redirecionar("./cliente/listarClientes"); 
  }
    }else {
        //aqui não existem dados submetidos!
         exibir("cliente/formulario");
    }
   
}




function listarClientes() {
    $dados = array();
    $dados["clientes"] = pegarTodosClientes();
    exibir("cliente/listar", $dados);
}

function ver($id) {
    //passa o $id para o a função pegarUsuarioPorId do modelo
    $dados["cliente"] = pegarClientePorId($id);
    //chama o arquivo: visao/cliente/visualizar.visao.php
    exibir("cliente/visualizar", $dados);
}



function deletar($id) {
    $msg = deletarCliente($id);
    redirecionar("cliente/listarClientes");
    
}
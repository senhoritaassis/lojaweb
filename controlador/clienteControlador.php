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
        
        $msg = adicionarCliente($email, $senha, $cpf, $nome, $nascimento, $sexo, $telefone);
        echo $msg;
        redirecionar("./cliente/listarClientes");
    }else {
        //aqui não existem dados submetidos!
        
    }
    exibir("cliente/formulario");
}


require_once "modelo/clienteModelo.php";

function listarClientes() {
    $dados = array();
    $dados["clientes"] = pegarTodosClientes();
    exibir("cliente/listar", $dados);
}

require_once "modelo/clienteModelo.php";

function ver($id) {
    //passa o $id para o a função pegarUsuarioPorId do modelo
    $dados["cliente"] = pegarClientePorId($id);
    //chama o arquivo: visao/cliente/visualizar.visao.php
    exibir("cliente/visualizar", $dados);
}


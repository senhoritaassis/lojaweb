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
    }else {
        //aqui não existem dados submetidos!
        
    }
    exibir("cliente/formulario");
}
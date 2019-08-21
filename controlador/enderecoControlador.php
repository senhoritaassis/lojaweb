<?php

require_once "modelo/enderecoModelo.php";


function adicionar() {
    if (ehPost()) {
        $logradouro = $_POST["logradouro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $cep = $_POST["cep"];

//validação do campo logadouro
        if (strlen(trim($logradouro)) == 0) {
//caso nao esteja preenchido, verifiar logadouro válido
            $errors[] = "Você deve inserir um logradouro.";
        }

//validação do campo numero
        if (strlen(trim($numero)) == 0) {
//caso nao esteja preenchido, verifiar numero válido
            $errors[] = "Você deve inserir um numero.";
        }


//validação do campo bairro
        if (strlen(trim($bairro)) == 0) {
//caso nao esteja preenchido, verifiar bairro válido
            $errors[] = "Você deve inserir um bairro.";
        }

//validação do campo cidade
        if (strlen(trim($cidade)) == 0) {
//caso nao esteja preenchido, verifiar cidade válido
            $errors[] = "Você deve inserir uma cidade.";
        }

//validação do campo cep
        if (strlen(trim($cep)) == 0) {
//caso nao esteja preenchido, verifiar cep válido
            $errors[] = "Você deve inserir um cep.";
        }
    } else {
//aqui não existem dados submetidos!
        exibir("endereco/formulario");
    }

    function listarEndereco() {
        $dados = array();
        $dados["endereco"] = pegarTodosEndereco();
        exibir("endereco/listar", $dados);
    }

    function ver($id) {
//passa o $id para o a função pegarEnderecoPorId do modelo
        $dados["endereco"] = pegarEnderecoPorId($id);
//chama o arquivo: visao/endereco/visualizar.visao.php
        exibir("endereco/visualizar", $dados);
    }

    function deletar($id) {
        $msg = deletarEndereco($id);
        redirecionar("endereco/listarEnderecos");
    }

    function editar($id) {
        if (ehPost()) {
            $logradouro = $_POST["logradouro"];
            $numero = $_POST["numero"];
            $complemento = $_POST["complemento"];
            $bairro = $_POST["bairro"];
            $cidade = $_POST["cidade"];
            $cep = $_POST["cep"];         
            editarEndereco($id, $descricao, $desconto);
            redirecionar("endereco/listarEnderecos");
        } else {
//aqui não existem dados submetidos!
            exibir("endereco/formulario");
        }
    }

}


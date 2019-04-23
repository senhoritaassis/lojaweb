<?php

function cadastro (){
    if(ehPost())    {
       $nome = $_POST["email"];
       $produto = $_POST["senha"];
       $preco = $_POST["cpf"];
       $fabricante = $_POST["nome"];
       $descricao = $_POST["datnasci"];
       $descricao = $_POST["sexo"];
       $descricao = $_POST["tele"];
       
       
      
       
       print_r ($_POST);
       
    }else{
       exibir("cliente/formulario");
    }
}

function contato (){
    if(ehPost())    {
       $nome = $_POST["nome"];
       $produto = $_POST["email"];
       $preco = $_POST["assunto"];
       $descricao = $_POST["tele"];
       $descricao = $_POST["mensagem"];
       
       
      
       
       print_r ($_POST);
       
    }else{
       exibir("cliente/contato");
    }
}

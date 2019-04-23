<?php

function adicionar (){
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
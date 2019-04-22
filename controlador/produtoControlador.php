<?php

function visualizar (){
    $prod=array ();
    $prod ["name"]= "Coleção Harry Potter - 7 volumes";
    $prod ["desc"]= "Os sete livros da saga criada por J. K. Rowling − que acompanha a jornada do adorado aprendiz de bruxo contra o maléfico Voldemort";
    $prod ["prec"]= "230,90";
    
    exibir("produto/visualizar", $prod);
            
}
function adicionar (){
    if(ehPost())    {
       $nome = $_POST["nome"];
       $produto = $_POST["produto"];
       $preco = $_POST["preco"];
       $fabricante = $_POST["fabricante"];
       $descricao = $_POST["descricao"];
       
      
       
       print_r ($_POST);
       
    }else{
       exibir("produto/formulario");
    }
}
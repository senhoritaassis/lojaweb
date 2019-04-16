<?php

function visualizar (){
    $prod=array ();
    $prod ["name"]= "Coleção Harry Potter - 7 volumes";
    $prod ["desc"]= "Os sete livros da saga criada por J. K. Rowling − que acompanha a jornada do adorado aprendiz de bruxo contra o maléfico Voldemort";
    $prod ["prec"]= "230,90";
    
    exibir("produto/visualizar", $prod);
            
}
<?php

require_once "modelo/categoriaModelo.php";

function adicionar() {
    if (ehPost()) {
        //aqui os dados foram submetidos!

        $descricao = $_POST["descricao"];
        //aqui vai as suas validações dos campos acima

        $msg = adicionarCategoria($descricao);
        echo $msg;
    } else {
        //aqui não existem dados submetidos!
    }
    exibir("categoria/formulario");
}

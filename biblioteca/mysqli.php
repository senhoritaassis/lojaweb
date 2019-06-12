<?php

function conn() {
    $cnx = mysqli_connect("localhost", "id9919617_peteegato", "assislivia2002", "id9919617_lojaweb");
    if (!$cnx) die('Deu errado a conexao!');
    return $cnx;
}
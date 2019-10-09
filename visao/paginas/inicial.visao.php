
<h1>produtos da loja</h1>




<div  id = " colecoes " >
    <?php 
 
    foreach ( $produtos as $produto ) {
?>
        <div>
            <A href = " ./produto/verProdutoId/ <?=$produto [ "idproduto" ] ?> ">
                <img  src = " <?=$produto [ 'imagem' ] ?> "   alt = " não tem ">
                <h3> <?=$produto[ 'nomeproduto' ] ?> </ h3 > 
                <h3> <?php echo str_replace ( " . " , " , " , $produto [ 'precoproduto' ]) ?> </h3>  
            </a>
            <Br>
       </div>

    <?php } ?> 
</ div >
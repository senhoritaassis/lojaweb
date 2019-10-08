
<h1>produtos da loja</h1>

<form  action = " ./produto/pesquisaProduto "  method = " POST " >
    <input  type = " text "  class = " caixaEntraInfo "  espaço reservado = " Produto "  name = " pesquisa " >
    <button  class = " botao "  type = " submit " > Buscar </ button >
</form >
<Br> <br >


<div  id = " colecoes " >
    <?php 
  
    foreach ( $produtos as $produto ) {

        <div>
            <A href = " ./produto/verProdutoId/ <? = $produto [ " idproduto " ] ? > "  >
                <img  src = " <? = $produto [ ' imagem ' ] ? > "   alt = " não tem " >
                <h3> <? = $produto [ ' nomeproduto ' ] ? > </ h3 > 
                <h3 > <? php echo str_replace ( " . " , " , " , $produto [ ' precoProduto ' ]) ? > </ h3 >  
            </a>
            <Br>
       </div>

    <?php endforeach ; ? > 
</ div >
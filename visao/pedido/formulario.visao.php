<?php

if (ehPost()) {
    foreach ($errors as $erro) {
        echo "$erro<br>";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">      
    <label>Endereco:</label><select name="endereco">
        <option value=""></option> 
        <?php foreach ($enderecos as $endereco): ?>
            <option value="<?= $idendereco["endereco"] ?>"><?= @$pedido['endereco'] ?></option> 
        <?php endforeach; ?>
    </select>
    
   
    <label>Forma de Pagamento:</label><select name="FormaPagamento">
        <option value=""></option> 
        <?php foreach ($FormaPagamentos as $FormaPagamento): ?>
            <option value="<?= $FormaPagamento["FormaPagamento"] ?>"><?= @$pedido['FormaPagamento'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <label>Cupom:</label><select name="cupom">
       
    </select>
    
    <button type="submit">Pedir</button>     

</form>
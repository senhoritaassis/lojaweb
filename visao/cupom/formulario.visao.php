

<?php
    
    if(isset($errors) && !empty($erros)){
        foreach ($errors as $erro){
            echo "$erro<br>";
        }
    }

?>
<form action="" method="POST">

    
    <label>Descrição:</label><input type="text" name="descricao" value="<?=@$cupom['descricao']?>"><br><br>
    <label>Desconto:</label><input type="text" name="desconto" value="<?=@$cupom['desconto']?>"><br><br>
    
   
    <button type="submit">Cadastrar cupom</button><br>


</form>



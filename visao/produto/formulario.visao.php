<?php
    
    if(ehPost()){
        foreach ($errors as $erro){
            echo "$erro<br>";
        }
    }

?>

<form action="" method="POST">
    
    <label>Nome:</label><input type="text" name="nome"><br><br>
	<label>Tipo de Produto:</label><input type="text" name="tipo"><br><br>
        <label>Preço:</label><input type="text" name="preco"><br><br>
        <label>Cor:</label><input type="text" name="cor"><br><br>
	<label>Fabricante:</label><input type="text" name="fabricante"><br><br>
	<label>Descrição:</label><input type="text" name="descricao"><br><br>
        <label>Quantidade:</label><input type="text" name="quantidade"><br><br>

        <button type="submit">Cadastrar</button>     
		
</form>
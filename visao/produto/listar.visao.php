<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>

            nome, tipo, preco, cor, fabricante, descricao, quantidade <br>
            
        <th>ID</th>
        
        <th>NOME</th>
        
        <th>TIPO</th>
        
        <th>PREÇO</th>
        
        <th>COR</th>
        
        <th>FABRICANTE</th>
        
        <th>DESCRIÇÃO</th>
        
        <th>QUANTIDADE</th>
        </tr>        
    </thead>
    <?PHP foreach ($produtos as $produto): ?>
    
        <tr>

            <td><?= $produto['idProduto'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['tipo'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= $produto['cor'] ?></td>
            <td><?= $produto['fabricante'] ?></td>
            <td><?= $produto['descricao'] ?></td>
            <td><?= $produto['quantidade'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="./produto/adicionar" class="">Novo produto</a>




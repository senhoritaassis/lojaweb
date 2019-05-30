<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>

            nome, tipo, preco, cor, fabricante, descricao, quantidade
        <tr>ID</tr>
        <tr>NOME</tr>
        <tr>TIPO</tr>
        <tr>PREÇO</tr>
        <tr>COR</tr>
        <tr>FABRICANTE</tr>
        <tr>DESCRIÇÃO</tr>
        <tr>QUANTIDADE</tr>
        </tr>        
    </thead>
    <?PHP foreach ($produtos as $produto): ?>
    
        <tr>

            <td><?= $produto['id'] ?></td>
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

<a href="./produto/adcionar" class="">Novo produto</a>




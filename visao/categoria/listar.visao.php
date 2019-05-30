
<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>

        <tr>ID</tr>
        <tr>DESCRIÇÃO</tr>
        </tr>        
    </thead>
    <?PHP foreach ($categorias as $categoria): ?>
        <tr>
            
            <td><?= $categoria['id'] ?></td>
            <td><?= $categoria['descricao'] ?></td>
            
        </tr>
    <?php endforeach; ?>
</table>

<a href="./categoria/adcionar" class="">Nova categoria</a>





<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>

        <th>ID</th>
        <th>DESCRIÇÃO</th>
        </tr>        
    </thead>
    <?PHP foreach ($categorias as $categoria): ?>
        <tr>
            
            <td><?= $categoria['idCategoria'] ?></td>
            <td><?= $categoria['descricao'] ?></td>
            
        </tr>
    <?php endforeach; ?>
</table>

<a href="./categoria/adicionar" class="">Nova categoria</a>




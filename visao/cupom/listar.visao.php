
<h2>Listar Cupons</h2>

<table class="table">
    <thead>
        <tr>  
            
        <th>ID</th>
        
        <th>DESCONTO</th> 
        
        <th>DESCRIÇÃO</th>
        
        
        
        </tr>        
    </thead>
    <?php foreach ($cupons as $cupom): ?>
    
        <tr>

            <td><?= $cupom['idcupom'] ?></td>
            <td><?= $cupom['descricao'] ?></td>
            <td><?= $cupom['desconto'] ?></td>
            <td><a href="./cupom/ver/<?=$cupom['idcupom']?>">Ver</a></td>
            <td><a href="./cupom/editar/<?=$produto['idcupom']?>">Alterar</a></td>
            <td><a href="./cupom/deletar/<?=$produto['idcupom']?>">Deletar</a></td>
            
</tr>
    <?php endforeach; ?>
</table>


<a href="./cupom/adicionar" class="btn btn-primary">Novo cupom</a>




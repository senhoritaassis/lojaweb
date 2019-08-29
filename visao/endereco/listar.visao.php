
<h2>Listar Endereço</h2>

<table class="table">
    <thead>
        <tr>  
            
        <th>ID</th>
        
        <th>LOGADOURO</th> 
        
        <th>NUMERO</th>
        
        <th>COMPLEMENTO</th>
        
        <th>BAIRRO</th>
        
        <th>CIDADE</th>
        
        <th>CEP</th>
        
         
        
        </tr>        
    </thead>
    <?php foreach ($enderecos as $endereco): ?>
    
        <tr>

            <td><?= $endereco['idendereco'] ?></td>
            <td><?= $endereco['idusuario'] ?></td>
            <td><?= $endereco['logradouro'] ?></td>
            <td><?= $endereco['numero'] ?></td>
            <td><?= $endereco['complemento'] ?></td>
            <td><?= $endereco['bairro'] ?></td>
            <td><?= $endereco['cidade'] ?></td>
            <td><?= $endereco['cep'] ?></td>
            <td><a href="./endereco/ver/<?=$endereco['idendereco']?>">Ver</a></td>
            <td><a href="./endereco/editar/<?=$endereco['idendereco']?>">Alterar</a></td>
            <td><a href="./endereco/deletar/<?=$endereco['idendereco']?>">Deletar</a></td>
            
</tr>
    <?php endforeach; ?>
</table>



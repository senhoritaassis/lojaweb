
<h2>Listar Clientes</h2>

<table class="table">
    <thead>
        <tr>

        <tr>ID</tr>
        <tr>EMAIL</tr>
        <tr>SENHA</tr>
        <tr>NOME</tr>
        <tr>DATA DE NASCIMENTO</tr>
        <tr>SEXO</tr>
        <tr>TELEFONE</tr>
        </tr>        
    </thead>
    <?PHP foreach ($clientes as $clientes): ?>
        <tr>

            <td><?= $cliente['id'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['senha'] ?></td>
            <td><?= $cliente['nome'] ?></td>
            <td><?= $cliente['data_de_nascimento'] ?></td>
            <td><?= $cliente['sexo'] ?></td>
            <td><?= $cliente['telefone'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="./cliente/adcionar" class="">Novo cliente</a>


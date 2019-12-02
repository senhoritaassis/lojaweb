<center>
	<h2>Finalizando compra</h2>
	<br><br>
	<table border="1">
		<tr>
			<td>Produtos</td>
		</tr>
		<?php foreach ($produtos as $produto): ?>
			<tr>				
				<td><a href="./produto/visualizar/<?=$produto['idproduto']?>" class="btn btn-secondary"><?= $produto["nomeproduto"] ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<br>

	<h4>Subtotal da Compra: R$ <?=number_format($subtotal, 2, ',', '.')?></h4>
	<h4>Desconto: R$ <?=number_format($desconto, 2, ',', '.')?></h4>
	<h4>Valor Total da Compra: R$ <?=number_format($valor_total, 2, ',', '.')?></h4>

	<form action="compra/" method="POST">
		<label for="nome">Desconto do Cupom:</label> 
		<input type="text" name="descricao">
		<br><br><br>
		<button type="submit">Enviar</button>
	</form>
	<br>

	<h3>Escolha seu método de pagamento</h3>
	<form action="pedido/finalizar" method="POST">
		<?php foreach ($fpagamento as $pagamento):?>
			<?php if ($pagamento['descricao'] == 'Boleto') :?>
				<input id="<?=$pagamento['descricao']?>" type="radio" name="pagamento" value="<?=$pagamento['idFormaPagamento']?>" checked>
				<label for="<?=$pagamento['descricao']?>"><?=$pagamento['descricao']?></label><br><br>
			<?php else:?>
				<input id="<?=$pagamento['descricao']?>" type="radio" name="pagamento" value="<?=$pagamento['idFormaPagamento']?>">
				<label for="<?=$pagamento['descricao']?>"><?=$pagamento['descricao']?></label><br><br>
			<?php endif;?>
		<?php endforeach;?>

		<button type="submit">Finalizar Compra</button>
	</form>
	<br><br>
	<a href="compra/cancelarCompra">Cancelar Compra</a>
</center>
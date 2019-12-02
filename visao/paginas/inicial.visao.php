<?php foreach ($produtos as $produto):?>
	<div class="cor">
		<div id="produtos1" class="grid-x grid-padding-x">
			<div id="playpet" class="large-2 cell caixaProduto">
				<a href = " ./produto/ver/<?=$produto["idproduto"]?> ">
				   <img class="star" src = " <?=$produto [ 'imagem' ] ?> "   alt = " não tem ">
					<p><?=$produto[ 'nomeproduto' ] ?></p><br>
					<p class="p1"></p><?=$produto[ 'preco' ] ?>
				</a>
			</div>
		</div>
	</div>
<?php endforeach;?>
<html>
    <head>
        <title>template MVC</title>
        <meta charset="utf-8">
        <base href="<?= URL_BASE ?>"><!--Esta instrução é super importante e não deve ser mudada!-->

        <link rel="stylesheet" href="./publico/css/app.css">
    </head>
    <body class="container">
        <div id="cabecalho">
          <a href="index.html"><img id="logo1" src="principal/logo1.jpg"></a>
		
		
		
		<div id="search" class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<img id="pesq" src="principal/pesq.png">
				<input id="input1" type="text" placeholder="Search">
			</div>
		</div>
				



		<a href="login.html"><img id="user" src="principal/user.png"></a>
		<a href="carrinho2.html"><img id="car" src="principal/car.png"></a>
        </div>

     

        <main class="container">
            <?php require $viewFilePath; ?>
        </main>
        
        <div id="rodapetotal">
            <p>Rodape</p>
        </div>

    </body>
</html>

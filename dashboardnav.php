<!-- 
    

        AREA COM NIVEL 1


    -->
    <?php if($nivelsession == 1): ?>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
			   	<div class="navbar-header">
			   		<a class="navbar-brand">Lifestyle Store</a>
			   	</div>
			    <ul class="nav navbar-nav">
			      	<li><a href="index.php">Inicio</a></li>
			      	<li><a href="produtos.php">Produtos</a></li>
			      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin <span class="caret"></span></a>
			        	<ul class="dropdown-menu">
			          		<li><a href="contas.php">Contas</a></li>
			          		<li><a href="add.php">Adicionar</a></li>
			          		<li><a href="update.php">Atualizar</a></li>
			          		<li><a href="delete.php">Eliminar</a></li>
			        	</ul>
			      	</li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a></li>
		       		<li><a href="dashboard.php"><span class="glyphicon glyphicon-cog"></span> Definições</a></li>
			    </ul>
			</div>
		</nav>
<!-- 
    

        AREA COM NIVEL 0


    -->
	<?php else: ?>
		<nav class="navbar navbar-inverse">
		    <div class="container-fluid">
		        <div class="navbar-header">
		            <a class="navbar-brand">Lifestyle Store</a>
		        </div>
		        <ul class="nav navbar-nav">
	                <li><a href="index.php">Inicio</a></li>
			        <li><a href="produtos.php">Produtos</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a></li>
	        		<li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-cog"></span> Definições</a></li>
			    </ul>
			</div>
		</nav>
	<?php endif; ?> 
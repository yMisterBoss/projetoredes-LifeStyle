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
			<?php
				session_start();

				if(isset($_SESSION["loginregister"]) || is_array($_SESSION['user'])){
	        		include("basedados/config.php");
	    	?>

			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
			<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrinho</a></li>
			<li><a href="dashboard.php"><span class="glyphicon glyphicon-cog"></span> Definições</a></li>
				
			<?php
	    		}else{
	    	?>

	    	<li>
	    		<a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a>
	    	</li>
			<li>
			    <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
			</li>   
			<?php
	    		}
			?>
		</ul>
	</div>
</nav>	
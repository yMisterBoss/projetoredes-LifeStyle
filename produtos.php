<?php
	include 'basedados/config.php';
	
	session_start();

	error_reporting(0);

	$sql = "SELECT * FROM `produtos`";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['produto'] = array($row["id"], $row["nome"], $row["preco"], $row["categoria"], $row["srcimagem"]);
	}
	
	$sql = "SELECT * FROM `categoria`";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['categoria'] = array($row["id"], $row["categoria"]);
	}

?>

<!DOCTYPE html>
<html>
<head>
    	<link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Produtos</title>

        <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  		<style type="text/css">
  			body{
				padding-top:0px;
			    padding-bottom:50px;
			    margin-bottom: 20px;
			    text-align:center;
			    border: 0px solid black;
          		padding: 25px;
          		background: url('img/bannerimage.jpg') center center no-repeat fixed;
          		background-repeat: no-repeat;
          		background-size: 100% 100%;
			}
			.containerprincipal {
				padding-right:15px;
				padding-left:15px;
				margin-right:auto;
				margin-left:auto;
    			width: 75%;
				min-height: 400px;
				height:auto;
				background: #FFF;
				border-radius: 5px;
				box-shadow: 0 0 5px rgba(0,0,0,.3);
				padding: 40px 30px;
			}
  			.containerprincipal .titulo{
  				color: #111;
			    font-weight: 500;
			    font-size: 1.1rem;
			    text-align: center;
			    margin-bottom: 20px;
			    display: block;
			    text-transform: capitalize;
  			}
			.produto{
				position:relative;
				min-height:1px;
				min-width: 200px;
				padding-right:10px;
				padding-left:10px;
				float:left;
				
			}
			.btn {
			    display: block;
			    width: 100%;
			    padding: 15px 20px;
			    text-align: center;
			    border: none;
			    background: #a29bfe;
			    outline: none;
			    border-radius: 30px;
			    font-size: 1.5rem;
			    color: #FFF;
			    cursor: pointer;
			    transition: .3s;
			} 
  		</style>
    </head>
<body>
	<?php
    	require 'nav.php';
    ?>
	<?php
		require 'check_if_added.php';
		if(is_array($_SESSION["produto"])){
			include 'basedados/config.php';

			$sql = ("SELECT * FROM `produtos`");
			// executa a query
			$result = mysqli_query($conn, $sql);
			// transforma os dados em um array
			$linhaproduto = mysqli_fetch_array($result);
			// calcula quantos dados retornaram
			$totalproduto = mysqli_num_rows($result);   
		}
		
		if(is_array($_SESSION["categoria"])){
			include 'basedados/config.php';

			$sql = ("SELECT * FROM `categoria`");
			// executa a query
			$result = mysqli_query($conn, $sql);
			// transforma os dados em um array
			$linhacategoria = mysqli_fetch_array($result);
			// calcula quantos dados retornaram
			$totalcategoria = mysqli_num_rows($result);   
		}
	?>
	<?php
		$sql =("SELECT * FROM `categoria`");
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			
			foreach ($result as $linhacategoria) {
				$categoriaid =	$linhacategoria["id"];			
				$categorianome = $linhacategoria["categoria"];
	?>
				<div class = "containerprincipal">
					<p class="titulo" style="font-size: 3rem; font-weight: 800; margin-bottom: 25px;"><?php echo "$categorianome"?></p>
					<div class= "row">
						<?php
							$sql =("SELECT * FROM `produtos`");
							$result = mysqli_query($conn, $sql);
						
							if ($result->num_rows > 0) {
								$row = mysqli_fetch_assoc($result);

								foreach ($result as $linhaproduto) {
									$produtocategoria = $linhaproduto["categoria"];
									$produtopreco = $linhaproduto["preco"];				
									$produtonome = $linhaproduto["name"];
									$produtosrcimagem = $linhaproduto["srcimagem"];
									$produtoid = $linhaproduto["id"];

									$caminho = "addcarrinho.php?id=" . $produtoid;
									
									if($categoriaid == $produtocategoria){
						?>
										<div class="col-md-3 col-sm-6">
											<div class="thumbnail">
												<img src=<?php echo"$produtosrcimagem" ?> alt=<?php echo "$categorianome"?>>					
												<center>
													<div class="caption">
														<h3><?php echo"$produtonome" ?></h3>
														<p>Preço: <?php echo"$produtopreco"?>€</p>
														
														<?php
															if (isset($_SESSION['loginregister']) || isset($_SESSION["user"])) {
																if(check_if_added_to_cart($produtoid)){																	
														?>
																<a href="#" class="btn btn-block btn-success disabled">Adicionado no carrinho</a>
														<?php																
																}else{			
														?>

																	<a href="<?php echo $caminho?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Comprar</a>
														<?php
																}
														
															
																
															}
														?>
														
																	              
													</div>
												</center>
											</div>
										</div>				
						<?php
									}
									
								}
							}else{
						?>
								<p class="titulo" style="font-size: 2rem; font-weight: 800; margin-bottom: 25px; color:red">Sem Produtos</p>
						<?php
							}
						?>
					</div>
				</div>
						
				<br><br>
	<?php

			}
			
		}else{
	?>
			<p class="titulo" style="font-size: 3rem; font-weight: 800; margin-bottom: 25px;">Sem Categorias</p>
	<?php
		}
	?>
	<?php
    	require 'footer.php';
    ?> 
</body>
</html>
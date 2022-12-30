<?php
	include 'basedados/config.php';
	
	session_start();

	error_reporting(0);
	
    
    $userid=$_SESSION['user'][0];
    $sql=("SELECT * FROM `carrinho` WHERE carrinho.idcliente='$userid'");
    $result=mysqli_query($conn,$sql);
    
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['carrinho'] = array($row["id"], $row["idcliente"], $row["idproduto"], $row["Status"]);
	}
    $precototal=0;
    
?>

<!DOCTYPE html>
<html>
<head>
    	<link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Carrinho</title>

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
		if(is_array($_SESSION["carrinho"])){
			include 'basedados/config.php';

			$sql=("SELECT * FROM `carrinho` WHERE carrinho.idcliente='$userid'");
			
			// executa a query
			$result = mysqli_query($conn, $sql);
			// transforma os dados em um array
			$linhacarrinho = mysqli_fetch_array($result);
			// calcula quantos dados retornaram
			$totalcarrinho = mysqli_num_rows($result);   
		}

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
	?>

	<div class = "containerprincipal">
		<p class="titulo" style="font-size: 3rem; font-weight: 800; margin-bottom: 25px;">Carrinho</p>
		<div class = "row">
		<?php
			if($totalcarrinho==0){
		?>
				<p class="titulo" style="font-size: 2rem; font-weight: 800; margin-bottom: 25px; color:red">Sem Produtos</p>
		<?php
			}else{
		?>

				<div class="col-md-3 col-sm-6"> 
					<p class="titulo" style="font-size: 2rem; font-weight: 800; margin-bottom: 25px;">Imagem</p>
					<?php
						$sql =("SELECT * FROM `carrinho`");
						$result = mysqli_query($conn, $sql);
				
						if ($result->num_rows > 0) {
							$row = mysqli_fetch_assoc($result);

							foreach ($result as $linhacarrinho) {
								$sql = ("SELECT * FROM `produtos`");
								$result = mysqli_query($conn, $sql);

								if ($result->num_rows > 0) {
									$row = mysqli_fetch_assoc($result);

									foreach ($result as $linhaproduto) {
										$produtosrcimagem = $linhaproduto["srcimagem"];
										$produtoid = $linhaproduto["id"];

										if($produtoid == $linhacarrinho["idproduto"]){
											if($linhacarrinho["Status"] == "adicionado ao carrinho" ){
								?>
												<div class="thumbnail">
													<img src=<?php echo"$produtosrcimagem" ?> alt="carrinho">
												</div>
								<?php				
											}
										}
									}
								}
							}
						}
					?>
				</div>
				<div class="col-md-3 col-sm-6"> 
					<p class="titulo" style="font-size: 2rem; font-weight: 800; margin-bottom: 25px;">Nome</p>
					<?php
						
						$sql =("SELECT * FROM `carrinho`");
						$result = mysqli_query($conn, $sql);
				
						if ($result->num_rows > 0) {
							$row = mysqli_fetch_assoc($result);

							foreach ($result as $linhacarrinho) {
								$sql = ("SELECT * FROM `produtos`");
								$result = mysqli_query($conn, $sql);

								if ($result->num_rows > 0) {
									$row = mysqli_fetch_assoc($result);

									foreach ($result as $linhaproduto) {			
										$produtonome = $linhaproduto["name"];
										$produtoid = $linhaproduto["id"];

										if($produtoid == $linhacarrinho["idproduto"]){
											if($linhacarrinho["Status"] == "adicionado ao carrinho" ){
								?>
												<div class="caption">
												<br>
														<h3><?php echo"$produtonome" ?></h3>
														<br><br><br><br><br>
												</div>
								<?php				
											}
										}
									}
								}
							}
						}
					?>
						
				</div>
				<div class="col-md-3 col-sm-6"> 
					<p class="titulo" style="font-size: 2rem; font-weight: 800; margin-bottom: 25px;">Preço</p>
					<?php
						
						$sql =("SELECT * FROM `carrinho`");
						$result = mysqli_query($conn, $sql);
				
						if ($result->num_rows > 0) {
							$row = mysqli_fetch_assoc($result);

							foreach ($result as $linhacarrinho) {
								$sql = ("SELECT * FROM `produtos`");
								$result = mysqli_query($conn, $sql);

								if ($result->num_rows > 0) {
									$row = mysqli_fetch_assoc($result);

									foreach ($result as $linhaproduto) {
										$produtopreco = $linhaproduto["preco"];	
										$produtoid = $linhaproduto["id"];

										if($produtoid == $linhacarrinho["idproduto"]){
											if($linhacarrinho["Status"] == "adicionado ao carrinho" ){
												$precototal += $produtopreco;
								?>
												<div class="caption">
													<br>
													<h3><p><?php echo"$produtopreco"?>€</p></h3>
													<br><br><br><br><br>
												</div>
								<?php				
											}
										}
									}
								}
							}
						}
					?>
					
				</div>
				<div class="col-md-3 col-sm-6"> 
					<p class="titulo" style="font-size: 2rem; font-weight: 800; margin-bottom: 25px;">Preço total</p>
					<div class="caption">
						<br>
						<h3><p>Preço: <?php echo"$precototal"?>€</p></h3>
						<br><br><br><br><br>
					</div>
				</div>
		<?php
				
			}
			
		?>
		</div>
		<a href="<?php echo $caminho?>" class="btn btn-block btn-primary" name="add" value="add" >Confirmar Compra</a>
	</div>
	<br>

	<?php
    	require 'footer.php';
    ?>
</body>
</html>
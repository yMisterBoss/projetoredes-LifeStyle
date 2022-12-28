<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>

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
			    color:#f8f8f8;
			    border: 0px solid black;
          		padding: 25px;
          		background: url('img/bannerimage.jpg') center center no-repeat fixed;
          		background-repeat: no-repeat;
          		background-size: 100% 100%;
			}
			p{
				color: black;
			}
		</style>
	</head>
<body>
	<?php
    	require 'nav.php';
    ?>
	
	<div id="bannerImage">
        <div class="container">
            <center>
                <div id="bannerContent">
                    <h1>Vendemos lifestyle.</h1>
                    <p>Desconto fixo de 40% em todas as marcas premium..</p>
                    <a href="produtos.php" class="btn btn-danger">Compre agora</a>
                </div>
            </center>
        </div>
    </div>
    
    <br>

    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="thumbnail">
                    <a href="produtos.php">
                        <img src="img/camera.jpg" alt="Camera">
                    </a>
                    <center>
                    	<div class="caption">
                        	<p id="autoResize">Cameras</p>
                        	<p>Escolha entre os melhores disponíveis no mundo</p>
                    	</div>
                	</center>
            	</div>
        	</div>
            <div class="col-xs-4">
                <div class="thumbnail">
                    <a href="produtos.php">
                        <img src="img/watch.jpg" alt="Relógios">
                    </a>
                    <center>
                        <div class="caption">
                            <p id="autoResize">Relógios</p>
                            <p>Relógios originais das melhores marcas.</p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="thumbnail">
                    <a href="produtos.php">
                        <img src="img/shirt.jpg" alt="Camisas">
                    </a>
                    <center>
                        <div class="caption">
                            <p id="autoResize">Camisas</p>
                            <p>Nossa coleção requintada de camisas.</p>
                        </div>
                    </center>
                </div>
            </div>
    	</div>
    </div>
           
    <footer class="footer">
	    <div class="footer  modal-footer ">
	        <div class="panel-footer">
	           	<div class="container">
	               	<center>
	                   	<p>Contato: +351 123123123</p>
	                   	<p>Site Criado por NunoGaspar</p>
	               	</center>
	            </div>
	        </div>
	    </div> 
               
    </footer>																														
</body>
</html>
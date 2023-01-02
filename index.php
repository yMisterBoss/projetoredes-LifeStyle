<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>

        <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/estilos.css">
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

    <!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MB7HJ8K"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->


	<div class="aviso-cookies" id="aviso-cookies">
		<img class="galleta" src="./img/cookie.svg" alt="Galleta">
		<h3 class="titulo" style="color: black">Cookies</h3>
		<p class="parrafo">Usamos cookies próprios e de terceiros para melhorar nossos serviços.</p>
		<button class="boton" id="btn-aceptar-cookies">De acordo</button>
		<a class="enlace" href="avisocookies.php">Aviso de Cookies</a>
	</div>
	<div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>

	<script src="js/aviso-cookies.js"></script>



    <?php
    	require 'footer.php';
    ?>       																														
</body>
</html>
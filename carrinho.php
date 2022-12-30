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
	<div class = "containerprincipal">
		<p class="titulo" style="font-size: 3rem; font-weight: 800; margin-bottom: 25px;">Carrinho</p>
		<div class= "row">
		</div>
	</div>
	<?php
    	require 'footer.php';
    ?>
</body>
</html>
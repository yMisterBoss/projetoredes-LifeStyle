<?php
    session_start();

    if(isset($_SESSION["user"]) && is_array($_SESSION["user"])){
        include("basedados/config.php");

        
        $nivelsession = $_SESSION["user"][4];
        $passwordsession = $_SESSION["user"][3];
        $emailsession = $_SESSION["user"][2];
        $namesession = $_SESSION["user"][1];
        $idsession = $_SESSION["user"][0];

        $sql = ("SELECT * FROM `loginregister`");
        // executa a query
        $result = mysqli_query($conn, $sql);
        // transforma os dados em um array

        $linha = mysqli_fetch_array($result);
        // calcula quantos dados retornaram
        $total = mysqli_num_rows($result);   
    
    }else{
        echo "<script>window.location = 'index.php'</script>";
    }
?>
<html>
    <head>
    	<link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Dashboard - <?php echo $namesession; ?></title>

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
          		background: url('img/dashboard.jpg') center center no-repeat fixed;
          		background-repeat: no-repeat;
          		background-size: 100% 100%;
			}
			.container {
			    width: 400px;
			    min-height: 400px;
			    background: #FFF;
			    border-radius: 10px;
			    box-shadow: 0 0 5px rgba(0,0,0,.3);
			    padding: 40px 30px;
			}
  			.container .login-text{
  				color: #111;
			    font-weight: 500;
			    font-size: 1.1rem;
			    text-align: center;
			    margin-bottom: 20px;
			    display: block;
			    text-transform: capitalize;
  			}
  			.container .login-email .input-group {
			    width: 100%;
			    height: 50px;
			    margin-bottom: 25px;
			}

			.container .login-email .input-group input {
			    width: 100%;
			    height: 100%;
			    border: 2px solid #e7e7e7;
			    padding: 15px 20px;
			    font-size: 1.5rem;
			    border-radius: 30px;
			    background: transparent;
			    outline: none;
			    transition: .3s;
			}

			
  			.container .input-group .btn {
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
    	require 'dashboardnav.php';
    ?>
		<center>
			<div class="container">
				<p class="login-text" style="font-size: 3rem; font-weight: 800; margin-bottom: 25px;">Perfil Pessoal</p>
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Alterar Senha</p>
				<form action="" method="POST" class="login-email">    
					<div class="input-group">
						<input type="email" placeholder="Email" name="email" value="<?php echo $emailsession; ?>"  readonly="true">
					</div>
					<div class="input-group">
						<input type="password" placeholder="Palavra-Passe Antiga" name="oldpassword" value="" required>
				    </div>
					<div class="input-group">
						<input type="password" placeholder="Nova Palavra-Passe" name="password" value="" required>
				    </div>
				    <div class="input-group">
				    	<input type="password" placeholder="Confirmar Palavra-Passe" name="cpassword" value="" required>
					</div>
					<br>
					<div class="input-group" >
						<button name="submit" class="btn">Atualizar Dados</button>
					</div>
				</form>				
			</div>
		</center>
		<br>
    </body>
    <?php
    	include 'basedados/config.php';

    	if (isset($_POST['submit'])) {

    		$email = $_POST['email'];
    		$oldpassword = $_POST['oldpassword'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            $sql = "SELECT * FROM `loginregister` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
            	$sql = "SELECT * FROM `loginregister` WHERE password = '$oldpassword'";
            	$result = mysqli_query($conn, $sql);
            	if ($result->num_rows > 0) {
            		
            		if ($password == $cpassword) {
            			$sql = "UPDATE `loginregister` SET password = '$password' WHERE email = '$email'";
            			$result = mysqli_query($conn, $sql);
            			if (!$result->num_rows > 0) {
               	 			echo "<script>alert('Dados atualizados com Sucesso')</script>"; 
                			echo "<script>window.location = 'refresh.php'</script>";
            			}
            		}else{
            			echo "<script>alert('Woops! As palavras-passe não coincidem.')</script>";
                		echo "<script>window.location = 'refresh.php'</script>";
            		}
            	}else{
            		echo "<script>alert('Woops! Palavra-Passe Antiga incorreta.')</script>";
                	echo "<script>window.location = 'refresh.php'</script>";
            	}
            }
        }

    ?>
	<?php
    	require 'footer.php';
    ?> 
</html>
<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>

		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	</head>
<body>
	<?php

		include 'basedados/config.php';
	
		session_start();

		error_reporting(0);

		if (isset($_SESSION['loginregister'])) {
    		header("Location: login.php");
		}

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script>alert('Woops! Formato do email inválido.')</script>";

			}else{
				if (preg_match('/\s/', $password)) {
                    echo "<script>alert('Woops! Algo está errado.')</script>";

                }else{
				if ($password == $cpassword) {
					$sql = "SELECT * FROM `loginregister` WHERE email='$email'";
					$result = mysqli_query($conn, $sql);
					
					if (!$result->num_rows > 0) {
						$sql = "INSERT INTO `loginregister` (name, email, password) VALUES ('$name', '$email', '$password')";
						$result = mysqli_query($conn, $sql);
						
						if ($result) {
							$name = "";
							$email = "";
							$_POST['password'] = "";
							$_POST['cpassword'] = "";
		

							echo "<script>alert('Wow! Registro Completo.')</script>";
							echo "<script>window.location = 'login.php'</script>";
							
						} else {
							echo "<script>alert('Woops! Algo está errado.')</script>";

						}
					} else {
						echo "<script>alert('Woops! Esse Email já existe.')</script>";
						$name = "";
						$email = "";
						$_POST['password'] = "";
						$_POST['cpassword'] = "";

					}
			
				} else {
					echo "<script>alert('Password inválida.')</script>";
				}
			}
		}
	}
	?>
	<center>
		<div class="container">
			<form action="" method="POST" class="login-email">
		        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
				<div class="input-group">
					<input type="text" placeholder="Nome" name="name" value="<?php echo $name; ?>" required>
				</div>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Palavra-Passe" name="password" value="<?php echo $_POST['password']; ?>" required>
		        </div>
		        <div class="input-group">
					<input type="password" placeholder="Confirmar Palavra-Passe" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				</div>
				<div class="input-group">
					<button name="submit" class="btn">Register</button>
				</div>
				<p class="login-register-text">Já tem conta? <a href="login.php">Clique para logar</a>.</p>
			</form>
		</div>
	</center>
</body>
</html>
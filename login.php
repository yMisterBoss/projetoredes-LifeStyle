<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>
        <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  		
	</head>
<body>
	<?php

		include 'basedados/config.php';
	
		session_start();

		error_reporting(0);


		if (isset($_SESSION['loginregister']) || isset($_SESSION["user"])) {
    		header("Location: dashboard.php");
		}



		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];


			$sql = "SELECT * FROM loginregister WHERE email='$email' AND password='$password'";
			$result = mysqli_query($conn, $sql);
			
			if ($result->num_rows > 0) {

				$row = mysqli_fetch_assoc($result);
				$_SESSION['user'] = array($row["ID"], $row["name"], $row["email"], $row["password"], $row["nivel"]);
				header("Location: dashboard.php");
				
			} else {
				echo "<script>alert('Woops! Seu Email ou Password está errada.')</script>";
			}
		}

	?>
	<center>
		<div class="container">
			<form action="" method="POST" class="login-email">
				<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
				</div>
				<div class="input-group">
					<input type="password" placeholder="Palava-Passe" name="password" value="<?php echo $_POST['password']; ?>" >
				</div>
				<div class="input-group">
					<button name="submit" class="btn">Login</button>
				</div>
				<p class="login-register-text">Não tem conta? <a href="register.php">Registra Aqui</a>.</p>
			</form>
		</div>
	</center>
</body>
</html>
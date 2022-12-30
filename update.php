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
        echo "<script>window.location = 'login.php'</script>";
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

            .container .login-email .input-group input:focus, .container .login-email .input-group input:valid {
                border-color: #a29bfe;
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
    <!--

        ATUALIZAR
                    
    -->
        <center>
            <div class="container">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Atualizar Dados</p>
                <form action="" method="POST" class="login-email">
                    <div class="input-group">
                        <input type="numer" placeholder="ID" name="id" value="" required>
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Nome" name="name" value="" required>
                    </div>
                    <div class="input-group">
                        <input type="email" placeholder="Email" name="email" value="" required>
                    </div>   
                    <div class="input-group">
                        <input type="password" placeholder="Palavra-Passe" name="password" value="" required>
                    </div>
                    <div class="input-group">
                        <input type="number" placeholder="Nivel" name="nivel" value="" required>
                    </div>
                    <div class="input-group">
                        <button name="atualizaradmin" class="btn">Atualizar</button>
                    </div>
                </form>
            </div>
        </center>
    </body>
    <?php
        include 'basedados/config.php';

        if (isset($_POST['atualizaradmin'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $nivel = $_POST['nivel'];
            
            if ($id == $idsession) {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Woops! Formato do email inválido.')</script>";

                }else{
                    if (preg_match('/\s/', $password)) {
                        echo "<script>alert('Woops! Algo está errado.')</script>";

                    }else{
                        if ($nivel <= 0) {
                            echo "<script>alert('Woops! Nivel inválido')</script>"; 
                            echo "<script>window.location = 'refresh.php'</script>";

                        }else{
                            $sql = "SELECT * FROM `loginregister` WHERE email='$email'";
                            $result = mysqli_query($conn, $sql);

                            if (!$result->num_rows > 0) {
                                $sql = "SELECT * FROM `loginregister` WHERE ID = '$id'";
                                $result = mysqli_query($conn, $sql);

                                if ($result->num_rows > 0) {
                                    $sql = "UPDATE `loginregister` SET name = '$name', email = '$email', password = '$password' WHERE ID = '$id'";
                                    $result = mysqli_query($conn, $sql);
                        
                                    if ($result) {
                                        echo "<script>alert('Registo Atualizado com Sucesso, mas não pode alterar seu nivel.')</script>"; 
                                        echo "<script>window.location = 'refresh.php'</script>";

                                    } else {
                                        echo "<script>alert('Woops! Algo está errado.')</script>";
                                        echo "<script>window.location = 'refresh.php'</script>";
                                    }
                                }
                            }else{
                                $sql = "SELECT * FROM `loginregister` WHERE ID = '$id' AND email='$email'";
                                $result = mysqli_query($conn, $sql);
                                //verificar se o email existente pretence ao mesmo utilizador

                                if ($result->num_rows > 0) {
                                    $sql = "UPDATE `loginregister` SET name = '$name', password = '$password', nivel = '$nivel' WHERE ID = '$id'";
                                    $result = mysqli_query($conn, $sql);
                        
                                    if ($result) {
                                        echo "<script>alert('Registo Atualizado com Sucesso')</script>"; 
                                        echo "<script>window.location = 'refresh.php'</script>";

                                    } else {
                                        echo "<script>alert('Woops! Algo está errado.')</script>";
                                        echo "<script>window.location = 'refresh.php'</script>";
                                    }
                                }else{
                                    echo "<script>alert('Woops! Esse Email já existe em outros utilizadores.')</script>";
                                    echo "<script>window.location = 'refresh.php'</script>";
                                }
                            }
                        }
                    }
                }
            }else{
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Woops! Formato do email inválido.')</script>";

                }else{
                    if (preg_match('/\s/', $password)) {
                        echo "<script>alert('Woops! Algo está errado.')</script>";

                    }else{
                        $sql = "SELECT * FROM `loginregister` WHERE email='$email'";
                        $result = mysqli_query($conn, $sql);

                        if (!$result->num_rows > 0) {
                            $sql = "SELECT * FROM `loginregister` WHERE ID = '$id'";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                                $sql = "UPDATE `loginregister` SET name = '$name', email = '$email', password = '$password', nivel = '$nivel' WHERE ID = '$id'";
                                $result = mysqli_query($conn, $sql);
                    
                                if ($result) {
                                    echo "<script>alert('Registo Atualizado com Sucesso')</script>"; 
                                    echo "<script>window.location = 'refresh.php'</script>";

                                } else {
                                    echo "<script>alert('Woops! Algo está errado.')</script>";
                                    echo "<script>window.location = 'refresh.php'</script>";
                                }
                            }
                        }else{
                            $sql = "SELECT * FROM `loginregister` WHERE ID = '$id' AND email='$email'";
                            $result = mysqli_query($conn, $sql);
                            //verificar se o email existente pretence ao mesmo utilizador

                            if ($result->num_rows > 0) {
                                $sql = "UPDATE `loginregister` SET name = '$name', password = '$password', nivel = '$nivel' WHERE ID = '$id'";
                                $result = mysqli_query($conn, $sql);
                    
                                if ($result) {
                                    echo "<script>alert('Registo Atualizado com Sucesso')</script>"; 
                                    echo "<script>window.location = 'refresh.php'</script>";

                                } else {
                                    echo "<script>alert('Woops! Algo está errado.')</script>";
                                    echo "<script>window.location = 'refresh.php'</script>";
                                }
                            }else{
                                echo "<script>alert('Woops! Esse Email já existe em outros utilizadores.')</script>";
                                echo "<script>window.location = 'refresh.php'</script>";
                            }
                        }
                    }
                }
            }

        }
    ?>
    <br>
    <?php
    	require 'footer.php';
    ?>
</html>
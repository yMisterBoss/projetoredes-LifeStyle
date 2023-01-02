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
 
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
	   <title>Contas</title>

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
                width: 600px;
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
        <?php if($nivelsession ==1): ?>
            <center>
                <div class="container">
                    <table width="40%" class="login-email">
                        <tbody>
                            <?php

                                $query = "SELECT * FROM categoria ";

                                if(isset($_POST['submit'])){
                                    $search_term = mysqli_real_escape_string($conn, $_POST['search']);
                                    $query .= "WHERE categoria LIKE '%{$search_term}%'";
                                }
                                
                                if (isset($_POST["back"])){
                                    $query = "SELECT * FROM categoria ";
                                }
                                 
                                $result = mysqli_query($conn, $query);

                                if(mysqli_num_rows($result) > 0){

                            ?>
                                    <tr style="font-weight: bold">
                                        <td>ID</td>
                                        <td>Categoria</td>
                                    </tr>

                                    <?php
                                        foreach ($result as $linha) {
                                    ?>

                                    <tr>
                                        <td><?=$linha["id"]; ?></td>
                                        <td><?=$linha["categoria"]; ?></td>
                                    </tr>

                            <?php
                                        }
                                }else{
                            ?>
                                    <tr>
                                        <td colspan="6">Sem Categorias registradas</td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </center>
        <?php endif; ?>
    <br>
    <?php
    	require 'footer.php';
    ?>
</body>
</html>
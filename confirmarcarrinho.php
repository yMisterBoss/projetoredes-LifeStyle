<?php

    include 'basedados/config.php';
    
    session_start();
    
    if (isset($_SESSION['loginregister']) || isset($_SESSION["user"])) {
        $userid=$_GET['id'];
        $sql="UPDATE `carrinho` SET Status = 'Confirmado' WHERE idcliente = $userid";
        $result=mysqli_query($conn,$sql);
        if ($result) {
            echo "<script>alert('Compra confirmado')</script>"; 
            echo "<script>window.location = 'dashboard.php'</script>";
        }
    }
?>
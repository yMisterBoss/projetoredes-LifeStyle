<?php
    include 'basedados/config.php';
    session_start();
    $idproduto=$_GET['id'];
    $clienteid=$_SESSION['user'][0];
    $sql="DELETE FROM `carrinho` WHERE idcliente ='$clienteid' and idproduto='$idproduto'";
    $result=mysqli_query($conn,$sql);
    header('location: carrinho.php');
?>
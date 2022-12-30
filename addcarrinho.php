<?php
    include 'basedados/config.php';
    session_start();
    $produtoid=$_GET['id'];
    $userid=$_SESSION['user'][0];

    $sql="INSERT INTO `carrinho`(idcliente,idproduto,Status) VALUES ('$userid','$produtoid','adicionado ao carrinho')";
    $result = mysqli_query($conn, $sql);       
    if ($result) {
        echo "<script>alert('Compra Adicionada com Sucesso')</script>"; 
        echo "<script>window.location = 'produtos.php'</script>";
    }
    
?>
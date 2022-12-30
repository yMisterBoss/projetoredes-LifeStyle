<?php
    
    function check_if_added_to_cart($produtoid){
        //session_start();    
        include 'basedados/config.php';
        $userid=$_SESSION['user'][0];
        $sql="SELECT * FROM `carrinho` WHERE idcliente='$userid' AND idproduto='$produtoid' AND Status= 'adicionado ao carrinho'";
        $result = mysqli_query($conn, $sql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>
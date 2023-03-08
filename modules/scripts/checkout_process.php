<?php 
    session_start();
    require_once 'connection.php';

    if (isset($_POST['postSelection']) && isset($_POST['postSelection'])) {
        
        $paymentype = $_POST['paymentType'];
        $addres = $_POST['adress'];
        $id = $_SESSION['id'];
        setcookie("payment", $paymenttype, time() + 300, "/");
        setcookie("addres", $addres, time() + 300, "/");
        header("location:../../../../index.php?page=checkout&orderSubmition=submitOrder&id=");
    }
    


?>
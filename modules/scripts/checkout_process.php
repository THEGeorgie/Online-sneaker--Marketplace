<?php 
    session_start();
    require_once 'connection.php';

    if (isset($_POST['postSelection']) && isset($_POST['postSelection'])) {
        
        $paymentype = $_POST['paymentType'];
        $addres = $_POST['adress'];
        $idUser = $_SESSION['id'];
        $id = $_POST['postSelection'];
        $cookie_paymentype_value = $paymentype;
        $cookie_addres_value = $addres;
        $cookie_idUser_value = $idUser;
        $cookie_id_value = $id;
        setcookie("Payment", $cookie_paymentype_value, time() + (600), "/");
        setcookie("address", $cookie_addres_value, time() + (600), "/");
        setcookie("idUser", $cookie_idUser_value, time() + (600), "/");
        setcookie("id", $cookie_id_value, time() + (600), "/");

        header("location:../../../../index.php?page=checkout&orderSubmition=pendingOrder&id=".$id."&userId=".$idUser."&address=".$addres."&payment=".$paymentype);
    }
    if (isset($_POST['confirmOrder'])) {
       if (isset($_COOKIE['Payment']) && isset($_COOKIE['address']) && isset($_COOKIE['idUser']) && isset($_COOKIE['id'])) {
        
       }else{
            echo("Cookie seesion expired");
       }
    }


?>
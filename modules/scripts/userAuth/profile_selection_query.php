<?php

    session_start();

    require_once 'connection.php';

    if (isset($_POST['sellerLog']) && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {
        $_SESSION['name']= $_COOKIE["user"];
        $_SESSION['loggedin'] = true;
        $_SESSION['seller'] = 2;
        $pdo = new PDO('sqlite:../db/sneaker_haven.sqlite3');
        $stmtt = $pdo->query("SELECT * FROM `Prodajalec` WHERE `uporabnisko_ime` = '{$_COOKIE["user"]}' AND `password` = '{$_COOKIE["pass"]}'");
        $user = $stmtt->fetchAll(PDO::FETCH_ASSOC);
        foreach($user as $roww => $user){
            $_SESSION['id'] = $user['prod_id'];
        }
        header('location:../../../../index.php?page=home');
    }elseif (isset($_POST['buyerLog'])  && isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {
        $_SESSION['name']= $_COOKIE["user"];
        $_SESSION['loggedin'] = true;
        $_SESSION['seller'] = 1;
        $pdo = new PDO('sqlite:../db/sneaker_haven.sqlite3');
        $stmtt = $pdo->query("SELECT * FROM `Stranke` WHERE `uporabnisko_Ime` = '{$_COOKIE["user"]}' AND `password` = '{$_COOKIE["pass"]}'");
        $user = $stmtt->fetchAll(PDO::FETCH_ASSOC);
        foreach($user as $roww => $user){
            $_SESSION['id'] = $user['strank_id'];
        }
        header('location:../../../../index.php?page=home');
    }else{
        $_SESSION['error'] = "Cookies not set!!!";
        header('location:../../../../?page=login/index.php');
    }
    
?>
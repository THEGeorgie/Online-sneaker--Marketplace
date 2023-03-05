<?php
    session_start();
    require_once 'connection.php';

    if(isset($_POST['switch']) && $_SESSION['seller'] == 2){
        $query = "SELECT * From 'povezava_racunov' WHERE prod_id = {$_SESSION['id']}";
        $stmt_switch = $conn->query($query);
        $switch = $stmt_switch->fetchAll(PDO::FETCH_ASSOC);
        foreach ($switch as $row => $switch) {
            $id = $switch['strank_id'];
        }
        $_SESSION['seller'] = 1;
        $_SESSION['id'] = $id;
        header('location:../../index.php?page=home');
    }
    if (isset($_POST['switch']) && $_SESSION['seller'] == 1) {
        $query = "SELECT * From 'povezava_racunov' WHERE strank_id = {$_SESSION['id']}";
        $stmt_switch = $conn->query($query);
        $switch = $stmt_switch->fetchAll(PDO::FETCH_ASSOC);
        foreach ($switch as $row => $switch) {
            $id = $switch['prod_id'];
        }
        $_SESSION['seller'] = 2;
        $_SESSION['id'] = $id;
        header('location:../../index.php?page=home');
    }
?>
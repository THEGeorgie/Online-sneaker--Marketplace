<?php
    require_once('connection.php');

    $sqlProfile = "SELECT * From 'Teniske' WHERE prod_id ='{$_SESSION['id']}'";
    $stmt_postProfilePage = $conn->query($sqlProfile);
    $postMySnkr = $stmt_postProfilePage->fetchAll(PDO::FETCH_ASSOC);

    
?>
<?php

    if ($_GET['submitOrder'] == "asc") {
        $sql = "SELECT * From 'Teniske' ORDER BY barva ASC";
        $stmt_postHomePage = $conn->query($sql);
        $postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
    }elseif ($_GET['submitOrder'] == "desc") {
        $sql = "SELECT * From 'Teniske' ORDER BY barva DESC";
        $stmt_postHomePage = $conn->query($sql);
        $postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
    }
?>

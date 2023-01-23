<?php
    session_start();

    require_once 'connection.php';

    $name = $_SESSION['name'];

    $query = "SELECT is_seler AND COUNT(*) as count FROM `member` WHERE `username` = :name";
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $row = $stmt->fetch();
    $count = $row['count'];
?>

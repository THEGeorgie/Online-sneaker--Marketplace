<?php
    session_start();

    require_once 'connection.php';
    $name = $_SESSION['name'];

    $query = "SELECT is_seler AND COUNT(*) as count FROM `member` WHERE `username` = :name";
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $row = $stmt->fetch();
    $count = $row['count'];
    if ($count > 0) {
        echo ("<button class=btn btn-outline-light btn-block my-3 btn-create-post name=create_post onclick='loadHtml(post-conatiner, create_post.html)'>Create post</button>");
    }
?>

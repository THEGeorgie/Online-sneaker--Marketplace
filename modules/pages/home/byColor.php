<?php
$sql = "SELECT * From 'Teniske' ORDER BY barva";
$stmt_postHomePage = $conn->query($sql);
$postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
?>

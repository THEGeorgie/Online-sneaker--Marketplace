<?php
$sql = "SELECT * From 'Teniske' ORDER BY datum_izdaje";
$stmt_postHomePage = $conn->query($sql);
$postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
?>
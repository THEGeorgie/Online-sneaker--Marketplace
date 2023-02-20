<?php

	require_once('connection.php');

	$sql = "SELECT slika From 'Teniske'";
	$stmt_postHomePage = $conn->query($sql);
	$postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);

    foreach($postSnkr as $rows => $postSnkr) {
        echo "<style>
        .section-products #product-1 .part-1::before {
            background-image: url('../uploads/$postSnkr['slika']');
            background-size: cover;
            transition: all 0.3s;
        }
        </style>";
    }
?>
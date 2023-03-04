<?php
    require_once('connection.php');
    session_start();
    if (isset($_POST['submitListing'])) {
        $sku = $_POST['sku'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $sql = "SELECT * From 'Teniske' WHERE sku = '$sku'";
	    $stmt_snkrId = $conn->query($sql);
	    $SnkrInfo = $stmt_snkrId->fetchAll(PDO::FETCH_ASSOC);
        foreach ($SnkrInfo as $row => $SnkrInfo) {
            $teniskeId = $SnkrInfo['teniske_id'];
        }
        $query = "INSERT INTO 'Prod_teniske' (teniske_id, cena, stevilka) VALUES(:teniske_id, :cena, :stevilka)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':teniske_id', $teniskeId);
        $stmt->bindParam(':cena', $price);
        $stmt->bindParam(':stevilka', $size);
        if($stmt->execute()){
            //setting a 'success' session to save our insertion success message.
            $_SESSION['success'] = "Successfully created a listing";
            //redirecting to the index.php 
            header('location:../../?page=home/index.php');
        }
        else{
            header('location:../../?page=home/index.php');
        }
    }
?>

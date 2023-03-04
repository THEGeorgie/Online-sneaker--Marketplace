<?php
    require_once('connection.php');
    session_start();
    if (isset($_POST['submitListing'])) {
        $date = date("Y-m-d h:i:sa");
        $sku = $_POST['sku'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $id = $_SESSION['id'];
        $sql = "SELECT * From 'Teniske' WHERE sku = '$sku'";
	    $stmt_snkrId = $conn->query($sql);
	    $SnkrInfo = $stmt_snkrId->fetchAll(PDO::FETCH_ASSOC);
        foreach ($SnkrInfo as $row => $SnkrInfo) {
            $teniskeId = $SnkrInfo['teniske_id'];
        }
        $query = "INSERT INTO 'Prod_teniske' (teniske_id, cena, stevilka, casDatum, prod_id) VALUES(:teniske_id, :cena, :stevilka, :casDatum, :prod_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':teniske_id', $teniskeId);
        $stmt->bindParam(':cena', $price);
        $stmt->bindParam(':stevilka', $size);
        $stmt->bindParam(':casDatum', $date);
        $stmt->bindParam(':prod_id', $id);
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

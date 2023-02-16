<?php
    session_start();

    require_once 'connection.php';
    if (isset($_POST['submit'])) {

        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $colorCode = $_POST["colorCode"];
        $size = $_POST["size"];
        $price = $_POST["price"];
        $date = $_POST["date"];
        $Id = $_SESSION['id'];
        $img = addslashes(file_get_contents($_FILES['Image'] ['tmp_name']));

        $query + "INSERT INTO 'Snkr' (img) VALUES('$img')";

        // $query = "INSERT INTO `Tensike` (znamka, model, barva, velikost, cena, datum_izdaje, slika, prod_id) VALUES(:znamka, :model, :barva, :velikost, :cena, :datum_izdaje, :slika, :prod_id)";
		// $stmt = $conn->prepare($query);
		// $stmt->bindParam(':znamka', $brand);
		// $stmt->bindParam(':model', $model);
		// $stmt->bindParam(':barva', $colorCode);
		// $stmt->bindParam(':velikost', $size);;
		// $stmt->bindParam(':cena', $price);
        // $stmt->bindParam(':datum_izdaje', $date);
		// $stmt->bindParam(':slika', $img);
        // $stmt->bindParam(':prod_id', $Id);

        if($query->execute()){
            //setting a 'success' session to save our insertion success message.
            $_SESSION['success'] = "Successfully created a post";
            //redirecting to the index.php 
        }
        else{
            $_SESSION['error'] = "Something is missing........";
        }
    }
?>


<?php
session_start();

require_once 'connection.php';

if (isset($_POST['uplaodPost'])) {

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $colorCode = $_POST['colorCode'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $dateR = $_POST['dateR'];
    $Sid = $_SESSION['id'];
    $dateC = date("Y-m-d H:i:s");

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileError < 25000) {
                $fileNewName = uniqid('', true).".".$fileActualExt;
                $target = 'uploads/'.$fileNewName;

                move_uploaded_file($fileTmpName, $target);

                $querry = "INSERT INTO 'Teniske' (znamka, model, barva, velikost, cena, datum_izdaje, prod_id, slika, datum_ustvaritev) VALUES (:znamka, :model, :barva, :velikost, :cena, :datum_izdaje, :prod_id, :slika, :datum_ustvaritev)";
                $stmt_post = $conn->prepare($querry);
                $stmt_post->bindParam(':znamka', $brand);
                $stmt_post->bindParam(':model', $model);
                $stmt_post->bindParam(':barva', $colorCode);
                $stmt_post->bindParam(':velikost', $size);
                $stmt_post->bindParam(':cena', $price);
                $stmt_post->bindParam(':datum_izdaje', $dateR);
                $stmt_post->bindParam(':prod_id', $Sid);
                $stmt_post->bindParam(':slika', $fileNewName);
                $stmt_post->bindParam(':datum_ustvaritev', $dateC);
                if ($stmt_post->execute()) {
                    $_SESSION['success'] = "Successfully created a post";
                    header('location: home.php');
                }else{
                    $_SESSION['error'] = "Something went wrong......";
                    header('location: create_post.php');
                }
            } else {
                $_SESSION['error'] = "File is to big";
                header('location: create_post.php');
            }
        } else {
            $_SESSION['error'] = "Fatel error has aquored";
            header('location: create_post.php');
        }
    } else {
        $_SESSION['error'] = "File type unsuported";
        header('location: create_post.php');
    }

}

if (isset($_POST['deletePost'])) {

    

    $sqlProfileSelect = "SELECT * From 'Teniske' WHERE tensike_id ='{$_SESSION['id']}'";

	$stmt_DeletepostProfilePage = $conn->query($sqlProfile);
}

?>

<?php
    session_start();

    require_once('connection.php');

    $sqlProfile = "SELECT * From 'Teniske' WHERE prod_id ='{$_SESSION['id']}'";
    $stmt_postProfilePage = $conn->query($sqlProfile);
    $postMySnkr = $stmt_postProfilePage->fetchAll(PDO::FETCH_ASSOC);


    if(isset($_POST['delet'])){

        $delet = $_POST['delet'];
        

        $sqlDelete = "DELETE FROM 'Teniske' WHERE tensike_id = :delet";
        $stmt_delet = $conn->prepare($sqlDelete);
        $stmt_delet->bindParam(':delet', $delet);
        if ($stmt_delet->execute() && unlink("uploads/".$postSnkr['slika']."")) {
            $_SESSION['success'] = "Successfully deleted a post";
            header('location: profile.php');
        }else{
            $_SESSION['error'] = "Something went wrong......";
            header('location: profile.php');
        }



    }
?>
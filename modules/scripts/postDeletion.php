<?php
    session_start();

    require_once('connection.php');

    if(isset($_POST['delet'])){

        $delet = $_POST['delet'];
        
        $sqlDelete = "DELETE FROM 'Prod_teniske' WHERE pr_id = :delet";
        $stmt_delet = $conn->prepare($sqlDelete);
        $stmt_delet->bindParam(':delet', $delet);
        if ($stmt_delet->execute()) {
            $_SESSION['success'] = "Successfully deleted a post";
            header('location: profile.php');
        }else{
            $_SESSION['error'] = "Something went wrong......";
            header('location:../../index.php?page=profile');
        }
    }elseif (isset($_POST['deletAddress'])) {
        $deletAddress = $_POST['deletAddress'];

        $sqlDelete = "DELETE FROM 'naslov_za_posiljanje_prodajalec' WHERE naslov_id = :deletAddress";
        $stmt_delet = $conn->prepare($sqlDelete);
        $stmt_delet->bindParam(':deletAddress', $deletAddress);
        if ($stmt_delet->execute()) {
            $_SESSION['success'] = "Successfully deleted a post";
            header('location:../../index.php?page=profile');
        }else{
            $_SESSION['error'] = "Something went wrong......";
            header('location:../../index.php?page=profile');
        }

    }elseif (isset($_POST['deletAddress1'])) {
        $deletAddress = $_POST['deletAddress1'];

        $sqlDelete = "DELETE FROM 'Naslov_za_posiljanje_stranka' WHERE naslov_id = :deletAddress1";
        $stmt_delet = $conn->prepare($sqlDelete);
        $stmt_delet->bindParam(':deletAddress1', $deletAddress);
        if ($stmt_delet->execute()) {
            $_SESSION['success'] = "Successfully deleted a adress";
            header('location:../../index.php?page=profile');
        }else{
            $_SESSION['error'] = "Something went wrong......";
            header('location:../../index.php?page=profile');
        }
    }
?>
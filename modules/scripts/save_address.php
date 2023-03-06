<?php
    session_start();
    require_once('connection.php'); 

    if(isset($_POST['uplaodAddress'])){
        $ime = $_POST['name'];
        $primek = $_POST['surname'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $mesto = $_POST['city'];
        $drzava = $_POST['country'];
        $postnaStevilka = $_POST['postalCode'];
        $mobilanStevilka = $_POST['phoneNumber'];
        $Aid = $_SESSION['id'];

        if ($_SESSION['seller'] == 2) {
            $querryP = "INSERT INTO 'naslov_za_posiljanje_prodajalec' (adres1, adres2, postna_stevilka, telefonska_stevilka, prod_id, Ime, Primek, drzava, mesto) VALUES (:address1, :address2, :postnaStevilka, :mobilanStevilka, :Aid, :ime, :primek, :drzava, :mesto)";
            $stmt_adresP = $conn->prepare($querryP);
            $stmt_adresP->bindParam(':address1', $address1);
            $stmt_adresP->bindParam(':address2', $address2);
            $stmt_adresP->bindParam(':postnaStevilka', $postnaStevilka);
            $stmt_adresP->bindParam(':mobilanStevilka', $mobilanStevilka);
            $stmt_adresP->bindParam(':Aid', $Aid);
            $stmt_adresP->bindParam(':ime', $ime);
            $stmt_adresP->bindParam(':primek', $primek);
            $stmt_adresP->bindParam(':drzava', $drzava);
            $stmt_adresP->bindParam(':mesto', $mesto);
            if ($stmt_adresP->execute()) {
                $_SESSION['success'] = "Adress saved successfully";
                header('location:../../index.php');
                $_GET['page'] = "profile";
            }else{
                $_SESSION['error'] = "Something went wrong......";
                header('location:../../index.php');
                $_GET['page'] = "profile";
            }
        }else {
            $querryS = "INSERT INTO 'Naslov_za_posiljanje_stranka' (adress1, adress2, postna_stevilka, telefonska_stevilka, strank_id, Ime, Primek, drzava, mesto) 
            VALUES (:address1, :address2, :postnaStevilka, :mobilanStevilka, :Aid, :ime, :primek, :drzava, :mesto)";
            $stmt_adresS = $conn->prepare($querryS);
            $stmt_adresS->bindParam(':address1', $address1);
            $stmt_adresS->bindParam(':address2', $address2);
            $stmt_adresS->bindParam(':postnaStevilka', $postnaStevilka);
            $stmt_adresS->bindParam(':mobilanStevilka', $mobilanStevilka);
            $stmt_adresS->bindParam(':Aid', $Aid);
            $stmt_adresS->bindParam(':ime', $ime);
            $stmt_adresS->bindParam(':primek', $primek);
            $stmt_adresS->bindParam(':drzava', $drzava);
            $stmt_adresS->bindParam(':mesto', $mesto);
            if ($stmt_adresS->execute()) {
                $_SESSION['success'] = "Adress saved successfully";
                header('location:../../index.php?page=profile');
            }else{
                $_SESSION['error'] = "Something went wrong......";
                header('location: profile.php');
            }

        }

        
    }
?>


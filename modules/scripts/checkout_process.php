<?php 
    session_start();
    require_once 'connection.php';

    if (isset($_POST['postSelection'])) {
        
        $paymentype = $_POST['paymentType'];
        $addres = $_POST['adress'];
        $idUser = $_SESSION['id'];
        $id = $_POST['postSelection'];
        $idSeller = $_POST['seller'];
        $cookie_idSeller_value = $idSeller;
        $cookie_paymentype_value = $paymentype;
        $cookie_addres_value = $addres;
        $cookie_idUser_value = $idUser;
        $cookie_id_value = $id;
        setcookie("Payment", $paymentype, time() + 600, "/");
        setcookie("idSeller", $idSeller, time() + 600, "/");
        setcookie("address", $addres, time() + 600, "/");
        setcookie("idUser", $idUser, time() + 600, "/");
        setcookie("id", $id, time() + 600, "/");
        if (isset($_COOKIE['Payment']) && isset($_COOKIE['address']) && isset($_COOKIE['idUser']) && isset($_COOKIE['id']) && isset($_COOKIE['idSeller'])) {
            header("location:../../../../index.php?page=checkout&orderSubmition=pendingOrder&id=".$id."&userId=".$idUser."&idSeller=".$idSeller."&address=".$addres."&payment=".$paymentype);
        }
        else{
            echo("Cookie seesion notset");
        }
    }
    if (isset($_POST['confirmOrder'])) {
       if (isset($_COOKIE['Payment']) && isset($_COOKIE['address']) && isset($_COOKIE['idUser']) && isset($_COOKIE['id']) && isset($_COOKIE['idSeller'])) {
        $sql = "SELECT * From 'v_teniske' WHERE pr_id = {$_COOKIE['id']}";
        $stmt_Pord = $conn->query($sql);
        $Prod = $stmt_Pord->fetchAll(PDO::FETCH_ASSOC);
        foreach($Prod as $rows => $Prod){
            $total = $Prod['cena'];
        }
        $querryTran = "INSERT INTO 'Placilo' (znesek, nacin_placila, strank_id) VALUES (:total, :typePay, :user)";
        $stmt = $conn->prepare($querryTran);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':typePay', 2);
        $stmt->bindParam(':user', $_COOKIE['idUser']);
        if($stmt->execute()){
            $sqlTran = "SELECT * From 'Placilo' WHERE znesek = $total";
            $stmt_Tran = $conn->query($sqlTran);
            $Tran= $stmt_Tran->fetchAll(PDO::FETCH_ASSOC);
            foreach($Tran as $rows => $Tran){
                $id_Tran = $Tran['transakcija_id'];
            }
            $date = date("Y-m-d h:i:sa");
            $querry = "INSERT INTO 'Narocila' (strank_id, prod_id, datum_narocila, naslov_id, transakcija_id) VALUES(:user_id, :seller_id, :cas, :addres, :transaction_id)";
            $stmt1 = $conn->prepare($querry);
            $stmt1->bindParam(':user_id', $_COOKIE['idUser']);
            $stmt1->bindParam(':seller_id', $_COOKIE['idSeller']);
            $stmt1->bindParam(':cas', $date);
            $stmt1->bindParam(':addres', $_COOKIE['address']);
            $stmt1->bindParam(':transaction_id', $id_Tran);
            if ($stmt1->execute()) {
                $sqlNar = "SELECT * From 'Narocila' WHERE transakcija_id = $id_Tran";
                $stmt_Nar = $conn->query($sqlNar);
                $Nar= $stmt_Nar->fetchAll(PDO::FETCH_ASSOC);
                foreach($Nar as $rows => $Nar){
                    $id_Nar = $Nar['narocila_id'];
                }
                $querryPrNar = "INSERT INTO 'Predmet_narocil' (narocila_id, pr_id) VALUES(:nar_id, :p_id)";
                $stmt2 = $conn->prepare($querryPrNar);
                $stmt2->bindParam(':nar_id', $id_Nar);
                $stmt2->bindParam(':p_id', $_COOKIE['id']);
                $sqlUpdateState =  "UPDATE 'Prod_teniske' SET prodano = 2 WHERE pr_id = {$_COOKIE['id']}";
                $stmt_UpdateState = $conn->prepare($sqlUpdateState);
                if ($stmt2->execute() && $stmt_UpdateState->execute()){
                    header("location:../../../../index.php?page=checkout&orderSubmition=completeOrder");
                }
            }
        }
        
       }else{
            echo("Cookie seesion expired");
       }
    }


?>
<?php
require_once('connection.php');

if (isset($_GET['id'])) {
    $SnkrId = $_GET['id'];
    $_SESSION['snId'] = $SnkrId;
    $sql = "SELECT * From 'v_teniske' WHERE pr_id = $SnkrId";
    $stmt_postHomePage = $conn->query($sql);
    $postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);

    $sqlProd = "SELECT * From 'v_teniske' WHERE pr_id = $SnkrId";
    $stmt_Pord = $conn->query($sql);
    $Prod= $stmt_Pord->fetchAll(PDO::FETCH_ASSOC);
    foreach($Prod as $rows => $Prod){
        $seller = $Prod['prod_id'];
    }

    $sqlProfileAddress1 = "SELECT * From 'Naslov_za_posiljanje_stranka' WHERE strank_id = {$_SESSION['id']}";
    $stmt_postAddressPage1 = $conn->query($sqlProfileAddress1);
    $postMyAddres1 = $stmt_postAddressPage1->fetchAll(PDO::FETCH_ASSOC);
}
?>
<section class="p-5 pM">
    <div class="row">
        <div class="col-sm-12 col-lg-8 text-light">
            <?php
                
                if(isset($_GET['orderSubmition']) && $_GET['orderSubmition'] === 'completeOrder'){
                    echo("<h3>Order has been placed</h3>");
                    sleep(1);
                    header("location:../../../../index.php?page=home");
                }else{
                    if(isset($_GET['orderSubmition']) && $_GET['orderSubmition'] === 'pendingOrder'){
                        include_once("checkoutForm/submitOrder.php");
                    }elseif (!isset($_POST['postSelection']) && !empty($postMyAddres1)) {
                        include_once("checkoutForm/selectionInfo.php");
                    }else{
                        echo("Please add a address");
                        echo("<div class='col-6'>");
                        include_once("profile/address.html");
                        echo("</div>");
                    }
                }
            ?>
        </div>
        <div class="col-sm-12 col-lg-4">
            <?php foreach($postSnkr as $rows => $postSnkr) { ?>
            <div class="card  bg-custom-2">
                <?php echo("<img src='assets/img/snkrs/".$postSnkr['slika']."'>");?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo($postSnkr['model'])?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo($postSnkr['barva'])?></h6>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
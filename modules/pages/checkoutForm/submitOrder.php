<?php
    if(isset($_GET['address'])){
        $queryAd = "SELECT * FROM Naslov_za_posiljanje_stranka WHERE naslov_id = {$_GET['address']}";
        $stmtAd = $conn->query($queryAd);
        $Add = $stmtAd->fetchAll(PDO::FETCH_ASSOC);
        $querryPrice = "SELECT * FROM Prod_teniske WHERE pr_id= {$_GET['id']}";
        $stmtTotal = $conn->query($querryPrice);
        $Total = $stmtTotal->fetchAll(PDO::FETCH_ASSOC);
        foreach ($Total as $rows => $Total) {
            if (isset($_GET['payment']) && $_GET['payment'] ==1){
                $payment = $Total['cena'] + 3.5;
            }
        }
    }

    
?>
<form action="">
    <div class="row justify-content-center mx-4">
        <div class="col-4">
            <h3>Confirm order</h3>
            <?php
                foreach ($Add as $row => $Add) {
                    echo("Address: ". $Add['adress1']);
                }
                if (isset($_GET['payment']) && $_GET['payment'] == 1) {
                    echo("<br> Paytment type: after taking cash(+3.5€ fee)");
                }
                
                echo ("<h3>Total: $payment €</h3>");
            ?>
            <button class="btn btn-outline-light" name="confirmOrder" value="<?php echo($SnkrId)?>">【ＣＯＮＦＩＲＭ】</button>
        </div>
    </div>
</form>
<?php
    require_once('connection.php');
    if (isset($_GET['id'])) {
        $sqlView = "SELECT * From 'v_teniske' WHERE teniske_id = {$_GET['id']}";
        $stmt_postHomePageView = $conn->query($sqlView);
        $postSnkrView = $stmt_postHomePageView->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT * From 'Teniske' WHERE teniske_id = {$_GET['id']}";
	    $stmt_postHomePage = $conn->query($sql);
	    $postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);

        $sqlBuyer = "SELECT * FROM 'povezava_racunov' WHERE strank_id = {$_SESSION['id']}";
        $stmt_buyer= $conn->query($sqlBuyer);
	    $isSellerB = $stmt_buyer->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
?>
<section class="p-5">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-6 cb2 mx-3">
            <?php foreach($postSnkr as $rows => $postSnkr) {?>
                <?php echo("<img class='img-fluid mx-auto' src='assets/img/snkrs/".$postSnkr['slika']."'>");?>
                <?php }?>
        </div>
        <div class="col-sm-12 col-lg-4 cb2">
            <h3 class="text-light text-center">Listings</h3>
            <ul style="list-style-type: none" class="text-light">
            <?php foreach($postSnkrView as $rows => $postSnkrView) {?>
                <?php foreach($isSellerB as $rows => $isSellerB) {?>
                <li>
                    <?php if ($_SESSION['seller'] == 1 && $postSnkrView['prodano'] == 1 && $isSellerB['prod_id'] != $postSnkrView['prod_id']) {?> 
                    <a href="?page=checkout&id=<?php echo($postSnkrView['pr_id'])?>" class="btn btn-outline-light my-2">Buy</a>
                    <?php echo(" Cena:".$postSnkrView['cena']." stevilka ".$postSnkrView['stevilka'])?></li>
                <?php }?>
                <?php }?>
                
                <?php }?>
            </ul>
        </div>

    </div>
</section>
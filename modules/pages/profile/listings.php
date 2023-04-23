<?php
$sqlProfileSnkrs = "SELECT * From 'v_teniske' WHERE prod_id ={$_SESSION['id']}";
$stmt_postProfilePage = $conn->query($sqlProfileSnkrs);
$postMySnkr = $stmt_postProfilePage->fetchAll(PDO::FETCH_ASSOC);

$querryViewNarocila = "SELECT * FROM v_narocila WHERE prod_id = {$_SESSION['id']}";
$stmt_orders = $conn->query($querryViewNarocila);
$orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);
?>

<h3 class="text-center">My listings</h3>
<div class="row justify-content-center text-center">
    <div class="col-2">
        <h5>Mdel</h5>
    </div>
    <div class="col-2">
        <h5>Color way</h5>
    </div>
    <div class="col-1">
        <h5>Total</h5>
    </div>
    <div class="col-2">
        
        <h5>Status</h5>
    </div>
    <div class="col-2">
        <h5>Order date</h5>
    </div>
    <div class="col-1">
            
            </div>
</div>

<?php foreach ($postMySnkr as $rows => $postMySnkr) { ?>
    <?php foreach ($orders as $rows => $orders) {?>
    <div class="row justify-content-center text-center">

        <div class="col-2">
            <p><?php echo ($postMySnkr['model']) ?></p>
        </div>
        <div class="col-2">
            <p><?php echo ($postMySnkr['stevilka']) ?></p>
        </div>
        <div class="col-1">
            <p><?php echo ($postMySnkr['cena'])  ?></p>
        </div>
        <div class="col-2">
            <p><?php if ($postMySnkr['prodano'] == 1) {
                echo("Not sold");
            }else {
                echo("Sold");
            }?></p>
        </div>
        <div class="col-2">
            <?php
                    echo($orders['datum_narocila']);
            ?>
        </div>
        <div class="col-1">
            <form method="POST" action="modules/scripts/postDeletion.php">
                <?php if ($postMySnkr['prodano'] == 1) { ?>
                    <button class="btn btn-outline-light btn-block my-3" name="delet" value="
                        <?php echo ($postMySnkr['pr_id']) ?>">Delete</button>
                    <?php echo ("Marketplace"); ?>z`
                <?php } ?>
            </form>
        </div>
        <div class="col-1">
           <a class="btn btn-outline-light" href="/?page=listL&idN=<?php echo($orders['naslov_id']);?>">View</a>
        </div>
    </div>
    <?php } ?>
<?php } ?>


<?php
if (isset($_SESSION['success'])) {
?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success'];
        header("refresh: 2"); ?>
    </div>
<?php
    unset($_SESSION['success']);
}
?>
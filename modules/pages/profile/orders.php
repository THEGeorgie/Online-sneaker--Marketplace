<?php
$querryViewNarocila = "SELECT * FROM v_narocila";
$stmt_orders = $conn->query($querryViewNarocila);
$orders = $stmt_orders->fetchAll(PDO::FETCH_ASSOC);
$querryViewImage = "SELECT slika FROM v_teniske";
$stmt_Image = $conn->query($querryViewImage);
$image = $stmt_Image->fetchAll(PDO::FETCH_ASSOC);

?>
<h3 class="text-center">My Orders</h3>
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
        <h5>Order date</h5>
    </div>
    <div class="col-2">
        <h5>Status</h5>
    </div>
</div>
<?php foreach ($orders as $rows => $orders) { ?>
    <div class="row justify-content-center text-center">
        <div class="col-2">
            <p><?php echo ($orders['model']) ?></p>
        </div>
        <div class="col-2">
            <p><?php echo ($orders['barva']) ?></p>
        </div>
        <div class="col-1">
            <p><?php echo ($orders['znesek'])  ?></p>
        </div>
        <div class="col-2">
            <p><?php echo ($orders['datum_narocila'])  ?></p>
        </div>
        <div class="col-2">
            <?php
            if ($orders['prodano'] == 2) {
                echo ("Pending");
            } elseif ($orders['prodano'] == 3) {
                echo ("Delivered");
            }
            ?>
        </div>
    </div>
<?php } ?>
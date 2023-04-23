<?php
require_once("connection.php");
if (isset($_GET['idN'])) {
    echo ($_GET['idN']);
    $querryAddress = "SELECT * FROM naslov_za_posiljanje_stranka WHERE naslov_id = {$_GET['idN']}";
    $stmt_address = $conn->query($querryAddress);
    $address = $stmt_address->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="container-sm">
    <div class="row">
    <h3 class="text-white">Shipping address</h3>
        <div class="col-6">
            <?php foreach ($address as $rows => $address) { ?>
                <div class="row">
                    <div class="col-6 bg-custom-2 my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['Ime']); ?>
                        </div>
                    </div>
                    <div class="col-6 bg-custom-2  my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['Primek']); ?>
                        </div>
                    </div>
                    <div class="col-12 bg-custom-2  my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['adress1']); ?>
                        </div>
                    </div>
                    <div class="col-12 bg-custom-2  my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['adress2']); ?>
                        </div>
                    </div>
                    <div class="col-8 bg-custom-2  my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['mesto']); ?>
                        </div>
                    </div>
                    <div class="col-4 bg-custom-2  my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['drzava']); ?>
                        </div>
                    </div>
                    <div class="col-4 bg-custom-2  my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['postna_stevilka']); ?>
                        </div>
                    </div>
                    <div class="col-8 bg-custom-2  my-2">
                        <div class="bg-transparent mt-3">
                            <?php echo ($address['telefonska_stevilka']); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-6">
            <h4 class="text-white">Shippping has to be sent in 2 buissnes days</h4>
            <h4 class="text-white">Funds will be sent when the product is in transit</h4>
        </div>
    </div>
</div>
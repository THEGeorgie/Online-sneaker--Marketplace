<?php
    require_once('connection.php');
    if (isset($_GET['id'])) {
        $SnkrId = $_GET['id'];
        $sql = "SELECT * From 'v_teniske' WHERE pr_id = $SnkrId";
	    $stmt_postHomePage = $conn->query($sql);
	    $postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);

        $sqlProfileAddress1 = "SELECT * From 'Naslov_za_posiljanje_stranka' WHERE strank_id = {$_SESSION['id']}";
        $stmt_postAddressPage1 = $conn->query($sqlProfileAddress1);
        $postMyAddres1 = $stmt_postAddressPage1->fetchAll(PDO::FETCH_ASSOC);
    }
	
?>


<section class="p-5 pM">
    <div class="row">
        <div class="col-sm-12 col-lg-8 text-light">
            <div class="row justify-content-center mx-4">
            <div class="col-sm-12 col-lg-6"></div>
                <div class="col-sm-12 col-lg-6 bg-custom-1 ">
                    <h3 class="text-center">Select Adress </h3>
                    <select class="form-select" aria-label="Default select example">
                <?php 
                    if (empty($postMyAddres1)) {
                        echo("Please add a shipping address");
                    }
                    else {
                        foreach($postMyAddres1 as $rows => $postMyAddres1) {
                    ?>
                    <option value="<?php echo($postMyAddres1['naslov_id']);?>"><?php echo($postMyAddres1['Ime']." ".$postMyAddres1['adress1']);?></option>
                     

                <?php } }?>        
                    </select>
                </div>
            </div>
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
<?php
    require_once('connection.php');
    if (isset($_GET['id'])) {
        $SnkrId = $_GET['id'];
        $sql = "SELECT * From 'Prod_teniske' WHERE pr_id = '$SnkrId'";
	    $stmt_postHomePage = $conn->query($sql);
	    $postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);

        $sqlProfileAddress1 = "SELECT * From 'naslov_za_posiljanje_stranka' WHERE strank_id ='{$_SESSION['id']}'";
        $stmt_postAddressPage1 = $conn->query($sqlProfileAddress1);
        $postMyAddres1 = $stmt_postAddressPage1->fetchAll(PDO::FETCH_ASSOC);
    }
	
?>
<section class="p-5 pM">
    <div class="row">
        <div class="col-sm-12 col-lg-8">
            <ul>
                <?php foreach($postMyAddres1 as $rows => $postMyAddres1) { ?>
                <li>
                    <?php echo($postMyAddres1['Ime']." ".$postMyAddres1['adres1']);?> <button
                        class="btn btn-outline-light btn-block my-3" name="deletAddress1"
                        value="<?php echo($postMyAddres1['naslov_id'])?>">Delete</button>
                </li>
                <?php
                    ++$key;
                    if ($key =+ 0) {
                        echo("Pelase create a adress");
                    }

                ?>
                <?php }  ?>
            </ul>
        </div>
        <div class="col-sm-12 col-lg-4">
            <?php foreach($postSnkr as $rows => $postSnkr) { ?>
            <div class="card" style="width: 18rem;">
                <?php echo("<img src='modules/uploads/".$postSnkr['slika']."'>");?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo($postSnkr['model'])?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo($postSnkr['barva'])?></h6>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<form method="POST" action="modules/scripts/checkout_process.php">
    <div class="row justify-content-center mx-4 ">
        <div class="col-sm-12 col-lg-4 bg-custom-1 mx-5">
            <h3>Select payment method</h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="paymentType" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    after taking cash(+3.5€ fee)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="2" name="paymentType" disabled>
                <label class="form-check-label" for="flexRadioDefault2">
                    Credit/debit
                </label>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4 bg-custom-1">
            <h3 class="text-center">Select Adress </h3>
            <select class="form-select" aria-label="Default select example" name="adress">
            <?php 
            
            foreach($postMyAddres1 as $rows => $postMyAddres1) {

                ?>
                <option value="<?php echo($postMyAddres1['naslov_id']);?>">
                    <?php echo($postMyAddres1['Ime']." ".$postMyAddres1['adress1']);?></option>

                    <?php }?>
            </select>
            <input type=hidden name=seller value="<?php echo($seller);?>">
        </div>
        <div class="col-sm-12 col-lg-2 my-3 text-center align-self-end">
            <button class="btn btn-outline-light" name="postSelection" value="<?php echo($SnkrId)?>">【ＮＥＸＴ】</button>
        </div>
    </div>
</form>
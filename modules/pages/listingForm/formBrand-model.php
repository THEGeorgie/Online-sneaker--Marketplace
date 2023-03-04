<form method="POST" action="modules/scripts/save_post.php">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-12">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">sku</span>
                <input list="model-brands" name="sku" type=text" class="form-control" placeholder="model"
                    aria-label="Username" aria-describedby="basic-addon1" required="required">
                <datalist id="model-brands">
                    <?php foreach($Snkr as $rows=> $Snkr) {
                    ?><option value="<?php echo($Snkr['sku']);?>"><?php echo($Snkr['model']."-".$Snkr['barva']."-".$Snkr['sku']);
                    ?></option><?php
                }

                ?>
                </datalist>
            </div>
        </div>
        <div class="col-sm-12 col-lg-4 mb-3">
            <div class="form-floating">
                <select class="form-select mt-3" name="size" aria-label="Default select example" required="required">
                    <option selected value="4">4</option>
                    <option value="4.5">4.5</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="6.7">6.5</option>
                    <option value="7">7</option>
                    <option value="7.5">7.5</option>
                    <option value="8">4.8</option>
                    <option value="8.5">8.5</option>
                    <option value="9">9</option>
                    <option value="9.5">9.5</option>
                    <option value="10">10</option>
                    <option value="10.5">10.5</option>
                    <option value="11">11</option>
                    <option value="11.5">11.5</option>
                    <option value="12">12</option>
                </select>
                <label class="text-center text-dark">Select Size</label>
            </div>
        </div>
        <div class="col-sm-4 col-lg-8">
            <div class="input-group mt-3">
                <span class="input-group-text">euros</span>
                <input type="number" class="form-control" name="price" aria-label="Amount (to the nearest dollar)" required="required" min="10" max="10000000000000000000000000">
            </div>
        </div>
        <div class="col-4">
            <button name="submitListing" class="btn btn-outline-light">Submit</button>
        </div>
    </div>
</form>
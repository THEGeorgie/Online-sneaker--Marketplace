<?php
	require_once 'connection.php';

    if (isset($_POST['submitBrand'])) {
        $sql = "SELECT * From 'Teniske' WHERE znamka = '{$_POST['brand']}'";
	    $stmt_postHomePage = $conn->query($sql);
	    $Snkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<section class="p-5 pM">
	<div class="container shadow text-light">
		<div class="row justify-content-md-center">
			<div class="col-sm-12 col-lg-4">
				<h3 class="text-center">Create Listing</h3>
				<?php if (!isset($_POST['submitBrand'])) {
					include_once("modules/pages/listingForm/formBrand.html");
				} elseif(isset($_POST['submitBrand'])) {
					include_once("modules/pages/listingForm/formBrand-model.php");
				}
				?>
				
			</div>
		</div>					
	</div>
	<script src="assets/js/app.js"></script>
</section>
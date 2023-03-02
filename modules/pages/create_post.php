<?php
	require_once('connection.php');
	$sql = "SELECT * From 'Teniske'";
	$stmt_postHomePage = $conn->query($sql);
	$Snkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="p-5 pM">
	<div class="container shadow text-light">
		<div class="row justify-content-md-center">
			<div class="col-sm-12 col-lg-4">
				<h3 class="text-center">Create Listing</h3>
				<form method="POST" action="">
					<select name='brand' class="form-select" aria-label="Default select example" required>
						<option selected>Choose...</option>
						<option value="NIKE">Nike</option>
						<option value="JORDAN">Jordan</option>
						<option value="YEEZY">Yeezy</option>
					</select>
					<div class="row mt-3">
						<div class="col-dm-12 col-lg-6">
							<div class="form-group">
								<label>Model</label>
								<input type="model" name="model" id="model" class="form-control" required="required" list="model"/>
								<datalist id="model">
									<?php foreach ($Snkr as $rows => $Snkr) {?>
										<option value="<?php echo($Snkr['barva']); ?>"></option>
									<?php }?>
									<option value="JOrdan 3"></option>
								</datalist>
							</div>
						</div>
						<div class="col-dm-12 col-lg-6">
							<div class="form-group">
								<label>Size</label>
								<input type="password" name="password" class="form-control" required="required" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="password" name="password" class="form-control" required="required" />
					</div>

					<button class="btn btn-outline-light mt-3" name="ListingBrand">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/js/app.js"></script>
</section>
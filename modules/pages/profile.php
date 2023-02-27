
		<?php

				require_once('connection.php');

			$sqlProfile = "SELECT * From 'Teniske' WHERE prod_id ='{$_SESSION['id']}'";
			$stmt_postProfilePage = $conn->query($sqlProfile);
			$postMySnkr = $stmt_postProfilePage->fetchAll(PDO::FETCH_ASSOC);

        ?>

		<section class="p-5 pM">
			<div class="container shadow text-light">
				<div class="row">
					<div class="col-sm-12 col-lg-6">
						<?php if(isset($_SESSION['seller']) && $_SESSION['seller'] == 2) {?>
						<h3>My listings</h3>
						<form method="POST" action="postDeletion.php">
							<ul>
								<?php foreach($postMySnkr as $rows => $postMySnkr) { ?>
								<li><?php echo($postMySnkr['model']);?> <button
										class="btn btn-outline-light btn-block my-3" name="delet"
										value="<?php echo($postMySnkr['tensike_id'])?>">Delete</button>
									<?php echo($postMySnkr['tensike_id']);?></li>
								<?php } ?>
							</ul>
						</form>
						<?php
    				if(ISSET($_SESSION['success'])){
    					?>
						<div class="alert alert-success">
							<?php echo $_SESSION['success']; header("refresh: 2");?>
						</div>
						<?php
    					unset($_SESSION['success']);
    					}
    					?>
						<?php }?>
					</div>
					<div class="col-sm-12 col-lg-6">
						<h3>Address</h3>
						<p>
							<button class="btn btn-outline-light" type="button" data-bs-toggle="collapse"
								data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								【Ａｄｄ　ａｄｄｒｅｓｓ】
							</button>
						</p>
						<div class="collapse" id="collapseExample">
							<form method="POST" action="modules/scripts/create_address.php">
								<div class="row">
									<div class="col-6">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="name" class="form-control taxt-dark" id="name"
												required="required" placeholder="Name">
											<label for="floatingInput" class="text-dark">Name</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-6">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="surname" class="form-control" id="surname"
												required="required" placeholder="Name">
											<label for="floatingInput" class="text-dark">Surname</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-12">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="address1" class="form-control" id="Address1"
												required="required" placeholder="Name">
											<label for="floatingInput" class="text-dark">Address1</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-12">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="address2" class="form-control" id="Address2"
												placeholder="Name">
											<label for="floatingInput" class="text-dark">Address 2 (optional)</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-8">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="city" class="form-control" id="City"
												placeholder="Name">
											<label for="floatingInput" class="text-dark">City</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-4">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="country" class="form-control" id="City"
												placeholder="Name">
											<label for="floatingInput" class="text-dark">Country</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-4">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="postalCode" class="form-control" id="PostalCode"
												placeholder="Name">
											<label for="floatingInput" class="text-dark">Postal code</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-8">
										<div class="bg-transparent form-floating mt-3">
											<input type="text" name="phoneNumber" class="form-control" id="phoneNumber"
												placeholder="Name">
											<label for="floatingInput" class="text-dark">Phone number</label>
											<ul class="list-group"></ul>
										</div>
									</div>
									<div class="col-12 text-center">
										<input type="submit" name="uplaodAddress" value="【Ｓｕｂｍｉｔ】"
											class="btn btn-outline-light btn-block my-3">
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</section>
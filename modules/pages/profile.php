<?php

				require_once('connection.php');

			$sqlProfileSnkrs = "SELECT * From 'v_teniske' WHERE prod_id ={$_SESSION['id']}";
			$stmt_postProfilePage = $conn->query($sqlProfileSnkrs);
			$postMySnkr = $stmt_postProfilePage->fetchAll(PDO::FETCH_ASSOC);

			$sqlProfileAddress = "SELECT * From 'naslov_za_posiljanje_prodajalec' WHERE prod_id ='{$_SESSION['id']}'";
			$stmt_postAddressPage = $conn->query($sqlProfileAddress);
			$postMyAddres = $stmt_postAddressPage->fetchAll(PDO::FETCH_ASSOC);

			$sqlProfileAddress1 = "SELECT * From 'naslov_za_posiljanje_stranka' WHERE strank_id ='{$_SESSION['id']}'";
			$stmt_postAddressPage1 = $conn->query($sqlProfileAddress1);
			$postMyAddres1 = $stmt_postAddressPage1->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="p-5 pM">
	<div class="container shadow text-light">
		<div class="row justify-content-md-center">
			<div class="col-sm-12 col-lg-6">
				<?php if(isset($_SESSION['seller']) && $_SESSION['seller'] == 2) {
					include_once("profile/listings.php");
					} else{
						include_once("profile/orders.php");
					}?>
			</div>
			<div class="col-sm-12 col-lg-6">
				<h3 class="text-center">Address</h3>
				<?php if(isset($_SESSION['seller']) && $_SESSION['seller'] == 2) {?>
				<form method="POST" action="modules/scripts/postDeletion.php">
					<ul>
						<?php foreach($postMyAddres as $rows => $postMyAddres) { ?>
						<li>
							<?php echo($postMyAddres['Ime']." ".$postMyAddres['adress1']);?> <button
								class="btn btn-outline-light btn-block my-3" name="deletAddress"
								value="<?php echo($postMyAddres['naslov_id'])?>">Delete</button>
						</li>
						<?php } ?>
					</ul>
				</form>
				<?php } elseif (isset($_SESSION['seller']) && $_SESSION['seller'] == 1) { ?>
				<form method="POST" action="modules/scripts/postDeletion.php">
					<ul>
						<?php foreach($postMyAddres1 as $rows => $postMyAddres1) { ?>
						<li>
							<?php echo($postMyAddres1['Ime']." ".$postMyAddres1['adress1']);?> <button
								class="btn btn-outline-light btn-block my-3" name="deletAddress1"
								value="<?php echo($postMyAddres1['naslov_id'])?>">Delete</button>
						</li>
						<?php } ?>
					</ul>
				</form>
				<?php }?>

				<?php include_once("profile/address.html");?>
			</div>
		</div>
	</div>
</section>
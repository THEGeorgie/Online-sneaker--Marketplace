<?php
require_once('connection.php');
if (isset($_POST['submitOrder'])) {
	if (isset($_POST['sortby'])) {
		if ($_POST['submitOrder'] == "asc") {
			switch ($_POST['sortby']) {
				case 'brand':
					$sql = "SELECT * From 'Teniske' ORDER BY znamka ASC";
					break;
				case 'color':
					$sql = "SELECT * From 'Teniske' ORDER BY barva ASC";
					break;
				case 'release':
					$sql = "SELECT * From 'Teniske' ORDER BY datum_izdaje ASC";
					break;
				default:
					break;
			}
		} else {
			switch ($_POST['sortby']) {
				case 'brand':
					$sql = "SELECT * From 'Teniske' ORDER BY znamka DESC";
					break;
				case 'color':
					$sql = "SELECT * From 'Teniske' ORDER BY barva DESC";
					break;
				case 'release':
					$sql = "SELECT * From 'Teniske' ORDER BY datum_izdaje DESC";
					break;
				default:
					break;
			}
		}
	}
} else {
	$sql = "SELECT * From 'Teniske'";
}
$stmt_postHomePage = $conn->query($sql);
$postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container-sm shadow">
	<form method="POST" action="">
		<div class="row">
			<div class="col-2">
				<select class="form-select" name="sortby" id="">
					<option selected value="brand">Brand</option>
					<option value="color">Color way</option>
					<option value="release">Release date</option>
				</select>
			</div>
			<div class="col-2">
				<div class="dropdown">
					<button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Order By
					</button>
					<ul class="dropdown-menu">
						<button class="dropdown-item" name="submitOrder" value="asc">Ascending</button>
						<button class="dropdown-item" name="submitOrder" value="desc">Descending</button>
					</ul>
				</div>
			</div>
		</div>
	</form>
</div>
<section class="p-5">
	<div class="container-lg shadow">
		<?php
		if (isset($_SESSION['success'])) {
		?>
			<div class="alert alert-success">
				<?php echo $_SESSION['success'];
				header("refresh: 2"); ?>
			</div>
		<?php
			unset($_SESSION['success']);
		}
		if (count($_COOKIE) > 0) {
		} else {
			echo "Cookies are disabled.";
		}
		?>

		<div class="row justify-content-center">
			<?php foreach ($postSnkr as $rows => $postSnkr) { ?>
				<div class="col-sm-12 col-md-6 col-lg-3 m-3">
					<div class="card bg-custom-1 text-center">
						<?php echo ("<img src='assets/img/snkrs/" . $postSnkr['slika'] . "'>"); ?>
						<div class="card-body">
							<h5 class="card-title"><?php echo ($postSnkr['model']) ?></h5>
							<h6 class="card-subtitle mb-2 text-muted"><?php echo ($postSnkr['barva']) ?></h6>
							<ul class="list-group list-group-flush bg-custom-1">
								<li class="list-group-item">Releas date: <?php echo ($postSnkr['datum_izdaje']); ?>
								</li>
							</ul>
							<a href="/?page=sneaker&id=<?php echo ($postSnkr['teniske_id']) ?>" class="btn btn-outline-light mt-2">View</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

</section>
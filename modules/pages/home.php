<?php
require_once('connection.php');
if (isset($_GET['sortby'])) {
	switch ($_GET['sortby']) {
		case 'brand':
			include_once("home/byBrand.php");
			break;
		case 'color':
			include_once("home/byColor.php");
			break;
		case 'release':
			include_once("home/byDate.php");
			break;
		default:
			break;
	}
}else {
	include_once("home/default.php");
}

?>

<div class="container-sm shadow">
	<div class="dropdown">
		<button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			Filter By
		</button>
		<ul class="dropdown-menu">
			<li><a class="dropdown-item" href="../../index.php?page=home&sortby=brand">Brand</a></li>
			<li><a class="dropdown-item" href="../../index.php?page=home&sortby=color">Color way</a></li>
			<li><a class="dropdown-item" href="../../index.php?page=home&sortby=release">Release date</a></li>
		</ul>
	</div>
	<!-- <a href="../../index.php?page=home&sortby=color">price</a> -->
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
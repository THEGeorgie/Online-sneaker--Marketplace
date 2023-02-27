
<?php
	require_once('connection.php');
	$sql = "SELECT * From 'Teniske'";
	$stmt_postHomePage = $conn->query($sql);
	$postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="p-5">
	<div class="container-lg shadow">
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

		<div class="row row-cols-1 row-cols-md-3 g-4">
			<div class="col">
				<?php foreach($postSnkr as $rows => $postSnkr) { ?>
				<div class="card">
					<?php echo("<img src='modules/uploads/".$postSnkr['slika']."'>");?>
					<div class="card-body">
						<h5 class="card-title"><?php echo($postSnkr['model'])?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo($postSnkr['barva'])?></h6>
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Releas date: <?php echo($postSnkr['datum_izdaje']);?>
							</li>
							<li class="list-group-item">Size: <?php echo($postSnkr['velikost']);?></li>
							<li class="list-group-item">Price: <?php echo($postSnkr['cena']);?></li>
						</ul>
						<a href="checkout.php" class="btn btn-primary" value="">Buy</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

</section>
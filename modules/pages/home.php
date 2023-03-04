
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

		<div class="row justify-content-center">
		<?php foreach($postSnkr as $rows => $postSnkr) { ?>
			<div class="col-sm-12 col-md-6 col-lg-3 m-3">
				<div class="card bg-custom-1 text-center">
					<?php echo("<img src='assets/img/snkrs/".$postSnkr['slika']."'>");?>
					<div class="card-body">
						<h5 class="card-title"><?php echo($postSnkr['model'])?></h5>
						<h6 class="card-subtitle mb-2 text-muted"><?php echo($postSnkr['barva'])?></h6>
						<ul class="list-group list-group-flush bg-custom-1">
							<li class="list-group-item">Releas date: <?php echo($postSnkr['datum_izdaje']);?>
							</li>
						</ul>
						<a href="/?page=teniska&id=<?php echo($postSnkr['teniske_id'])?>" class="btn btn-outline-light mt-2">View</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

</section>
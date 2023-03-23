<?php
	require_once('connection.php');
	$sql = "SELECT * From 'Teniske'";
	$stmt_postHomePage = $conn->query($sql);
	$postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="sorting">
	<form action="">
	<header class="container-fluid">
  <div class="container text-center" id="searchBox">
    <h1>wiki viewer</h1>
    <div class="form col-xs-12">   
        <input class="col-xs-9" id="searchBar" type="text" placeholder="search"/>
        <span class="glyphicon glyphicon-search col-xs-1" data-toggle="tooltip" title="Search"></span>
        <span class="glyphicon bar col-xs-1" id="submit"><b>|</b></span>
        <a href="https://en.wikipedia.org/wiki/Special:Random" target="_blank"><span class="glyphicon glyphicon-random col-xs-1"  data-toggle="tooltip" title="Random topic"></span></a>
      </div>
    </div>
  </div>  
</header>
<div id="mainBody" class="container text-center">
  <ul id="results">
  </ul>
</div>
<footer class="text-center">
  
</footer>
	</form>
</section>
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
					if(count($_COOKIE) > 0) {
					  } else {
						echo "Cookies are disabled.";
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
						<a href="/?page=sneaker&id=<?php echo($postSnkr['teniske_id'])?>"
							class="btn btn-outline-light mt-2">View</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

</section>
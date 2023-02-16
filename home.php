<?php

	require_once('connection.php');

	$sql = "SELECT * From 'Teniske'";
	$stmt_postHomePage = $conn->query($sql);
	$postSnkr = $stmt_postHomePage->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>【ＳｎｅａｋｅｒＨａｖｅｎ】</title>
</head>

<body>
	<div class="container-fluid">
		<div class="wave"></div>
		<div class="wave"></div>
		<div class="wave"></div>
		<?php
                require_once("header.php");
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
							<?php echo("<img src='uploads/".$postSnkr['slika']."'>");?>
							<div class="card-body">
								<h5 class="card-title"><?php echo($postSnkr['model'])?></h5>
								<h6 class="card-subtitle mb-2 text-muted"><?php echo($postSnkr['barva'])?></h6>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Releas date: <?php echo($postSnkr['datum_izdaje']);?>
									</li>
									<li class="list-group-item">Size: <?php echo($postSnkr['velikost']);?></li>
									<li class="list-group-item">Price: <?php echo($postSnkr['cena']);?></li>
								</ul>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
	</script>
</body>

</html>
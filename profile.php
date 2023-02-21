<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/app.js"></script>
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
                require("header.php");

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
					<div class="col-sm-12 col-lg-12">
						
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
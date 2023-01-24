<?php 
        session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
			<div class="container-fluid">
				<a href="home.php" class="navbar-brand fs-4">【Ｓｎｅａｋｅｒ Ｈａｖｅｎ】</a>
				<button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<div class="mx-auto"></div>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="login.php" class="nav-link text-white">【Ｌｏｇｏｕｔ】</a>
						</li>
						<li class="nav-item">
							<a href="profile.php" class="nav-link text-white"><?php echo($_SESSION['name']);?></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<section class="p-5 pM">
			<div class="container shadow">
				<form class="text-center" method="GET">
					<?php 
						// if ($_SESSION['is_seller'] == 1) {
						// 	echo("<button class='btn btn-outline-light btn-block my-3 btn-create-post' name='create_post' onclick='loadHtml('post-conatiner', 'create_post.html')'>Create post</button>");
						// }
					?>
					<!-- <a href="#" class='btn btn-outline-light btn-block my-3 btn-create-post' name='create_post' onclick='includeHTML("html/create_post.html")'>Create post></a> -->


				</form>
				<div class="container-lg" id="post-conatiner">
					<div class="buttons">
						<button data-id="myorders" class="button">Orders</button>
						<button data-id="myproducts" class="button">Products</button>
						<button data-id="mysupplier" class="button">Supplier</button>
					</div>

					<div class="panel" id="myorders">
						<p>Laptop, Earphone</p>
					</div>
					<div class="panel" id="myproducts">
						<p>Earphone, smart watch</p>
					</div>
					<div class="panel" id="mysupplier">
						<p>Amazon, E-kart</p>
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
<?php 
        session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
                require("header.php");
        ?>
		<section class="p-5 pM">
			<div class="container shadow text-light">
				<form method="POST" action="save_post.php" name="createpost">
					<div class="row">
						<div class="col-sm-4 col-lg-4">
							<div class="form-group">
								<select class="form-select mt-3" aria-label="Default select example" id= "ControlTXT">
									<option selected>【ＢＲＡＮＤ】</option>
									<option value="Nike">【Ｎｉｋｅ】</option>
									<option value="Jordan">【Ｊｏｒｄａｎ】</option>
									<option value="Yeezy">【Ｙｅｅｚｙ】</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4 col-lg-4" id="NikeTXT" style="display:none">
							<input type="text" id="model">
							<ul class="list-group"></ul>
						</div>
						<div class="col-sm-4 col-lg-4" id="JordanTXT" style="display:none">
							<input type="text" id="model">
							<ul class="list-group"></ul>
						</div>
						<div class="col-sm-4 col-lg-4" id="YeezyTXT" style="display:none">
							<input type="text" id="model">
							<ul class="list-group"></ul>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
	<script src="js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
	</script>
</body>

</html>
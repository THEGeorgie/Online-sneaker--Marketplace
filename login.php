<?php 
        session_start();
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
			require("header.php");
		?>
		<section class="p-5 pM">
			<div class="container shadow">
				<div class="row text-white">
					<div class="col-lg-6 col-sm-12">
						<p>Ｌｏｒｅｍ　ｉｐｓｕｍ　ｄｏｌｏｒ　ｓｉｔ　ａｍｅｔ　ｃｏｎｓｅｃｔｅｔｕｒ，　ａｄｉｐｉｓｉｃｉｎｇ　ｅｌｉｔ．　Ｉｐｓｕｍ　ｉｌｌｕｍ　ｓａｐｉｅｎｔｅ　ａｎｉｍｉ　ｈａｒｕｍ　ｑｕｉｓ　ｐｏｒｒｏ　ｉｕｓｔｏ　ｉｐｓａｍ　ｏｍｎｉｓ　ｄｏｌｏｒｅ，　
							ｒｅｐｅｌｌｅｎｄｕｓ　ｎｉｈｉｌ　ｓｉｎｔ　ｑｕｉ　ｌｉｂｅｒｏ　ｕｔ　ｆａｃｉｌｉｓ？　Ｃｏｍｍｏｄｉ　ｄｕｃｉｍｕｓ　ｎａｔｕｓ　ｏｆｆｉｃｉｉｓ．】</p>
					</div>
					<div class="col-lg-6 col-sm-12">
						<form method="POST" action="login_query.php">
							<div class="form-group">
								<label>【Ｕｓｅｒｎａｍｅ】</label>
								<input type="text" name="username" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>【Ｐａｓｓｗｏｒｄ】</label>
								<input type="password" name="password" class="form-control" required="required" />
							</div>
							<?php
									//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
									if(ISSET($_SESSION['error'])){
							?>
							<!-- Display Login Error message -->
							<div class="alert alert-danger"><?php echo $_SESSION['error']?></div>
							<?php
									//Unsetting the 'error' session after displaying the message. 
									unset($_SESSION['error']);
									}
							?>
							<a href="register.php">Not a member?</a>
							<br>
							<button class="btn btn-outline-light btn-block my-3" name="login">【Ｌｏｇｉｎ】</button>
						</form>
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
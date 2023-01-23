<?php 
    //starting the session
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
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
			<div class="container">
				<a href="index.php" class="navbar-brand fs-4">【Ｓｎｅａｋｅｒ Ｈａｖｅｎ】</a>
				<button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
		</nav>
		<section class=pM>
			<div class="container-lg shadow ">
				
				<div class="row justify-content-center">
				<div class="col-md-6">
					<a href="login.php">Already a member? Log in here...</a>
					<form method="POST" action="save_member.php" class="text-white">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Retype Password</label>
							<input type="password" name="Rpassword" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="firstname" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="lastname" class="form-control" required="required" />
						</div>
						<label>Is this a sellers account?</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="is_seller" value="1">
							<label class="form-check-label" for="flexRadioDefault1">
								yes
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="is_seller" value="2">
							<label class="form-check-label" for="flexRadioDefault1">
								no
							</label>
						</div>
						<?php
    					//checking if the session 'success' is set.
    					if(ISSET($_SESSION['success'])){
    				?>
						<!-- Display regostration success message -->
						<div class="alert alert-success">
							<?php echo $_SESSION['success']; header('location: login.php');?>
						</div>
						<?php
    					//Unsetting the 'success' session after displaying the message. 
    					unset($_SESSION['success']);
    					}
    				?>
						<button class="btn btn-primary btn-block" name="register"><span
								class="glyphicon glyphicon-save"></span> Register</button>
					</form>
				</div>
				</div>
			</div>
		</section>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
		</script>
</body>

</html>
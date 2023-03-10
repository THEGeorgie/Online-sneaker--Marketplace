<section>
	<div class="container-lg shadow ">

		<div class="row justify-content-center">
			<div class="col-md-6">
				<a href="login.php">Already a member? Log in here...</a>
				<form method="POST" action="modules/scripts/save_member.php" class="text-white">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required="required" />
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" required="required" />
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
					<button class="btn btn-outline-light btn-block mt-3" name="register"><span
							class="glyphicon glyphicon-save"></span> Register</button>
							<p>When you create an account the website will generate a sellers and a buyers profile.</p>
				</form>
			</div>
		</div>
	</div>
</section>
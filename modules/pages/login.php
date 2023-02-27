<section class="p-5 pM">
	<div class="container shadow">
		<div class="row text-white">
			<div class="col-lg-6 col-sm-12">
				<p>Ｌｏｒｅｍ　ｉｐｓｕｍ　ｄｏｌｏｒ　ｓｉｔ　ａｍｅｔ　ｃｏｎｓｅｃｔｅｔｕｒ，　ａｄｉｐｉｓｉｃｉｎｇ　ｅｌｉｔ．　Ｉｐｓｕｍ　ｉｌｌｕｍ　ｓａｐｉｅｎｔｅ　ａｎｉｍｉ　ｈａｒｕｍ　ｑｕｉｓ　ｐｏｒｒｏ　ｉｕｓｔｏ　ｉｐｓａｍ　ｏｍｎｉｓ　ｄｏｌｏｒｅ，　
					ｒｅｐｅｌｌｅｎｄｕｓ　ｎｉｈｉｌ　ｓｉｎｔ　ｑｕｉ　ｌｉｂｅｒｏ　ｕｔ　ｆａｃｉｌｉｓ？　Ｃｏｍｍｏｄｉ　ｄｕｃｉｍｕｓ　ｎａｔｕｓ　ｏｆｆｉｃｉｉｓ．】</p>
			</div>
			<div class="col-lg-6 col-sm-12">
				<form method="POST" action="modules/scripts/login_query.php">
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
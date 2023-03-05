<section class="p-5 pM">
	<div class="container shadow">
		<?php
			if (isset($_GET['log'])) {
				include_once("modules/pages/loginPage/profileSelection.html");	
			}elseif (!isset($_POST['login'])) {
				include_once("modules/pages/loginPage/loginForm.html");	
			}
		?>
	</div>
</section>
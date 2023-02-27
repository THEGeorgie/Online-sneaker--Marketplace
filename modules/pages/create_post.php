<section class="p-5 pM">
	<div class="container shadow text-light">
		<form method="POST" action="save_post.php" name="createpost" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-4 col-lg-4"></div>
				<div class="col-sm-4 col-lg-4">
					<div class="form-floating ">
						<select class="form-select mt-3" aria-label="Default select example" name="brand"
							id="ControlTXT" required="required">
							<option value="Nike">【Ｎｉｋｅ】</option>
							<option value="Jordan">【Ｊｏｒｄａｎ】</option>
							<option value="Yeezy">【Ｙｅｅｚｙ】</option>
						</select>
						<label class=" text-center text-dark" for="">Select Brand</label>
					</div>
				</div>
				<div class="col-sm-4 col-lg-4"></div>
				<div class="col-sm-8 col-lg-8">
					<label for="formFileMultiple" class="form-label">Select image</label>
					<input class="form-control" type="file" name="image" required="required" />
					<!--accept="image/png, image/jpeg"-->
				</div>
				<div class="col-sm-4 col-lg-4 " id="modelTXT">
					<div class="bg-transparent form-floating mt-3">
						<input type="text" name="model" class="form-control" id="model" placeholder="name@example.com"
							required="required">
						<label for="floatingInput" class="text-dark">Model</label>
						<ul class="list-group"></ul>
					</div>
				</div>
				<div class="col-sm-6 col-lg-6">
					<div class="bg-transparent form-floating mt-3">
						<input type="text" name="colorCode" class="form-control" id="colorCode" placeholder="color code"
							required="required">
						<label for="floatingInput" class="text-dark">Color Code</label>
					</div>
				</div>
				<div class="col-sm-6 col-lg-6">
					<div class="form-floating">
						<select class="form-select mt-3" name="size" aria-label="Default select example"
							required="required">
							<option selected value="4">4</option>
							<option value="4.5">4.5</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="6.7">6.5</option>
							<option value="7">7</option>
							<option value="7.5">7.5</option>
							<option value="8">4.8</option>
							<option value="8.5">8.5</option>
							<option value="9">9</option>
							<option value="9.5">9.5</option>
							<option value="10">10</option>
							<option value="10.5">10.5</option>
							<option value="11">11</option>
							<option value="11.5">11.5</option>
							<option value="12">12</option>
						</select>
						<label class="text-center text-dark">Select Size</label>
					</div>
				</div>
				<div class="col-sm-4 col-lg-4"></div>
				<div class="col-sm-4 col-lg-4">
					<div class="input-group mt-3">
						<span class="input-group-text">euros</span>
						<input type="text" class="form-control" name="price"
							aria-label="Amount (to the nearest dollar)">
						<span class="input-group-text">.00</span>
					</div>
				</div>
				<div class="col-sm-4 col-lg-4 mt-3">
					<label for="">Releas Date</label>
					<input type="date" name="dateR" required="required">
				</div>
				<div class="col-sm-12 col-lg-12 text-center">

					<input type="submit" name="uplaodPost" value="【Ｓｕｂｍｉｔ】"
						class="btn btn-outline-light btn-block my-3">
				</div>
			</div>
		</form>
	</div>
</section>
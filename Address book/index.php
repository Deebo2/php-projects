<?php include('core/init.php'); ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="css/custom.css">
	<title>Ajax Address Book, world!</title>
</head>

<body>
	<div class="container border border-secondary rounded">
		<div class="row">
			<div class="col-lg-10">
				<h1>Ajax Address Book</h1>
			</div>

			<div class="col-lg-2">
				<button type="button" class="add_button btn btn-lg btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Contact</button>
				<!-- Modal -->
				<div class="modal fade addModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title" id="exampleModalLabel">Add Contact</h3>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">

								<form class="row g-3" id="addContact" method="post" action="#">
									<div class="col-md-6">
										<label for="firstname" class="form-label">First Name</label>
										<input type="text" id="firstname" name="first_name" class="form-control" placeholder="First name" aria-label="First name">
									</div>
									<div class="col-md-6">
										<label for="lastname" class="form-label">Last Name</label>
										<input type="text" id="lastname" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name">
									</div>
									<div class="col-md-4">
										<label for="inputEmail4" class="form-label">Email</label>
										<input type="email" name="email" class="form-control" id="inputEmail4">
									</div>
									<div class="col-md-4">
										<label for="phonenumber" class="form-label">Phone Number</label>
										<input type="text" name="phone" class="form-control" id="phonenumber">
									</div>
									<div class="col-md-4">
										<label for="contactgroup" class="form-label">Contact Group</label>
										<select id="contactgroup" name="contact_group" class="form-select">
											<option value="business">Business</option>
											<option value="family">Family</option>
											<option value="friends">Friends</option>
										</select>
									</div>
									<div class="col-6">
										<label for="inputAddress1" class="form-label">Address 1</label>
										<input type="text" class="form-control" name="address1" id="inputAddress1" placeholder="1234 Main St">
									</div>
									<div class="col-6">
										<label for="inputAddress2" class="form-label">Address 2</label>
										<input type="text" class="form-control" name="address2" id="inputAddress2" placeholder="Apartment, studio, or floor">
									</div>
									<div class="col-md-6">
										<label for="inputCity" class="form-label">City</label>
										<input type="text" name="city" class="form-control" id="inputCity">
									</div>
									<div class="col-md-4">
										<label for="inputState" class="form-label">State</label>
										<select id="inputState" name="state" class="form-select">
											<option selected>Select state</option>
											<?php foreach ($states as $key => $value) : ?>
												<option value="<?= $key; ?>">
													<?= $value; ?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-2">
										<label for="inputZip" class="form-label">Zip</label>
										<input type="text" name="zipcode" class="form-control" id="inputZip">
									</div>
									<div class="col-12">
										<label for="exampleFormControlTextarea1" class="form-label">Notes</label>
										<textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Optional Notes"></textarea>
									</div>
									<div class="col-12">
										<input type="submit" name="submit" class="btn btn-lg btn-outline-primary" data-bs-dismiss="modal" aria-label="Close" value="Add Contact">
									</div>
								</form>


							</div>

						</div>
					</div>
				</div>


			</div>
		</div>
		<!-- Loading Image -->
		<div id="loaderImage">
			<div class="spinner-grow text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
			<div class="spinner-grow text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
			<div class="spinner-grow text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
			<div class="spinner-grow text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>

		<!-- Main Content -->
		<div id="pageContent"></div>

	</div>






	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="js/script.js" crossorigin="anonymous"></script>

</body>

</html>
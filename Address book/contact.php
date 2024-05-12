<?php include('core/init.php'); ?>
<?php 
//Create db object
$db=new Database();
//Run query
$db->query("SELECT * FROM `contact`");
//Assign result set
$contacts=$db->resultset();
?>
<div class="row">
	<div class ="col-lg-12">
		<table class="table table-striped border-top">
		  <thead>
			<tr>
			  <th scope="col">Name</th>
			  <th scope="col">Phone</th>
			  <th scope="col">Email</th>
			  <th scope="col">Address</th>
			  <th scope="col">Group</th>
			  <th scope="col">Actions</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php foreach($contacts as $contact): ?>
			<tr>
			  <th><?= $contact->first_name; ?>,<?= $contact->last_name; ?></th>
			  <td><?= $contact->phone; ?></td>
			  <td><?= $contact->email; ?></td>
			  <td>
				<ul style="list-style-type:none;">
					<li><?= $contact->address1; ?></li>
					<li><?php  if($contact->address2) echo $contact->address2; ?></li>
				</ul>
			  </td>
			  <td><?= $contact->contact_group; ?></td>
			  <td>
				
				
				
			<!-- Modal -->
			
			<div class="modal fade editModal" id="editModal<?= $contact->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-xl">
				<div class="modal-content">
				  <div class="modal-header">
					<h3 class="modal-title" id="exampleModalLabel">Edit Contact</h3>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				  </div>
				  <div class="modal-body">
					
					<form class="row g-3" id="editContact" method="post" action="#">
							  <div class="col-md-6">
							  <label for="firstname" class="form-label">First Name</label>
							<input type="text" id="firstname" name="first_name" class="form-control" value="<?= $contact->first_name; ?>" placeholder="First name" aria-label="First name">
						  </div>
						  <div class="col-md-6">
						  <label for="lastname"  class="form-label">Last Name</label>
							<input type="text" id="lastname" name="last_name" class="form-control" placeholder="Last name" value="<?= $contact->last_name; ?>" aria-label="Last name">
						  </div>
						  <div class="col-md-4">
							<label for="inputEmail4" class="form-label">Email</label>
							<input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $contact->email; ?>">
						  </div>
						  <div class="col-md-4">
							<label for="phonenumber" class="form-label">Phone Number</label>
							<input type="text" name="phone" class="form-control" id="phonenumber" value="<?= $contact->phone; ?>">
						  </div>
						    <div class="col-md-4">
							<label for="contactgroup" class="form-label">Contact Group</label>
							<select id="contactgroup" name="contact_group" class="form-select">
							  <option value="business" <?php if($contact->contact_group == 'business'){ echo 'selected';}  ?>>Business</option>
							  <option value="family" <?php if($contact->contact_group == 'family'){ echo 'selected';}  ?>>Family</option>
							  <option value="friends" <?php if($contact->contact_group == 'friends'){ echo 'selected';}  ?>>Friends</option>
							</select>
						  </div>
						  <div class="col-6">
							<label for="inputAddress1" class="form-label">Address 1</label>
							<input type="text" class="form-control" name="address1" id="inputAddress1" value="<?= $contact->address1; ?>" placeholder="1234 Main St">
						  </div>
						  <div class="col-6">
							<label for="inputAddress2" class="form-label">Address 2</label>
							<input type="text" class="form-control" name="address2" id="inputAddress2" value="<?= $contact->address2; ?>" placeholder="Apartment, studio, or floor">
						  </div>
						  <div class="col-md-6">
							<label for="inputCity" class="form-label">City</label>
							<input type="text" name="city" value="<?= $contact->city; ?>" class="form-control" id="inputCity">
						  </div>
						  <div class="col-md-4">
							<label for="inputState" class="form-label">State</label>
							<select id="inputState" name="state" class="form-select">
							  <option selected>Select state</option>
							  <?php foreach($states as $key => $value): ?>
							  <option value="<?= $key; ?>" <?php if($key == $contact->state){echo 'selected'; } ?>>
							  <?= $value; ?>
							  </option>
							  <?php endforeach; ?>
							</select>
						  </div>
						  <div class="col-md-2">
							<label for="inputZip" class="form-label">Zip</label>
							<input type="text" name="zipcode" value="<?= $contact->zipcode; ?>" class="form-control" id="inputZip">
						  </div>
						  <div class="col-12">
							 <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
							<textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Optional Notes"><?= $contact->notes; ?></textarea>	
						  </div>
						  <div class="col-12">
						  <input type="hidden" name="id" value="<?= $contact->id; ?>" />
							<input type="submit" name="submit" class="btn btn-lg btn-outline-primary" role="button" data-bs-dismiss="modal" aria-label="Close" value="Edit Contact">
						  </div>
						</form>
					
				  </div>
				 
				</div>
			  </div>
			</div>
				
				
				
				 <div class="d-flex justify-content-between">
					<div>
					  <button type="button" class="btn btn-lg btn-primary " data-bs-toggle="modal" data-bs-target="#editModal<?= $contact->id; ?>">Edit</button>
					</div>
					<div>
						<form action="#" id="deleteContact" method="POST">
							<input type="hidden" name="id" value="<?= $contact->id; ?>" />
							<input type="submit" name="submit" class="btn btn-lg btn-danger" value="Delete">
						</form>
					</div>
				  </div>
				
			  </td>
			</tr>
			<?php endforeach; ?>
		  </tbody>
		</table>
	</div>
	</div>
	
<?php 
	include('header.php');
	include('sidebar.php');
?>

<div class="container-fluid">
	<div class="text-center text-primary py-3">
		<h2>Contact Details</h2>
	</div>
	<div class="my-2">
		<!-- Show error Message, if the slide did not inserted to dadabase -->
		<?php if(isset($_SESSION['contact_action'])) echo $_SESSION['contact_action']; unset($_SESSION['contact_action']);?>
	</div>
	<!-- add contact details in Database and get data from Database  -->
		<?php
		$query="select * from contact_details";
		$result=$conn->query($query);
		if(mysqli_num_rows($result)>0){
			$col=mysqli_fetch_array($result);
		?>
		
	<div id="add-slide" class="py-3">
		<form method="post" action="action/contact-us-action.php">
			<div class="form-group">
				<label for="title">Contact Section Title</label>
				<input class="form-control" type="text" id="title" name="title" value="<?php echo $col['title']; ?>" maxlength="150"/>
			</div>
			<div class="form-group">
				<label for="description">Contact Description <small>(Maximum character 500)</small></label>
				<textarea class="form-control text-justify" id="description" name="description" rows="4" maxlength="500"><?php echo $col['description']; ?></textarea>
			</div>
			<div class="bg-light">
				<h4 class="text-center text-success">Address</h4>
				<div class="form-group">
					<label for="address_title">Address Title</label>
					<input class="form-control" type="text" id="address_title" name="address_title" value="<?php echo $col['address_title']; ?>" maxlength="150"/>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="street">Street</label>
							<input class="form-control" type="text" name="street" id="street" value="<?php echo $col['street']; ?>" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="area">Area</label>
							<input class="form-control" type="text" name="area" id="area" value="<?php echo $col['area']; ?>" />	
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="zip">Zip Code</label>
							<input class="form-control" type="text" name="zip" id="zip" value="<?php echo $col['zip']; ?>" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="city">City</label>
							<input class="form-control" type="text" name="city" id="city" value="<?php echo $col['city']; ?>" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="state">State</label>
							<input class="form-control" type="text" name="state" id="state" value="<?php echo $col['state']; ?>" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="country">Country</label>
							<input class="form-control" type="text" name="country" id="country" value="<?php echo $col['country']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div>
				<h4 class="text-center text-success">Email</h4>
				<div class="form-group">
					<label for="email_title">Email Title</label>
					<input class="form-control" type="text" id="email_title" name="email_title" value="<?php echo $col['email_title']; ?>" maxlength="150"/>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="main_email">Email (Main)</label>
							<input class="form-control" type="text" name="main_email" id="main_email" value="<?php echo $col['main_email']; ?>" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="email2">Email 2</label>
							<input class="form-control" type="text" name="email2" id="email2" value="<?php echo $col['email2']; ?>" />	
						</div>
					</div>
				</div>
			</div>
			<div class="bg-light">
				<h4 class="text-center text-success">Phone</h4>
				<div class="form-group">
					<label for="phone_title">Phone Title</label>
					<input class="form-control" type="text" id="phpne_title" name="phone_title" value="<?php echo $col['phone_title']; ?>" maxlength="150"/>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="main_phone">Phone (Main)</label>
							<input class="form-control" type="text" name="main_phone" id="main_phone" value="<?php echo $col['main_phone']; ?>" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="phone2">Phone 2</label>
							<input class="form-control" type="text" name="phone2" id="phone2" value="<?php echo $col['phone2']; ?>" />	
						</div>
					</div>
				</div>
			</div>
			<div>
				<h4 class="text-center text-success">WhatsApp</h4>
				<div class="form-group">
					<label for="whatsapp_title">WhatsApp Title</label>
					<input class="form-control" type="text" id="whatsapp_title" name="whatsapp_title" value="<?php echo $col['whatsapp_title']; ?>" maxlength="150"/>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="main_whatsapp">WhatsApp (Main)</label>
							<input class="form-control" type="text" name="main_whatsapp" id="main_whatsapp" value="<?php echo $col['main_whatsapp']; ?>" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="whatsapp2">WhatsApp 2</label>
							<input class="form-control" type="text" name="whatsapp2" id="whatsapp2" value="<?php echo $col['whatsapp2']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="bg-light">
				<h4 class="text-center text-success">Skype</h4>
				<div class="form-group">
					<label for="skype_title">Skype Title</label>
					<input class="form-control" type="text" id="skype_title" name="skype_title" value="<?php echo $col['skype_title']; ?>" maxlength="150"/>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="main_skype">Skype (Main)</label>
							<input class="form-control" type="text" name="main_skype" id="main_skype" value="<?php echo $col['main_skype']; ?>" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="skype2">Skype 2</label>
							<input class="form-control" type="text" name="skype2" id="skype2" value="<?php echo $col['skype2']; ?>" />
						</div>
					</div>
				</div>
			</div>


			
			<div class="text-right">
				<button class="btn btn-success px-3" type="submit" name="save_contact">Save Change</button>
			</div>
		</form>
	</div>

<?php } ?>

</div>

<?php
	include('footer.php');
 ?>
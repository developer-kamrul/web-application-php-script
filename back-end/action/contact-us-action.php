<?php 
session_start();
include '../../global/db.php';

	if(isset($_POST['save_contact'])){
		$title=$_POST['title'];
		$description=$_POST['description'];
		$address_title=$_POST['address_title'];
		$street=$_POST['street'];
		$area=$_POST['area'];
		$zip=$_POST['zip'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$country=$_POST['country'];
		$email_title=$_POST['email_title'];
		$main_email=$_POST['main_email'];
		$email2=$_POST['email2'];
		$phone_title=$_POST['phone_title'];
		$main_phone=$_POST['main_phone'];
		$phone2=$_POST['phone2'];
		$whatsapp_title=$_POST['whatsapp_title'];
		$main_whatsapp=$_POST['main_whatsapp'];
		$whatsapp2=$_POST['whatsapp2'];
		$skype_title=$_POST['skype_title'];
		$main_skype=$_POST['main_skype'];
		$skype2=$_POST['skype2'];

		$query="update contact_details set title='$title', description='$description', address_title='$address_title', street='$street', area='$area', zip='$zip', city='$city', state='$state', country='$country', email_title='$email_title', main_email='$main_email', email2='$email2', phone_title='$phone_title', main_phone='$main_phone', phone2='$phone2', whatsapp_title='$whatsapp_title', main_whatsapp='$main_whatsapp', whatsapp2='$whatsapp2', skype_title='$skype_title', main_skype='$main_skype', skype2='$skype2' where id='1'";
		$result=$conn->query($query);
		if($result){
			// session to show success message
			$_SESSION['contact_action']='<h4 class="alert alert-success">Contact details has been updated</h4>';
			header('location: ../contact-us.php');
		}else{
			// session to show error message
			$_SESSION['contact_action']='<h4 class="alert alert-success">Have problem to save change</h4>';
			header('location: ../contact-us.php');
		}
	}
 ?>
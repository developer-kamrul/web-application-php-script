<?php 
session_start();
include '../../global/db.php';

	if(isset($_POST['add_links'])){
		$Anchor=$_POST['anchor_text'];
		$url=$_POST['anchor_url'];

		$query="insert into useful_links (`id`, `anchor_text`, `anchor_url`) values ('', '$Anchor', '$url')";
		$result=$conn->query($query);
		if($result){
			// session to show success message
			$_SESSION['useful_links']='<h4 class="alert alert-success">New Links added successfully</h4>';
			header('location: ../useful-links.php');
		}else{
			// session to show error message
			$_SESSION['useful_links']='<h4 class="alert alert-success">Have problem to add new Links</h4>';
			header('location: ../useful-links.php');
		}
	}
 ?>
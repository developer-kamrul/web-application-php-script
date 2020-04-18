<?php 
	include('header.php');
	include('sidebar.php');
	//for upload home background image
	$status='background';
	if(isset($_FILES['file-name'])){
	$a->FaviconImage($_FILES['file-name']['tmp_name'],$_FILES['file-name']['name'],$_FILES['file-name']['type'],$status);
}

//get picture path and picute name from database according to status
$picture=$a->SearchSingle("pictures","picture_name","status","$status");
if(is_file("uploads/$status/$picture")){
	$pics="uploads/$status/$picture";
}else
$pics="uploads/noimage.jpg";
?>

<div class="container p-5">
	<div class="text-center">
		<form name="fileuploadexample" method="post" enctype="multipart/form-data">
			<h2>Upload / Change Background Picture</h2>
			<p class="p-0 text-danger">(Picture must be 1920x1080px)</p>
			<div class="p-3">
				<img src="<?php echo $pics; ?>" class='img-responsive' width='300px;' height='200px;'/>
			</div>
			<div class="p-3">
				<input type="file" name="file-name"/>
			</div>
			<div class="p-3">
				<button type="submit" name="submit" class="btn btn-success py-2">Upload</button>
			</div>

		</form>		
	</div>
	

</div>




<?php
	include('footer.php');

 ?>
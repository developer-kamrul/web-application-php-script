<?php 
	include('header.php');
	include('sidebar.php');
	// for geting total number of Links
$query="select * from useful_links";
$result=$conn->query($query);
$All=mysqli_num_rows($result);

?>

<div class="container-fluid bg-light">
	<div class="text-center text-primary py-3">
		<h2>Useful Links</h2>
	</div>
	<div class="my-2">
		<!-- Show error Message, if the slide did not inserted to dadabase -->
		<?php if(isset($_SESSION['useful_links'])) echo $_SESSION['useful_links']; unset($_SESSION['useful_links']);?>
	</div>
	
		
	<div id="add-slide" class="p-2">
		<form method="post" action="action/useful-links-action.php">
			<div class="row">
				<div class="col-5">
					<div class="form-group">
						<label for="anchor_text">Anchor Text</label>
						<input class="form-control" type="text" name="anchor_text" id="anchor_text" />
					</div>
				</div>
				<div class="col-7">
					<div class="form-group">
						<label for="anchor_url">URL</label>
						<input class="form-control" type="text" name="anchor_url" id="anchor_url" />	
					</div>
				</div>
			</div>
			<div class="text-right">
				<button class="btn btn-success btn-sm" type="submit" name="add_links">Add Useful Links</button>
			</div>
		</form>
	</div>
<div class="text-center bg-white">
	<h4 class="text-center text-success pt-3 py-1">Total Links ( <?php echo $All; ?> )</h4>
	<div class="py-3">
			<table class="table table-striped">
				<tr class="row bg-secondary text-center align-middle text-white">
					<th class="col-1">Sl</th>
					<th class="col-4">Anchor Text</th>
					<th class="col-7">Anchor URL</th>
				</tr>
				<!-- to get all Slider from Dadabase in a table -->
				<?php
				$query="select * from useful_links";
				$result=$conn->query($query);
				$i='1';
				if(mysqli_num_rows($result)>0){
					while($col=mysqli_fetch_array($result)){
						?>
						<tr class="row">
							<td class="col-1 align-middle"><?php echo $i; ?>
							<!-- This form use for get slider id to delete -->
							<!-- <form method="post" action="">
								<input type="text" name="package-id" hidden="hidden" value="<?php echo $col['id']; ?>">
							</form> -->
							</td>
							<td class="col-4 text-left align-middle"><?php echo $col['anchor_text']; ?>
							<div class="pt-2">
								<!-- Action links or button to edit slider by using $_GET Method ( Query String ) -->
								<a class='text-primary' href="edit-package.php?package-id=<?php echo $col['package_id']; ?>" >Edit</a>&nbsp;
								<a class='text-danger' href="delete-package.php?package-id=<?php echo $col['package_id']; ?>" >Delete</a>
							</div>
							</td>
							<td class="col-7 align-middle text-justify">$<?php echo $col['anchor_url']; ?></td>
						</tr>
				<?php
				$i++;
			}
		}
		?>
	</table>
</div>
</div>



</div>

<?php
	include('footer.php');
 ?>
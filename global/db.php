<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "global";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// for uploading and get image name from database by using this class
class Database_Connect{
	public $db;
	function __construct(){
		$this->db=new mysqli('localhost','root','','global');
	}

// function for upload image
function FaviconImage($file1,$file2,$file3,$status,$table="pictures",$pk="status",$updatewhom="picture_name"){
					$page=$_SERVER['PHP_SELF'];
					if(is_uploaded_file($file1)){
						if($file3 !="image/jpeg" && $file3 !="image/png"){
							echo "<p> Images Must be Uploades in jpg or png Format </p>";
						}else{
							$loc="uploads/$status";
							if(!is_dir($loc)){
								mkdir("$loc");//if not exist make new directory and name=$status
								@closedir($loc);
							}
							$result= move_uploaded_file($file1, $loc."/".$file2);
							if($result==1){
								if($this->UpdateSingleColumn("$updatewhom",$file2,"$pk","$status","$table")=="1")
									echo "<meta http-equiv='refresh' content='0'>";
							}
							else
								echo "<p>There was a problem uploading the file.</p>";
						}
					}
				}

	// update picture name in the picture table at the time of uploading
	function UpdateSingleColumn($updatewhom,$updatevalue,$whereField,$whereValue,$table){
		$m=$this->db;
		$q2="update $table set $updatewhom='$updatevalue' where $whereField='$whereValue'";

		$r2=$m->query($q2);
		if($r2)
			return "1";
		else
			echo "Fault: $q2";
	}

	// get picute name from the picture table (database)
	function SearchSingle($table,$field,$whereField,$whereValue){
		$m=$this->db;
		$q3="select $field from $table where $whereField='$whereValue'";
		$r3=$m->query($q3, MYSQLI_STORE_RESULT);
		list($fieldvalue)=$r3->fetch_row();
		return $fieldvalue;
	}

}
// end image uploading class


 ?>

<?php 
session_start();
  include './global/db.php';
  //databse connection using class for images
  $a=new Database_Connect();

//get title from database
  $query="select id, title from site_title where id = '1'";
  $result =$conn->query($query);
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysqli_fetch_row($result);

$site_title= $row[1]; // the email value

//get favicon image from databse (picture name) according to status
$status='favicon';
$picture=$a->SearchSingle("pictures","picture_name","status","$status");
if(is_file("./back-end/uploads/$status/$picture")){
  $favicon="./back-end/uploads/$status/$picture";
}else
$favicon="./back-end/uploads/noimage.jpg";


//get background picture from databse (picture name) according to status
$status='background';
$picture=$a->SearchSingle("pictures","picture_name","status","$status");
if(is_file("./back-end/uploads/$status/$picture")){
  $background="./back-end/uploads/$status/$picture";
}else
$background="./back-end/uploads/noimage.jpg";

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $site_title; ?></title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons from database -->
  <link href="<?php echo $favicon; ?>" rel="icon">
<!--   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
 <?php

  echo '<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" >';
  echo '<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" type="text/css" >'; 

  echo '<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" type="text/css" >'; 

  echo '<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" type="text/css" >'; 

  echo '<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" >'; 

  echo '<link href="assets/vendor/aos/aos.css" rel="stylesheet" type="text/css" >'; ?>

  <!-- Template Main CSS File -->


  <?php echo '<link href="assets/css/style.css" rel="stylesheet" type="text/css" >'; ?>

<!-- This css uses for adding home background picture from database -->
<style type="text/css">
  #hero::after {
  content: '';
  position: absolute;
  left: 50%;
  top: 0;
  width: 130%;
  height: 95%;
  background: linear-gradient(to right, rgba(30, 67, 86, 0.8), rgba(30, 67, 86, 0.6)), url("<?php echo $background; ?>") center top no-repeat;
  z-index: 0;
  border-radius: 0 0 50% 50%;
  transform: translateX(-50%) rotate(0deg);
}
</style>

  <!-- =======================================================
  * Template Name: Moderna - v2.0.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span><?php echo $site_title; ?></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <!-- Nav bar start -->
       <nav class="nav-menu float-right d-none d-lg-block">
         <ul>
          <!-- get all menu from menu table -->
        <?php
        $query="select * from all_menu";
        $result=$conn->query($query);
        if(mysqli_num_rows($result)>0){
          while($col=mysqli_fetch_array($result)){
            ?>
          <li class="<?php if($col['status']=='submenu') echo 'drop-down'; ?>" ><a href="<?php echo $col['menu_url']; ?>"><?php echo $col['menu_name']; ?></a>
           <ul>
            <!-- get all sub menu from sub menu table according to menu name -->
          <?php 
          if($col['status']=='submenu'){
              $menu=$col['menu_name'];
              $sub_query="select * from sub_menu where menu_name='$menu'";
              $sub_result=$conn->query($sub_query);
              if(mysqli_num_rows($sub_result)>0){
                while($sub_col=mysqli_fetch_array($sub_result)){
                  ?>
              <li><a href="<?php echo $sub_col['submenu_url']; ?>"><?php echo $sub_col['submenu_name']; ?></a></li>

            <?php } } } ?>
             </ul>
            </li>         
          
        <?php } } ?>
        </ul>
      </nav>
      <!--  end nav bar -->



    </div>
  </header><!-- End Header
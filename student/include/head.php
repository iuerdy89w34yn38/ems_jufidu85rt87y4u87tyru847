  <?php 
session_start();
if(!isset($_SESSION['studentid'])){
	header("location:../studentlogin.php");
}
// Store Session Data
 $username= $_SESSION['studentid'];  // Initializing Session with value of PHP Variable 
 ?>



 <?php include"../include/connect.php";?>




<?php

$rows =mysqli_query($con,"SELECT * FROM student WHERE id=$username " ) or die(mysqli_error($con));
while($row=mysqli_fetch_array($rows)){

    $stdid = $row['id'];       
    $stdname = $row['name'];       
    $stdclass = $row['classid'];       
    $stdemail = $row['email'];       
    $stdphone = $row['phone'];       
    $stdpic = $row['img'];  
}


$rows =mysqli_query($con,"SELECT * FROM contact " ) or die(mysqli_error($con));


while($row=mysqli_fetch_array($rows)){

  $sitename = $row['sitename'];  
  $sitelogo = $row['logo'];  
  $sitephone = $row['phone'];  
  $sitemail = $row['email'];  
  $siteaddress = $row['address'];  
  $gmaps = $row['gmaps'];  
  $fpost = $row['fpost'];  
  $facebook = $row['facebook'];  
  $twitter = $row['twitter'];  
  $insta = $row['insta'];  
  $youtube = $row['youtube'];  

}

?>


<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">



<link href="stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/hightop-font.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/bootstrap-editable.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/social-buttons.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
<link href="stylesheets/dropzone.css" media="screen" rel="stylesheet" type="text/css" />
<link href="stylesheets/nestable.css" media="screen" rel="stylesheet" type="text/css" />
<link href="stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
<link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />

<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

<link rel="stylesheet" href="../plugins/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="newadmin/menu.css">
<link href="custom.css" media="all" rel="stylesheet" type="text/css" />

<style type="text/css">
  li.current>a{
    color:red  !important;
  }
</style>
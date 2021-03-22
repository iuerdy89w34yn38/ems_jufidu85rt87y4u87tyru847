<?php include 'include/connect.php'; ?>


<?php 
session_start();
if(isset($_SESSION['actid'])){
 $actid= $_SESSION['actid'];  // Initializing Session with value of PHP Variable 
  $rows =mysqli_query($con,"SELECT * FROM users where id='$actid'" ) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($rows)){
    $actname = $row['name'];       
    $actemail = $row['email'];       
    $actpic = $row['img'];       

  }
}

// Store Session Data

 ?>
 <?php 

  if(isset($_POST['addcart'])){

    if(empty($actid)){
      header ("location:login.php?proid=".$_POST['addcart']);
    }

      $msg="Unsuccessful" ;
      
       $pid=$_POST['addcart'];
       $qty=$_POST['qty'];

       if(empty($size)) $size="";
       if(!empty($_POST['size'])) $size=$_POST['size'];

       $status='cart';

         $rows =mysqli_query($con,"SELECT price FROM product where id='$pid'" ) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($rows)){
          $price = $row['price'];       }


         $rows =mysqli_query($con,"SELECT id,qty,size FROM shop where pid='$pid' AND size='$size' AND status='$status' AND actid='$actid'" ) or die(mysqli_error($con));
        $n=0;

        while($row=mysqli_fetch_array($rows)){

          $eid = $row['id']; 
          $eqty = $row['qty']; 

          $qty=$eqty+$qty;


          $sql = "UPDATE shop SET `qty` = '$qty' WHERE `id` =$eid";
          mysqli_query($con, $sql) ;

      }

      if(empty($eid)){
       
  $data=mysqli_query($con,"INSERT INTO shop (pid,actid,price,qty,size,status)VALUES ('$pid','$actid','$price','$qty','$size','$status')")or die( mysqli_error($con) ); 
}
  $msg="Added to Cart" ;

  }

?>

<?php 

    if(isset($_POST['confirm'])){
      $msg="Unsuccessful" ;

      $pdate = date('Y-m-d');
      $sql = "UPDATE shop SET `status` = 'pending', `pdate` = '$pdate' WHERE `actid` = '$actid' AND status='cart' ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

      header ("location:done.php");
      

    }
 ?>


<?php 



  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['upcart'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['upcart'.$i];
      $qty=$_POST['qty'.$i];

      $sql = "UPDATE shop SET `qty` = '$qty' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

    }

  }

 ?>

<?php 


  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['rem'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['rem'.$i];
  
      $sql = "DELETE FROM shop WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Deleted";

    }

  }


 ?>


<!-- update Address  -->

<?php 
  if (isset($_POST['submitaddress'])) {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $shipping_firstname = $_POST['shipping_firstname'];
    $shipping_lastname = $_POST['shipping_lastname'];
    $shipping_address1 = $_POST['shipping_address1'];
    $shipping_address2 = $_POST['shipping_address2'];
    $shipping_city = $_POST['shipping_city'];
    $shipping_postalcode = $_POST['shipping_postalcode'];
    $shipping_phone = $_POST['shipping_phone'];
    $shipping_email = $_POST['shipping_email'];
    $status="cart";
    
    $desp1 = $_POST['inst'];
    $desp = str_replace("'", "", $desp1);       //Replace String with nothing
    
      
      $sql = "UPDATE `users` SET `bfname`='$firstname',`blname`='$lastname',`bpostal`='$postalcode',`baddress1`='$address1',`baddress2`='$address2',`bcity`='$city',`bmobile`='$phone',`bemail`='$email',`sfname`='$shipping_firstname',`slname`='$shipping_lastname',`spostal`='$shipping_postalcode',`saddress1`='$shipping_address1',`saddress2`='$shipping_address2',`scity`='$shipping_city',`smobile`='$shipping_phone',`semail`='$shipping_email',`inst`='$desp' WHERE id='$actid' "  ;
    mysqli_query($con, $sql)or die(mysqli_error($con));
   

      $sql = "UPDATE `shop` SET `bfname`='$firstname',`blname`='$lastname',`bpostal`='$postalcode',`baddress1`='$address1',`baddress2`='$address2',`bcity`='$city',`bmobile`='$phone',`bemail`='$email',`sfname`='$shipping_firstname',`slname`='$shipping_lastname',`spostal`='$shipping_postalcode',`saddress1`='$shipping_address1',`saddress2`='$shipping_address2',`scity`='$shipping_city',`smobile`='$shipping_phone',`semail`='$shipping_email',`inst`='$desp',`status`='$status' WHERE status='cart' AND actid='$actid' "  ;

    mysqli_query($con, $sql)or die(mysqli_error($con));
    echo $msg= "Update Successful";
      
      header ("location:confirm.php");


    
  }

?>  





<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=actid-width, initial-scale=1">




<!-- PLUGINS CSS STYLE -->
<link rel="icon" type="image/png" href="images/logo.png">
<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="plugins/selectbox/select_option1.css">
<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="plugins/flexslider/flexslider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/zoomslider.css" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>

<link rel="stylesheet" href="plugins/calender/fullcalendar.min.css">
<link rel="stylesheet" href="plugins/animate.css">
<link rel="stylesheet" href="plugins/pop-up/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="plugins/rs-plugin/css/settings.css" media="screen">
<link rel="stylesheet" type="text/css" href="plugins/owl-carousel/owl.carousel.css" media="screen">

<!-- CUSTOM CSS -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/theme-1.css">
<link rel="stylesheet" href="css/default.css" id="option_color">

<link rel="stylesheet" href="css/custom.css">

<?php

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


function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}

?>


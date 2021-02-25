<html>
<head>

  <?php include('include/head.php') ?>
  <title>
    Search All Users
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['user_name'])) $page = $_GET['user_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'users' ?>

<?php 

  if(isset($_POST['savepro'])){
    $msg="Unsuccessful" ;

    $id=$_POST['savepro'];
    $name=$_POST['newactname'];
    $actemail=$_POST['newactemail'];
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
    $newpassword=$_POST['newactpass'];


    if (!empty($_FILES['img']['name'])) {

        // Get image name
      $image = $_FILES['img']['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "images/users/".basename($image);

      $data=mysqli_query($con,"UPDATE users SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }      

      }



      if (!empty($newpassword)){

      $sql = "UPDATE users SET `password` = '$newpassword' WHERE  `id`='$id' ";
      mysqli_query($con, $sql) ;


    }

      $sql = "UPDATE users SET `name` = '$name',`email` = '$actemail', `bfname`='$firstname',`blname`='$lastname',`bpostal`='$postalcode',`baddress1`='$address1',`baddress2`='$address2',`bcity`='$city',`bmobile`='$phone',`bemail`='$email',`sfname`='$shipping_firstname',`slname`='$shipping_lastname',`spostal`='$shipping_postalcode',`saddress1`='$shipping_address1',`saddress2`='$shipping_address2',`scity`='$shipping_city',`smobile`='$shipping_phone',`semail`='$shipping_email'  WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

      
    }
  ?>
<?php 

  if(isset($_POST['block'])){
    $msg="Unsuccessful" ;

    $id=$_POST['block'];
    $blockres=$_POST['blockres'];


      $sql = "UPDATE users SET `block` = '1',`blockres` = '$blockres'  WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Blocked";

      
    }
  ?>

<?php 

  if(isset($_POST['unblock'])){
    $msg="Unsuccessful" ;

    $id=$_POST['unblock'];



      $sql = "UPDATE users SET `block` = '0',`blockres` = ''  WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Unblocked";

      
    }
  ?>

<?php 

  if(isset($_POST['deluser'])){
    $msg="Unsuccessful" ;

    $id=$_POST['deluser'];



      $sql = "DELETE FROM users  WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Unblocked";
header("location:users"); // Redirecting To Other Page

      
    }
  ?>


  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />

</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
    
  
    <?php if (!empty($page)) {

      ?>
                                <form method="post" action="" enctype="multipart/form-data">

      <div class="container-fluid main-content">
        <div class="row">
          <!-- Basic Table -->
          <div class="col-lg-1">
          </div>
          <div class="col-lg-10">
            <div class="widget-container fluid-height clearfix overflow">


      <?php

      $rows =mysqli_query($con,"SELECT * FROM users WHERE id ='$page'" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

    $actid = $row['id'];       
    $actname = $row['name'];       
    $actemail = $row['email'];       
    $actpic = $row['img']; 

        $bfirstname = $row['bfname'];
        $blastname = $row['blname'];
        $bpostalcode = $row['bpostal'];
        $baddress1 = $row['baddress1'];
        $baddress2 = $row['baddress2'];
        $bcity = $row['bcity'];
        $bphone = $row['bmobile'];
        $bemail = $row['bemail'];
        $sfirstname = $row['sfname'];
        $slastname = $row['slname'];
        $spostalcode = $row['spostal'];
        $saddress1 = $row['saddress1'];
        $saddress2 = $row['saddress2'];
        $scity = $row['scity'];
        $sphone = $row['smobile'];
        $semail = $row['semail'];


        $block = $row['block'];
        $blockres = $row['blockres'];

      }

      ?>


  
        <div class="col-md-12">

          <br>
          <h2>User Details: </h2>

          <br>

          <div class="row">


            <div class="col-md-12 text-center">
              <img src="../images/users/<?php echo $actpic ?>" style="width: 200px">
              <br>
              <br>
              <center>
              <input type="file" name="img">
                
              </center>
             </div>


           </div>
          <br>

          <div class="row">

            <div class="col-md-1 text-right">Name: </div>
            <div class="col-md-3">
              <input type="text" name="newactname" value="<?php echo $actname ?>" class="form-control">
             </div>

            <div class="col-md-1 text-right">E-mail: </div>
            <div class="col-md-3">
              <input type="text" name="newactemail" value="<?php echo $actemail ?>" class="form-control">
             </div>

            <div class="col-md-1 text-right">Password: </div>
            <div class="col-md-3">
              <input  autocomplete="off" type="password" name="newactpass" value="<?php echo $actemail ?>" class="form-control">
             </div>
           </div>
             <br>
             <br>
             <br>




  

        <div class="section row text-center" style="padding: 36px 60px 1px 60px; display: none">



         <div class="col-md-6"> 

          <h2>Billing Details</h2>
          <br><br>


          <div class="col-md-6">     

           First Name:
           <input type="text" value="<?php if(!empty($bfirstname)) echo $bfirstname ; ?>" class="form-control myform" id="fname" name="firstname">

         </div>
         <div class="col-md-6"> 

           Last Name:
           <input type="text" value="<?php if(!empty($blastname)) echo $blastname ; ?>" class="form-control myform" id="lname" name="lastname">

         </div>

         <div class="col-md-6"> 
          Address Line 1:
          <input type="text" value="<?php if(!empty($baddress1)) echo $baddress1 ; ?>" class="form-control myform" id="address1" name="address1">

        </div>
        <div class="col-md-6"> 

          Address Line 2:
          <input type="text" value="<?php if(!empty($baddress2)) echo $baddress2 ; ?>" class="form-control myform" id="address2" name="address2">

        </div>


        <div class="col-md-8"> 
          City:
          <select style="border:solid 1px;" class="form-control myform" id="city" name="city">
           <?php if(!empty($bcity)) { ?><option value="<?php echo $bcity ;?>"><?php echo $bcity ;?></option><?php } ?>

           <!-- get single row data from database -->

           <?php

           $rows =mysqli_query($con,"SELECT * FROM cities" ) or die(mysqli_error($con));

           while($row=mysqli_fetch_array($rows)){

            $city = $row['city'];

            ?>


            <option value="<?php echo $city ;?>"><?php echo $city ;?></option>

          <?php } ?>
        </select>


      </div>

      <div class="col-md-4"> 
        Postal Code:
        <input type="text" value="<?php if(!empty($bpostalcode)) echo $bpostalcode ; ?>" class="form-control myform" id="postal" name="postalcode">

      </div>

      <div class="col-md-6">     

       Phone:
       <input type="text" value="<?php if(!empty($bphone)) echo $bphone ; ?>" class="form-control myform" id="phone" name="phone">

     </div>
     <div class="col-md-6"> 

       Email:
       <input type="text" value="<?php if(!empty($bemail)) echo $bemail ; ?>" class="form-control myform" id="email" name="email">

     </div>

     <br>
    
   </div>

   <div class="col-md-6"> 

    <h2>Shipping Details</h2>
    <br><br>


    <div class="col-md-6">     

     First Name:
     <input type="text" value="<?php if(!empty($sfirstname)) echo $sfirstname ; ?>" class="form-control myform" id="shipping_fname" name="shipping_firstname">

   </div>
   <div class="col-md-6"> 

     Last Name:
     <input type="text" value="<?php if(!empty($slastname)) echo $slastname ; ?>" class="form-control myform" id="shipping_lname" name="shipping_lastname">

   </div>

   <div class="col-md-6"> 
    Address Line 1:
    <input type="text" value="<?php if(!empty($saddress1)) echo $saddress1 ; ?>" class="form-control myform" id="shipping_address1" name="shipping_address1">

  </div>
  <div class="col-md-6"> 

    Address Line 2:
    <input type="text" value="<?php if(!empty($saddress2)) echo $saddress2 ; ?>" class="form-control myform" id="shipping_address2" name="shipping_address2">

  </div>


  <div class="col-md-8"> 
    City:
    <select style="border:solid 1px;" class="form-control myform" id="shipping_city" name="shipping_city">
     <?php if(!empty($scity)) { ?><option value="<?php echo $scity ;?>"><?php echo $scity ;?></option><?php } ?>
     <!-- get single row data from database -->

     <?php

     $rows =mysqli_query($con,"SELECT * FROM cities" ) or die(mysqli_error($con));

     while($row=mysqli_fetch_array($rows)){

      $city = $row['city'];

      ?>


      <option value="<?php echo $city ;?>"><?php echo $city ;?></option>

    <?php } ?>
  </select>


</div>

<div class="col-md-4"> 
  Postal Code:
  <input type="text" value="<?php if(!empty($spostalcode)) echo $spostalcode ; ?>" class="form-control myform" id="shipping_postal" name="shipping_postalcode">

</div>

<div class="col-md-6">     

 Phone:
 <input type="text" value="<?php if(!empty($sphone)) echo $sphone ; ?>" class="form-control myform" id="shipping_phone" name="shipping_phone">

</div>
<div class="col-md-6"> 

 Email:
 <input type="text" value="<?php if(!empty($semail)) echo $semail ; ?>" class="form-control myform" id="shipping_email" name="shipping_email">

</div>


</div>



</div>



<div class="row" style="padding-bottom:25px">
  <div class="col-md-2">
  </div>
  <div class="col-md-8 text-center">

  <button class="btn btn-primary" name="savepro" value="<?php echo $actid ?>">Save <i class="fa fa-save"></i> </button>


</div>
</div>

</form>
<br><hr><br>


                                <form method="post" action="" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-2">
    Block User Reason:
  </div>
  <div class="col-md-4">
    <input type="text" value="<?php echo $blockres ?>" name="blockres" class="form-control">
  </div>
  <div class="col-md-2">
    <?php if($block==0){ ?>
  <button class="btn btn-danger" name="block" value="<?php echo $actid ?>">Block User <i class="fa fa-user-lock"></i> </button>
<?php }else{ ?>
  <button class="btn btn-success" name="unblock" value="<?php echo $actid ?>">Unblock User <i class="fa fa-user-check"></i> </button>
<?php } ?>

  </div>
</div>

<br><hr><br>


                                <form method="post" action="" enctype="multipart/form-data">
<div class="row">
  <div class="col-md-12 text-center">

  <button class="btn btn-danger" name="deluser" value="<?php echo $actid ?>">Delete User <i class="fa fa-user-times"></i> </button>

  </div>
</div>



        </div>
      </div>
            
</div>
</div>
</div>

<?php } ?>

<div class="">
  <div class="row">
    <!-- Basic Table -->

    <div class="col-md-12">
      <div class="widget-container fluid-height clearfix overflow">
        <div class="heading">
          <i class="fa fa-users"></i>View, Seacrch or Export the Users.
        </div>
        <div class="widget-content padded clearfix">
          <table class="table "  id="example" >
            <thead>
             <tr>
              <td>User ID#</td>
              <td>Name</td>
              <td>Email </td>
              <td>Image</td>
              <td>Phone</td>
              <td>Block</td>
              <td>Date Created </td>

            </tr>
          </thead>
          <tbody>

            <?php 
           
    $rows =mysqli_query($con,"SELECT * FROM users" ) or die(mysqli_error($con));
          
  while($row=mysqli_fetch_array($rows)){
    $actid = $row['id'];       
    $actname = $row['name'];       
    $actemail = $row['email'];       
    $actpic = $row['img']; 

    $bfirstname = $row['bfname'];
    $blastname = $row['blname'];
    $bpostalcode = $row['bpostal'];
    $baddress1 = $row['baddress1'];
    $baddress2 = $row['baddress2'];
    $bcity = $row['bcity'];
    $bcountry = $row['bcountry'];
    $bphone = $row['bmobile'];
    $bemail = $row['bemail'];
    $sfirstname = $row['sfname'];
    $slastname = $row['slname'];
    $spostalcode = $row['spostal'];
    $saddress1 = $row['saddress1'];
    $saddress2 = $row['saddress2'];
    $scity = $row['scity'];
    $scountry = $row['scountry'];
    $sphone = $row['smobile'];
    $semail = $row['semail'];
    $datec = $row['datec'];
    

        $block = $row['block'];
        $blockres = $row['blockres'];


                ?>

                <tr style="<?php if($block==1)echo "background: #ff000050"; ?> " class="orow" onclick="window.location='users-<?php echo $actid ?>'">

                  <td>
                   <?php echo $actid ?> 
                 </td>
                 <td> <?php echo $actname ?> </td>
                 <td> <?php echo $actemail ?> </td>
                 <td><img src="../images/users/<?php echo $actpic ?>" class="minicartimg"></td>


                 <td><?php echo $bphone ?></td>
                 <td>
                  <?php if($block==0) echo "No"; else echo "Yes"; ?>
                    
                  </td>

                 <td><?php echo $datec ?></td>
               
               

              </tr>

            <?php }  ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
</div>

<div class="space"></div>



</div>
</div>




<?php include('include/footer.php') ?>


<?php include('include/dtfooter.php') ?>



</body>
</html>
<html>
<head>

  <?php include('include/head.php') ?>
  <title>
    Search All editor
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['editor_name'])) $page = $_GET['editor_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'editors' ?>

<?php 

  if(isset($_POST['addpro'])){
    $msg="Unsuccessful" ;

    $id=$_POST['addpro'];
    $name = $_POST['newactname'];
    $phone = $_POST['newactphone'];
    $email = $_POST['newactemail'];
    $password = $_POST['newactpass'];


       // Get image name
       $image = $_FILES['img']['name'];
       $image = md5(uniqid())  . "1.png";
       
       // image file directory
       $target = "../images/editors/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }

    $data=mysqli_query($con,"INSERT INTO editor (name,phone,email,img,password)VALUES ('$name','$phone','$email','$image','$password')")or die( mysqli_error($con) );
         $msg = "Added successfully";

  }



?>


<?php 

  if(isset($_POST['savepro'])){
    $msg="Unsuccessful" ;

    $id=$_POST['savepro'];
    $name = $_POST['newactname'];
    $phone = $_POST['newactphone'];
    $email = $_POST['newactemail'];



    if (!empty($_FILES['img']['name'])) {

        // Get image name
      $image = $_FILES['img']['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "../images/editors/".basename($image);

      $data=mysqli_query($con,"UPDATE editor SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }      

      }



      if (!empty($newpassword)){

      $sql = "UPDATE editor SET `password` = '$newpassword' WHERE  `id`='$id' ";
      mysqli_query($con, $sql) ;


    }

      $sql = "UPDATE editor SET `name` = '$name',`phone` = '$phone',`email` = '$email' WHERE  `id`='$id' " ;


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


      $sql = "UPDATE editor SET `block` = '1',`blockres` = '$blockres'  WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Blocked";

      
    }
  ?>

<?php 

  if(isset($_POST['unblock'])){
    $msg="Unsuccessful" ;

    $id=$_POST['unblock'];



      $sql = "UPDATE editor SET `block` = '0',`blockres` = ''  WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Unblocked";

      
    }
  ?>

<?php 

  if(isset($_POST['deluser'])){
    $msg="Unsuccessful" ;

    $id=$_POST['deluser'];



      $sql = "DELETE FROM editor  WHERE  `id`='$id' " ;


      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Unblocked";
header("location:editors"); // Redirecting To Other Page

      
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

      $rows =mysqli_query($con,"SELECT * FROM editor WHERE id ='$page'" ) or die(mysqli_error($con));

      while($row=mysqli_fetch_array($rows)){

    $actid = $row['id'];       
    $actname = $row['name'];       
    $actemail = $row['email'];       
    $actphone = $row['phone'];       
    $actpic = $row['img']; 

      


        $block = $row['block'];
        $blockres = $row['blockres'];

      }

      ?>


  
        <div class="col-md-12">

          <br>
          <h2>editor Details: </h2>

          <br>

          <div class="row">


            <div class="col-md-12 text-center">
              <img src="../images/editors/<?php echo $actpic ?>" style="width: 200px">
              <br>
              <br>
              <center>
              <input type="file" name="img">
                
              </center>
             </div>


           </div>
          <br>

          <div class="row">

            <div class="col-md-1 text-right"></div>
            <div class="col-md-1 text-right">Name: </div>
            <div class="col-md-7">
              <input type="text" name="newactname" value="<?php echo $actname ?>" class="form-control">
             </div>
           </div>
          <div class="row">

            <div class="col-md-1 text-right"></div>

            <div class="col-md-1 text-right">E-mail: </div>
            <div class="col-md-7">
              <input type="text" name="newactemail" value="<?php echo $actemail ?>" class="form-control">
             </div>
  </div>
          <div class="row">

            <div class="col-md-1 text-right"></div>

            <div class="col-md-1 text-right">Phone: </div>
            <div class="col-md-7">
              <input type="text" name="newactphone" value="<?php echo $actphone ?>" class="form-control">
             </div>
  </div>

          <div class="row">
            <div class="col-md-1 text-right"></div>
           
            <div class="col-md-1 text-right">Password: </div>
            <div class="col-md-7">
              <input  autocomplete="off" type="password" name="newactpass" value="" class="form-control">
             </div>
           </div>
             <br>
             <br>
             <br>




  

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

  <button class="btn btn-danger" name="deluser" value="<?php echo $actid ?>">Delete editor <i class="fa fa-user-times"></i> </button>

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
          <i class="fa fa-editor"></i>View, Seacrch or Export the editor.
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
           
    $rows =mysqli_query($con,"SELECT * FROM editor" ) or die(mysqli_error($con));
          
  while($row=mysqli_fetch_array($rows)){
    $actid = $row['id'];       
    $actname = $row['name'];       
    $actemail = $row['email'];       
    $actpic = $row['img']; 
    $actphone = $row['phone']; 
    $datec = $row['created_at']; 

    

        $block = $row['block'];
        $blockres = $row['blockres'];


                ?>

                <tr style="<?php if($block==1)echo "background: #ff000050"; ?> " class="orow" onclick="window.location='editors-<?php echo $actid ?>'">

                  <td>
                   <?php echo $actid ?> 
                 </td>
                 <td> <?php echo $actname ?> </td>
                 <td> <?php echo $actemail ?> </td>
                 <td><img src="../images/editors/<?php echo $actpic ?>" class="minicartimg"></td>


                 <td><?php echo $actphone ?></td>
                 <td>
                  <?php if($block==0) echo "No"; else echo "Yes"; ?>
                    
                  </td>

                 <td><?php echo $datec ?></td>
               
               

              </tr>

            <?php }  ?>
          </tbody>

        </table>
      </div>

      <div class="text-center">
        
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add New Editor
                      </button>
                      <br>
                      <br>
      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New Editor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               


        <div class="col-md-12">

          <br>
          <h2>New Editor Details: </h2>

          <br>

         


          <div class="row">

            <div class="col-md-2 text-right">User Image: </div>
            <div class="col-md-9">
              <input type="file" name="img">
             </div>
           </div>
          <div class="row">

            <div class="col-md-1 text-right"></div>
            <div class="col-md-1 text-right">Name: </div>
            <div class="col-md-9">
              <input type="text" name="newactname" value="" class="form-control">
             </div>
           </div>
          <div class="row">

            <div class="col-md-1 text-right"></div>

            <div class="col-md-1 text-right">E-mail: </div>
            <div class="col-md-9">
              <input type="text" name="newactemail" value="" class="form-control">
             </div>
  </div>
          <div class="row">

            <div class="col-md-1 text-right"></div>

            <div class="col-md-1 text-right">Phone: </div>
            <div class="col-md-9">
              <input type="text" name="newactphone" value="" class="form-control">
             </div>
  </div>

          <div class="row">
            <div class="col-md-1 text-right"></div>
           
            <div class="col-md-1 text-right">Password: </div>
            <div class="col-md-9">
              <input  autocomplete="off" type="password" name="newactpass" value="" class="form-control">
             </div>
           </div>



                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                              <button type="submit" name="addpro" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
                            </div>
                          </div>
                        </div>

                                </form>
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
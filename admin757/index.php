<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Dashboard
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];


      if (!empty($_FILES['img'.$i]['name'])) {

        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/slider/".basename($image);

        $data=mysqli_query($con,"UPDATE slider SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE slider SET `name` = '$name',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];

      $sql = "DELETE FROM slider WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Slide Deleted";



    }

  }




  if(isset($_POST['addcat'])){

    $msg="Unsuccessful" ;

    $name=$_POST['newname'];
    $ordr=$_POST['newordr'];



       // Get image name
    $image = $_FILES['img']['name'];
    $image = md5(uniqid())  . "1.png";

       // image file directory
    $target = "../images/slider/".basename($image);


    if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
     $msg = "Image uploaded successfully";
   }else{
     $msg = "Failed to upload image";
   }


   $data=mysqli_query($con,"INSERT INTO slider (name,img,ordr)VALUES ('$name','$image','$ordr')")or die( mysqli_error($con) );

   $msg="Slide Added" ;


 }




 for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['savecatf'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['savecatf'.$i];
    $name=$_POST['name'.$i];
    $desp1=$_POST['desp'.$i];
    $ordr=$_POST['ordr'.$i];

    $desp = str_replace("'", "''", $desp1);   

    if (!empty($_FILES['img'.$i]['name'])) {

        // Get image name
      $image = $_FILES['img'.$i]['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "../images/slider/".basename($image);

      $data=mysqli_query($con,"UPDATE field SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }



    $sql = "UPDATE field SET `name` = '$name',`ordr` = '$ordr',`desp` = '$desp' WHERE `id` =$id";

    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Updated";



  }

}



for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['delcatf'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['delcatf'.$i];

    $sql = "DELETE FROM field WHERE id=$id ";

    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Field Deleted";



  }

}




if(isset($_POST['addcatf'])){

  $msg="Unsuccessful" ;

  $name=$_POST['newname'];
  $desp1=$_POST['newdesp'];
  $ordr=$_POST['newordr'];

  $desp = str_replace("'", "''", $desp1);   


       // Get image name
  $image = $_FILES['img']['name'];
  $image = md5(uniqid())  . "1.png";

       // image file directory
  $target = "../images/slider/".basename($image);


  if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
   $msg = "Image uploaded successfully";
 }else{
   $msg = "Failed to upload image";
 }


 $data=mysqli_query($con,"INSERT INTO field (name,img,ordr,desp)VALUES ('$name','$image','$ordr','$desp')")or die( mysqli_error($con) );

 $msg="Field Added" ;


}




?>



<?php
if(isset($_POST['submitpost'])){
  $msg="Unsuccessful" ;



  $post=$_POST['editor1'];



  if (!empty($_FILES['image1']['name'])) {

            // Get image name
    $image = $_FILES['image1']['name'];
    $image = md5(uniqid())  . "1.png";

            // image file directory
    $target = "../images/".basename($image);

    $data=mysqli_query($con,"UPDATE home SET `img`='$image' where `id`=1")or die( mysqli_error($con) );

    if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }


  }


  $sql = "UPDATE home SET `post` = '$post' WHERE `id` =1";




  mysqli_query($con, $sql) ;
  ($msg=mysqli_error($con));
  if(empty($msg))  $msg="Saved";


}
?>


<?php
if(isset($_POST['submitvid'])){
  $msg="Unsuccessful" ;



  $vidpost=$_POST['editor2'];
  $vid=$_POST['vid'];



  if (!empty($_FILES['image1']['name'])) {

            // Get image name
    $image = $_FILES['image1']['name'];
    $image = md5(uniqid())  . "1.png";

            // image file directory
    $target = "../images/".basename($image);

    $data=mysqli_query($con,"UPDATE home SET `vidimg`='$image' where `id`=1")or die( mysqli_error($con) );

    if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }


  }


  $sql = "UPDATE home SET `vid` = '$vid',`vidpost` = '$vidpost' WHERE `id` =1";




  mysqli_query($con, $sql) ;
  ($msg=mysqli_error($con));
  if(empty($msg))  $msg="Saved";


}
?>

</head>
<body onload="showtoast()" class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">


    <?php include('include/header.php') ?>






    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-images"></i> Slider
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Title 
                 </th>

                 <th>
                  Image
                </th>
                <th>
                  New Image
                </th>
                <th style="max-width: 60px;">
                  Order
                </th>



                <th class="hidden-xs">
                  Save
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM slider  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $name = $row['name']; 
                  $img = $row['img']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 


                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>

                      <td>
                        <img src="../images/slider/<?php echo $img ?>" style="max-height: 50px" ?>
                      </td>
                      <td>
                        <input  id="ccatimg1"  type="file" name="img<?php echo $n ?>">
                      </td>

                      <td  style="max-width: 60px;">
                        <input required="" type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>




                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-alt"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>


                  <tr>
                    <td colspan="5" class="text-center">


                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add New Slide
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Slide</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table>


                                  <tr>
                                    <td>
                                      Slide Name:
                                    </td>
                                    <td>
                                      <input type="text" class="form-control" name="newname" value="">
                                    </td>
                                  </tr>
                                  <tr>

                                    <td>
                                      Slide Image:
                                    </td>

                                    <td colspan="2">
                                      <input required="" type="file" class="form-control" name="img" >

                                    </td>
                                  </tr>
                                  <tr>

                                    <td>
                                      Slide Order:
                                    </td>

                                    <td  style="max-width: 60px;">
                                      <input required="" type="text" class="form-control" name="newordr" value="">
                                    </td>

                                  </tr>



                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                              <button type="submit" name="addcat" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
                            </div>
                          </div>
                        </div>

                                </form>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>





    <?php

    $rows =mysqli_query($con,"SELECT * FROM home" ) or die(mysqli_error($con));
    $n=0;

    while($row=mysqli_fetch_array($rows)){

      $post = $row['post']; 
      $img = $row['img']; 



    }
    ?>



    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->

        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-image-polaroid"></i> Homepage Post
            </div>
            <div class="widget-content padded clearfix">

              <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6" style="max-height: 500px; overflow: auto;">
                    <br>
                    <textarea name="editor1"> <?php echo $post ?> </textarea>

                  </div>

                  <div class="col-md-6" style="padding: 20px">


                    <center>
                      <img src="../images/<?php echo $img ; ?>" style="width: 100%" >
                      <br><br>
                      <input type="file" style="" name="image1" class="">

                      <br>

                    </center>

                  </div>

                </div>



                <center>


                  <br>
                  <input type="submit" name="submitpost" value="Save" class="btn btn-primary">
                </center>


              </form>
              <br>

            </div>

          </div>
        </div>
      </div>
    </div>

<!--
    <?php

    $rows =mysqli_query($con,"SELECT * FROM home" ) or die(mysqli_error($con));
    $n=0;

    while($row=mysqli_fetch_array($rows)){

      $msg2 = $row['msg']; 
      $vidimg = $row['vidimg']; 
      $vid = $row['vid']; 
      $vidpost = $row['vidpost']; 

    }
    ?>


    <br>




    <div class="container-fluid main-content">
      <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-image"></i> Background Image Post
            </div>
            <div class="widget-content padded clearfix">

              <form action="" method="post" enctype="multipart/form-data">
                <div class="row">

                  <div class="col-md-2">
                  </div>
                  <div class="col-md-8">

                    <br>
                    <center>
                      <img src="../images/<?php echo $vidimg ; ?>" style="width: 100%">
                      <br>
                      <br>
                      <input type="file" style="width: 400px;" name="image1" class="">


                      <textarea style="display: none;" name="vid" class="form-control"> <?php echo $vid ?> </textarea>

                      <br>


                      <textarea name="editor2"> <?php echo $vidpost ?> </textarea>

                      <br>


                    </center>
                  </div>


                </div>



                <center>

                  <br>

                  <input type="submit" name="submitvid" value="Save" class="btn">
                </center>

                <br>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  -->

      <div class="space">
      </div>




    </div>

    <?php include('include/footer.php') ?>

  </body>
  </html>
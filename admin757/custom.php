<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Manage
  </title>

  <?php $link = $_GET['page_name'] ?>

  <?php

  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['saveres'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['saveres'.$i];
      $name=$_POST['name'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];
      $ordr=$_POST['ordr'.$i];


      $sql = "UPDATE pages SET `name` = '$name',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Saved";


    }

  }


  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['savecus'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecus'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];
      $ordr=$_POST['ordr'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);



  if (!empty($_FILES['image1']['name'])) {

      // Get image name
    $image = $_FILES['image1']['name'];
    $image = md5(uniqid())  . "1.png";

      // image file directory
    $target = "../images/covers/".basename($image);

    $data=mysqli_query($con,"UPDATE pages SET `cover`='$image' where `id`='$id'")or die( mysqli_error($con) );

    if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }


  }




      $sql = "UPDATE pages SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Saved";


    }

  }

  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['delcus'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcus'.$i];
  
      $sql = "DELETE FROM pages WHERE id=$id AND res=0 ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Page Deleted";

    }

  }




  
  ?>



  <?php
  if(isset($_POST['addcus'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $slug2=$_POST['newslug'];
       $metak=$_POST['newmetak'];
       $metad=$_POST['newmetad'];
       $ordr=$_POST['newordr'];
       $post=$_POST['newurl'];


       $slug1=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug2));
       $slug="page-".$slug1;



  $image="Null";
  if (!empty($_FILES['image1']['name'])) {

      // Get image name
    $image = $_FILES['image1']['name'];
    $image = md5(uniqid())  . "1.png";

      // image file directory
    $target = "../images/covers/".basename($image);

    if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }


  }


  $data=mysqli_query($con,"INSERT INTO pages (name,slug,metak,metad,ordr,post,res,cover)VALUES ('$name','$slug','$metak','$metad','$ordr','$post',0,'$image')")or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Page Added";
      
  }

  ?>
  
  <?php
  if(isset($_POST['admin'])){

      $msg="Unsuccessful" ;
      
       $user=$_POST['user'];
       $pass=$_POST['pass'];
       
  $sql = "UPDATE users SET `username` = '$user',`password` = '$pass' ";





  $data=mysqli_query($con,$sql)or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Admin Updated";
      
  }

  ?>
  




</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>



 <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-bookmark"></i>Reserved Pages
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Name 
                 </th>

                 <th>
                  Meta Keywords
                </th>
                <th>
                  Meta Description
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

                $rows =mysqli_query($con,"SELECT * FROM pages where res=1 AND hide=0  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $name = $row['name']; 
                  $metak = $row['metak']; 
                  $metad = $row['metad']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 

                  ?>
                  <form method="post" action="">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="metak<?php echo $n ?>" value="<?php echo $metak ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="metad<?php echo $n ?>" value="<?php echo $metad ?>">
                      </td>

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>



                      <td>

                        <button type="submit" name="saveres<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>




    <div class="container-fluid main-content">

      <div class="row">
        <!-- Basic Table -->

        <div class="col-lg-12">
         

                 <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-image"></i> Custom Pages
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Name 
                 </th>

                 <th>
                   Slug 
                 </th>

                 <th>
                  Meta Keywords
                </th>
                <th>
                  Meta Description
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

                $rows =mysqli_query($con,"SELECT * FROM pages where res=0  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $name = $row['name']; 
                  $metak = $row['metak']; 
                  $metad = $row['metad']; 
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 

                  ?>
                  <form method="post" action="">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>

                      <td>
                        <input type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="metak<?php echo $n ?>" value="<?php echo $metak ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="metad<?php echo $n ?>" value="<?php echo $metad ?>">
                      </td>

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecus<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="cpages-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> <i class="fa fa-pencil"></i></a>

                          <button type="submit" name="delcus<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>

                  
                  
                                  <tr>
                        <td colspan="7" class="text-center">


                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModal">
                            Add New Custom Page
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalL" aria-hidden="true">
                            <form method="post" action="" enctype="multipart/form-data">

                              <div class="modal-dialog modal-lg" role="document" style="padding-top: 0px;">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="clientModalL">Add New Custom Page</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table>


                                      <tr>
                                        <td colspan="1">
                                           Name:
                                        </td>
                                        <td colspan="2">
                                          <input type="text" class="form-control" name="newname" value="">
                                        </td>
                                        <td colspan="1">
                                           Slug:
                                        </td>
                                        <td colspan="2">
                                          <input type="text" class="form-control" name="newslug" value="">
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          Keywords:
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" name="newmetak" value="">
                                        </td>
                                     

                                        <td>
                                          Description:
                                        </td>

                                        <td>
                                          <input type="text" class="form-control" name="newmetad" value="">

                                        </td>

                                        <td>
                                          Order:
                                        </td>

                                        <td >
                                          <input required="" type="text" class="form-control" name="newordr" value="">
                                        </td>

                                      </tr>
                                      <tr>
                                        <td>Cover</td>
                                        <td colspan="5">
                                <input type="file" class="form-control" name="image1" >
                                        </td>
                                        </tr> 


                                      <tr>
                                        <td colspan="6">
                            <textarea class="ckeditor"  rows="5" style="width: 100%"  name="newurl"></textarea>


                                      </td>

                                    </tr>


                                  </table>
                                </div>
                                <div class="modal-footer" style="margin-top: -25px">
                                  <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                                  <button type="submit" name="addcus" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
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
      
      
        <br>
      

      
    </div>
  </div>
</div>

      
    </div>
  </div>
</div>

<?php include('include/footer.php') ?>

</body>
</html>
<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Products Brands
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['brand_name'])) $page = $_GET['brand_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'brands' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $ordr=$_POST['ordr'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);

      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/brands/".basename($image);

        $data=mysqli_query($con,"UPDATE brandscat SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE brandscat SET `name` = '$name',`slug` = '$slug',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      header("location:brands-$slug");


    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];
  
      $sql = "DELETE FROM brandscat WHERE id=$id ";

      mysqli_query($con, $sql) ;

      $sql = "DELETE FROM brands WHERE catid=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Category Deleted";

      header('location:brands');

    }

  }




  
  ?>



  <?php
  if(isset($_POST['addcat'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $slug1=$_POST['newname'];
       $ordr=$_POST['newordr'];


       $slug0=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));
       $slug = $slug0."-".rand(1,100);


       // Get image name
       $image = $_FILES['img']['name'];
       $image = md5(uniqid())  . "1.png";
       
       // image file directory
       $target = "../images/brands/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }


  $data=mysqli_query($con,"INSERT INTO brandscat (name,slug,img,ordr)VALUES ('$name','$slug','$image','$ordr')")or die( mysqli_error($con) );

    $msg="Category Added" ;
      header("location:brands-$slug");

      
  }




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['save'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['save'.$i];
      $name=$_POST['name'.$i];
      $url=$_POST['url'.$i];
      $ordr=$_POST['ordr'.$i];

      if(isset($_POST['feat'.$i]) ){
        $feat=1;
      }else{
        $feat=0;
      } 



      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/images/".basename($image);

        $data=mysqli_query($con,"UPDATE brands SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }



      $sql = "UPDATE brands SET `name` = '$name',`url` = '$url',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="image Updated";


    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['del'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['del'.$i];
  


      $sql = "DELETE FROM brands WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Deleted";

    }

  }




  
  ?>



  <?php
  if(isset($_POST['add'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $url=$_POST['newurl'];
       $ordr=$_POST['newordr'];


       if(isset($_POST['feat']) ){
         $feat=1;
       }else{
         $feat=0;
       } 


       $rows =mysqli_query($con,"SELECT id FROM brandscat where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
       while($row=mysqli_fetch_array($rows)){

         $id = $row['id']; 
       }
        

       // Get image name
       $image = $_FILES['img']['name'];
       $image = md5(uniqid())  . "1.png";
       
       // image file directory
       $target = "../images/brands/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }


  $data=mysqli_query($con,"INSERT INTO brands (name,catid,catslug,url,img,ordr,feat)VALUES ('$name','$id','$page','$url','$image','$ordr','$feat')");

  ($msg=mysqli_error($con));

  if(empty($msg))  $msg="Added";
      
  }
  ?>


<style type="text/css">
  
  #catimg{
    height: 150px;
    width:  200px;
  }

  #catimg1{
    width:  200px;
  }  
  #ccatimg{
    height: 100px;
    width:  150px;
  }

  #ccatimg1{
    width:  120px;
  }

</style>



<?php
  if(isset($_POST['saveinfo'])){
    $msg="Unsuccessful" ;

  $id=$_POST['saveinfo'];

  $name1=$_POST['name'];
  $name=str_replace("'", "''", $name1);

  $slug1=$_POST['slug'];
  $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
  $slug=strtolower($slug2);

  $metak1=$_POST['metak'];
  $metak=str_replace("'", "''", $metak1);

  $metad1=$_POST['metad'];
  $metad=str_replace("'", "''", $metad1);
  

  $post=$_POST['editor1'];


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

  
  $sql = "UPDATE pages SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`post` = '$post' WHERE `id` =$id";
  mysqli_query($con, $sql) ;
  $msg="Saved";


  }

  ?>


</head>

<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
    
    <?php
    $rows =mysqli_query($con,"SELECT * FROM pages where slug='brands' " ) or die(mysqli_error($con));


    while($row=mysqli_fetch_array($rows)){

      $pageid = $row['id'];  
      $pagename = $row['name'];
      $pagemetak = $row['metak'];
      $pagemetad = $row['metad'];
      $pagepost = $row['post'];
      $pagecover = $row['cover'];
      $pageslug = $row['slug'];

    }
    ?>


    <div class="container-fluid main-content">

      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
         

              <?php if(empty($page)){ ?>

                 <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-image"></i> Top Banner
            </div>
            <div class="widget-content padded clearfix">

                
                <div class="row">

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-1">
                      </div>
                      <div class="col-md-10">
                        <img style="width: 100%" src="../images/covers/<?php echo $pagecover ?>"  >
                        <br>
                        <br>
                      </div>
                    </div>

                    <form method="post" action="" enctype="multipart/form-data">

                      <div class="row">

                        <div class="col-md-12">

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
                            <th>
                              Change Cover
                            </th>

                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <input type="text" class="form-control" name="name" value="<?php echo $pagename ?>">
                              </td>

                              <td>
                                <input type="text" readonly="" class="form-control" name="slug" value="<?php echo $pageslug ?>">
                              </td>
                              <td>
                                <input type="text" class="form-control" name="metak" value="<?php echo $pagemetak ?>">
                              </td>
                              <td>
                                <input type="text" class="form-control" name="metad" value="<?php echo $pagemetad ?>">
                              </td>
                              <td>
                                <input type="file" class="form-control" name="image1" >
                              </td>





                            </tr>
                          </tbody>

                        </table>

                      </div>
                    </div>
                    <div class="row">


                      <div class="col-md-12">

                        
                       <textarea  name="editor1"><?php echo $pagepost ?></textarea>

                     </div>
                   </div>
                   <br><br>

                   <center>
                    <button type="submit" name="saveinfo" class="btn btn-primary" value="<?php echo $pageid ?>"> <i class="fa fa-save"></i> Save</button>
                  </center>
                </form>


                  </div>
                </div>
              <?php }  ?>

          <?php if (!empty($page)) { ?>



            <div class="container-fluid main-content">
              <div class="row">
                <!-- Basic Table -->

                <div class="col-lg-12">
                  <div class="widget-container fluid-height clearfix">
                    <div class="heading" style="text-transform: capitalize;">
                      <i class="fa fa-handshake"></i> <?php echo $page ?> Brands
                    </div>
                    <div class="widget-content padded clearfix">
                      <table class="table table-bordered">
                        <thead>
                          <th>
                           Name 
                         </th>

                         <th>
                           URL 
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
                        <th style="max-width: 60px;">
                          Feature
                        </th>

                        <th class="hidden-xs">
                          Save
                        </th>


                      </thead>
                      <tbody>

                        <?php

                        $rows =mysqli_query($con,"SELECT * FROM brands where catslug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
                        $n=0;

                        while($row=mysqli_fetch_array($rows)){

                          $url = $row['url']; 
                          $name = $row['name']; 
                          $img = $row['img']; 
                          $ordr = $row['ordr']; 
                          $id = $row['id']; 
                          $feat = $row['feat']; 

                          ?>
                          <form method="post" action="" enctype="multipart/form-data">

                            <tr>
                              <td>
                                <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                              </td>

                              <td>
                                <input type="text" class="form-control" name="url<?php echo $n ?>" value="<?php echo $url ?>">
                              </td>
                              <td class="text-center">
                                <img style="max-height: 50px" src="../images/brands/<?php echo $img ?>" ?>
                              </td>
                              <td>
                                <input id="ccatimg1"  type="file" class="form-control" name="img<?php echo $n ?>">
                              </td>

                              <td  style="max-width: 60px;">
                                <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                              </td>
                              <td  style="max-width: 60px;">
                                <center>
                                  <input type="checkbox" style="display: inline-block;" class="" name="feat<?php echo $n ?>" <?php if($feat==1) echo 'checked' ?> >
                                </center>
                              </td>


                              <td>

                                <div class="btn-group">

                                  <button type="submit" name="save<?php echo $n ?>" class="btn btn-success-outline btn-sm " value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>
                                  <button type="submit" name="del<?php echo $n ?>" class="btn btn-danger-outline btn-sm " value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                                </div>
                              </td>
                            </tr>

                          </form>

                          <?php $n++; } ?>




                          <tr>
                            <td colspan="7" class="text-center">


                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModal">
                                Add New brands
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalL" aria-hidden="true">
                                <form method="post" action="" enctype="multipart/form-data">

                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="clientModalL">Add New brands</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <table>


                                          <tr>
                                            <td>
                                              Brand Name:
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" name="newname" value="">
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              Brand URL:
                                            </td>
                                            <td>
                                              <input type="text" class="form-control" name="newurl" value="">
                                            </td>
                                          </tr>
                                          <tr>

                                            <td>
                                              Image:
                                            </td>

                                            <td colspan="2">
                                              <input required="" type="file" class="form-control" name="img" >

                                            </td>
                                          </tr>
                                          <tr>

                                            <td>
                                              Order:
                                            </td>

                                            <td  style="max-width: 60px;">
                                              <input required="" type="text" class="form-control" name="newordr" value="">
                                            </td>

                                          </tr>

                                          <tr>

                                            <td>
                                              Featured:
                                            </td>

                                            <td  style="max-width: 60px;">
                                             <center>
                                              <input type="checkbox" style="display: inline-block;" class="" name="feat" checked >
                                            </center>
                                          </td>

                                        </tr>


                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                                      <button type="submit" name="add" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
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

          <?php } ?>


      </div>

    </div>

  </div>
</div>
</div>



<div class="row">
  <!-- Basic Table -->
  <div class="col-lg-1">
  </div>
  <div class="col-lg-10">



    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="far fa-handshake"></i>Brands Category
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
                  Image
                </th>
                <th>
                  New Images
                </th>
                <th style="max-width: 60px;">
                  Order
                </th>

                <th class="hidden-xs">
                  Add Brands
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM brandscat  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
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
                        <input type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                      </td>
                      <td>
                        <img style="max-height: 50px" src="../images/brands/<?php echo $img ?>" ?>
                      </td>
                      <td>
                        <input style="max-width:95px"  type="file" name="img<?php echo $n ?>">
                      </td>

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="brands-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> </i> <i class="fa fa-plus"></i></a>

                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>




                  <tr>
                    <td colspan="6" class="text-center">


                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add New brand Category
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New brand Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table>


                                  <tr>
                                    <td>
                                      Category Name:
                                    </td>
                                    <td>
                                      <input type="text" class="form-control" name="newname" value="">
                                    </td>
                                  </tr>


                                    <td>
                                      Category Image:
                                    </td>

                                    <td colspan="2">
                                      <input required="" type="file" class="form-control" name="img" >

                                    </td>
                                  </tr>
                                  <tr>

                                    <td>
                                      Category Order:
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

  </div>
</div>
</div>
</div>


<div class="space"></div>



</div>
</div>
<?php include('include/footer.php') ?>

</body>
</html>
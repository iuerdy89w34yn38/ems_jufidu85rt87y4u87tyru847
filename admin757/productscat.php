<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Products Category - Admin  
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['product_name'])) $page = $_GET['product_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'productscat' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);


      if (!empty($_FILES['img'.$i]['name'])) {
          
        // Get image name
        $image = $_FILES['img'.$i]['name'];
        $image = md5(uniqid())  . "1.png";
        
        // image file directory
        $target = "../images/products/".basename($image);

        $data=mysqli_query($con,"UPDATE productcat SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

        if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }


      }




      if(isset($_POST['feat'.$i]) ){
        $feat=1;
      }else{
        $feat=0;
      } 



      $sql = "UPDATE productcat SET `name` = '$name' ,`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";


    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];


     $rows =mysqli_query($con,"SELECT id FROM productsubcat where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
     while($row=mysqli_fetch_array($rows)){
       $pid = $row['id']; 
     $sql = "DELETE FROM productsubcat WHERE id=$pid  ";
     mysqli_query($con, $sql);
     }

     $rows =mysqli_query($con,"SELECT id FROM product where mid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
     while($row=mysqli_fetch_array($rows)){
       $pid = $row['id']; 
     $sql = "DELETE FROM product WHERE id=$pid  ";
     mysqli_query($con, $sql) ;
    }

     $sql = "DELETE FROM productcat WHERE id=$id  ";
     mysqli_query($con, $sql) ;
     ($msg=mysqli_error($con));

     if(empty($msg))  $msg="Deleted";




   }

 }

 
 ?>



 <?php
 if(isset($_POST['addcat'])){

  $msg="Unsuccessful" ;
  
  $name=$_POST['newname'];
  $slug1=$_POST['newname'];
  $ordr=$_POST['newordr'];


      if(isset($_POST['feat']) ){
        $feat=1;
      }else{
        $feat=0;
      } 



       // Get image name
       $image = $_FILES['img']['name'];
       $image = md5(uniqid())  . "1.png";
       
       // image file directory
       $target = "../images/products/".basename($image);

      
       if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
         $msg = "Image uploaded successfully";
       }else{
         $msg = "Failed to upload image";
       }



  $slug0=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));
  $slug = $slug0."_".rand(1,100);

      

 $data=mysqli_query($con,"INSERT INTO productcat (name,slug,img,ordr,feat)VALUES ('$name','$slug','$image','$ordr','$feat')")or die( mysqli_error($con) );

 $msg="Category Added" ;


 
}



for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['savesub'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['savesub'.$i];
    $name=$_POST['name'.$i];
    $pid=$_POST['pid'.$i];

  $rowsxn =mysqli_query($con,"SELECT slug FROM productcat WHERE id='$pid'  ORDER BY ordr " ) or die(mysqli_error($con));
   while($rowxn=mysqli_fetch_array($rowsxn)){
   $pslug = $rowxn['slug']; }
    $ordr=$_POST['ordr'.$i];
    $desp="";


    

    if (!empty($_FILES['img'.$i]['name'])) {
      
        // Get image name
      $image = $_FILES['img'.$i]['name'];
      $image = md5(uniqid())  . "1.png";
      
        // image file directory
      $target = "../images/products/".basename($image);

      $data=mysqli_query($con,"UPDATE productsubcat SET `img`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }



    $sql = "UPDATE productsubcat SET `name` = '$name',`pid` = '$pid',`pslug` = '$pslug',`ordr` = '$ordr',`desp` = '$desp' WHERE `id` =$id";

    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Updated";



  }

}




  if(isset($_POST['addsub'])){
    $msg="Unsuccessful" ;

    $pid=$_POST['pid'];
    $name=$_POST['newname'];
    $slug1=$_POST['newname'];


    $ordr=$_POST['newordr'];
    $slug0=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));
    $slug = $slug0."_".rand(1,100);

      $rowsxn =mysqli_query($con,"SELECT slug FROM productcat WHERE id='$pid'  ORDER BY ordr " ) or die(mysqli_error($con));
   while($rowxn=mysqli_fetch_array($rowsxn)){
   $pslug = $rowxn['slug']; }


    $desp="";

    
        // Get image name
    $image = $_FILES['img']['name'];
    $image = md5(uniqid())  . "1.png";
    
        // image file directory
    $target = "../images/products/".basename($image);
    if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }




    $data=mysqli_query($con,"INSERT INTO productsubcat (name,slug,pid,pslug,img,ordr)VALUES ('$name','$slug','$pid','$pslug','$image','$ordr')")or die( mysqli_error($con) );

    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Added";

  }






for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['delsub'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['delsub'.$i];

   

   $rows =mysqli_query($con,"SELECT id FROM product where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $pid = $row['id']; 
     
      $sql = "DELETE FROM product WHERE pid=$id  ";
   mysqli_query($con, $sql) ;

   }

  

   $sql = "DELETE FROM productsubcat WHERE id=$id ";
   mysqli_query($con, $sql) ;


   ($msg=mysqli_error($con));

   if(empty($msg))  $msg="Deleted";



 }

}






for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['savepro'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['savepro'.$i];
    $name=$_POST['name'.$i];
    $slug1=$_POST['slug'.$i];
    $metak=$_POST['metak'.$i];
    $metad=$_POST['metad'.$i];

    $ordr=$_POST['ordr'.$i];

    $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


    if(isset($_POST['feat'.$i]) ){
      $feat=1;
    }else{
      $feat=0;
    } 


    $sql = "UPDATE product SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="product Updated";

  }

}



for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['delpro'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['delpro'.$i];
    

    $rowsx =mysqli_query($con,"SELECT img FROM pimgs where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
     $img = $rowx['img']; 
     unlink("../images/products/".$img);

     $sql = "DELETE FROM pimg WHERE pid=$id  ";
     mysqli_query($con, $sql) ;
   }


   $sql = "DELETE FROM product WHERE id=$id  ";

   mysqli_query($con, $sql) ;
   ($msg=mysqli_error($con));

   if(empty($msg))  $msg="product Deleted";



 }

}

?>



<?php
if(isset($_POST['addpro'])){

  $msg="Unsuccessful" ;
  
  $name=$_POST['newname'];
  $slug1=$_POST['newslug'];
  $ordr=$_POST['newordr'];
  $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


  if(isset($_POST['feat']) ){
   $feat=1;
 }else{
   $feat=0;
 } 

 if(empty($pslug)) $pslug=$page;
 if(empty($pid)){
  $rows =mysqli_query($con,"SELECT id FROM productsubcat where slug='$pslug'  ORDER BY ordr" ) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($rows)){
   $pid = $row['id'];        }
 }

 $rows =mysqli_query($con,"SELECT pid FROM productsubcat where id='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
 while($row=mysqli_fetch_array($rows)){
   $mid = $row['pid'];        }
   $rows =mysqli_query($con,"SELECT pslug FROM productsubcat where id='$pid'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $mslug = $row['pslug'];        }
     



     $data=mysqli_query($con,"INSERT INTO product (name,mid,mslug,pid,pslug,slug,ordr,feat)VALUES ('$name','$mid','$mslug','$pid','$pslug','$slug','$ordr','$feat')");

     ($msg=mysqli_error($con));

     if(empty($msg))  $msg="product Added";

     header("location:dproducts-$slug");

     
   }
   ?>


   <style type="text/css">
    
    #catimg{
      height: 50px;
      width:  70px;
    }

    #catimg1{
      width:  118px;
    }  

    #subimg{
      height: 50px;
      width:  70px;
    }


    #subimg1{
      height: 100px;
      width:  150px;
    }

    .filein{
      width: 100px;
    }

    .sptd{
      width: 2%;
      max-width: 2%
    }
  </style>

</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>

    <?php if (!empty($page)) {


      ?>

      <div class="container-fluid main-content">
        <div class="row">
          <!-- Basic Table -->

          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="heading" style="text-transform: capitalize;">
                <i class="fa fa-lightbulb-o"></i> <?php echo $page ?> product
              </div>
              <div class="widget-content padded clearfix">
                <table class="table table-bordered">
                  <thead>
                    <th  style="max-width: 60px;">
                     ID 
                   </th>
                   <th>
                     Name 
                   </th>

                   <th>
                     Slug 
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

                  $rows =mysqli_query($con,"SELECT * FROM product where pslug='$page'  ORDER BY ordr LIMIT $plimit" ) or die(mysqli_error($con));
                  $n=0;

                  while($row=mysqli_fetch_array($rows)){

                    $slug = $row['slug']; 
                    $name = $row['name']; 
                    $metak = $row['metak']; 
                    $metad = $row['metad']; 
                    $ordr = $row['ordr']; 
                    $id = $row['id']; 
                    $feat = $row['feat']; 

                    ?>
                    <form method="post" action="" enctype="multipart/form-data">

                      <tr>
                        <td  style="max-width: 60px;">
                          <input type="number" class="form-control" name="id<?php echo $n ?>" value="<?php echo $id ?>" readonly>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                        </td>

                        <td>
                          <input readonly="" type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
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

                            <button type="submit" name="savepro<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                            <a href="dproducts-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> </i> <i class="fa fa-pencil"></i></a>


                            <button type="submit" name="delpro<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                          </div>
                        </td>
                      </tr>

                    </form>

                    <?php $n++; } ?>

                    <form method="post" action="" enctype="multipart/form-data">

                      <tr>
                        <td  style="max-width: 60px;"></td>
                        <td>
                          <input type="text" class="form-control" name="newname" value="" required="">
                        </td>

                        <td>
                          <input type="text" class="form-control" name="newslug" value="" required="">
                        </td>


                        <td  style="max-width: 60px;">
                          <input type="text" class="form-control" name="newordr" value="<?php $n++; echo $n ?>" required="">
                        </td>

                        <td  style="max-width: 60px;">
                          <center>
                            <input type="checkbox" style="display: inline-block;" class="" name="feat"  >
                          </center>
                        </td>



                        <td>

                          <div class="btn-group">

                            <button type="submit" value="" name="addpro" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
                          </div>
                        </td>
                      </tr>

                    </form>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>

    
<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">
    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-tags"></i>Food Category
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered" style="border: none">
                <thead>
                  <th colspan="2">
                   Name 
                 </th>

                 <th style="display: none">
                   Slug 
                 </th>
                 
                 <th>
                  Image
                </th>
                <th style="max-width: 100px; width: 100px;">
                  New Image
                </th>
                
                <th style="max-width: 60px;">
                  Order
                </th>
                <th style="max-width: 60px;">
                  Feat
                </th>

                <th class="hidden-xs">
                  Manage
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM productcat  ORDER BY ordr  LIMIT $pclimit" ) or die(mysqli_error($con));
                $n=1;

                while($row=mysqli_fetch_array($rows)){
                  $slug = $row['slug']; 
                  $pslug = $row['slug']; 
                  $name = $row['name']; 
                  $img = $row['img']; 
                  $desp = $row['desp']; 

                  $ordr = $row['ordr']; 
                  $feat = $row['feat']; 
                  $id = $row['id']; 
                  $parentid = $row['id']; 

                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td colspan="2">
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>


                     

                      <td>
                        <center>
                         <img src="../images/products/<?php echo $img ?>" style="height: 50px"> 
                        </center>
                      </td>
                      <td style="max-width: 130px">
                        <center>
                          <input type="file" class="form-control" name="img<?php echo $n ?>" value="<?php echo $img ?>">
                        </center>
                      </td>
                      

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>

                       <td  style="max-width: 60px;">
                          <center>
                            <input type="checkbox" style="display: inline-block;" class="" name="feat<?php echo $n ?>" <?php if($feat==1) echo 'checked' ?> >
                          </center>
                        </td>

                      <td class="text-center">

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>


                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                              <?php $n++; } ?>



                          <tr>
                            <td colspan="7" class="text-center">


                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModal">
                                Add New Category
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalL" aria-hidden="true">
                                <form method="post" action="" enctype="multipart/form-data">

                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="clientModalL">Add New Category</h5>
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
                                              Category Icon:
                                            </td>

                                            <td colspan="2">
                                              <input type="file" class="form-control" name="img" value="">
                                              

                                            </td>
                                          </tr>
                                          <tr>

                                            <td>
                                              Category Order:
                                            </td>

                                            <td  style="max-width: 60px;">
                                              <input required="" type="text" class="form-control" name="newordr" value="<?php echo $n ?>">
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
                                      <button type="submit" name="addcat" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </td>
                        </tr>


                    <tr>
                      
                      <td  class="text-center" colspan="7">
                          <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">View All Icons </a>
                      </td>
                    </tr>
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
            <div class="heading">
              <i class="fa fa-tags"></i>Products SubCategory
              


            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered" style="border: none">



                                    <tr>

                                      <td>Name</td>
                                      <td>Parent </td>
                                      <td style="">Image </td>
                                      <td style="">New Image </td>
                                      <td>Order </td>
                                      <td> Action </td>
                                    </tr>
                                    <?php

                                    $rowsx =mysqli_query($con,"SELECT * FROM productsubcat  ORDER BY pslug asc,ordr asc LIMIT $pslimit " ) or die(mysqli_error($con));
                                    $p=0;

                                    while($rowx=mysqli_fetch_array($rowsx)){

                                      $slug = $rowx['slug']; 
                                      $name = $rowx['name']; 
                                      $img = $rowx['img']; 

                                      $ordr = $rowx['ordr']; 
                                      $id = $rowx['id']; 
                                      $pid = $rowx['pid']; 



                                    $rowsxn =mysqli_query($con,"SELECT name FROM productcat WHERE id='$pid'  ORDER BY ordr " ) or die(mysqli_error($con));
                                   while($rowxn=mysqli_fetch_array($rowsxn)){
                                   $pname = $rowxn['name']; }


                                      ?>
                                      <form method="post" action="" enctype="multipart/form-data">

                                        <tr>


                                          <td>
                                            <input type="text" class="form-control" name="name<?php echo $p ?>" value="<?php echo $name ?>">
                                          </td>

                                          <td style="min-width: 150px">
                                            <select type="text" class="form-control" name="pid<?php echo $p; ?>" value="<?php echo $pname ?>">
                                              <?php $qrowsx =mysqli_query($con,"SELECT id,name FROM productcat  ORDER BY ordr " ) or die(mysqli_error($con));
                                   while($qrowx=mysqli_fetch_array($qrowsx)){
                                   $newpname = $qrowx['name'];
                                   $newpid = $qrowx['id']; ?>
                                   <option <?php if($newpid==$pid) echo "selected"; ?> value="<?php echo $newpid ?>"><?php echo $newpname ?></option>
                                 <?php } ?>
                                            </select>
                                         
                                          </td>


                                          <td  style="max-width: 100px;">
                                            <center>
                                              <img src="../images/products/<?php echo $img ?>" style="width: 60px">

                                            </center>
                                          </td>

                                          <td  style="max-width: 150px;">
                                            <center>
                                              <input  id="catimg1" type="file" class="form-control" name="img<?php echo $p; ?>" value="">

                                            </center>
                                          </td>


                                          <td  style="max-width: 60px;">
                                            <input type="text" class="form-control" name="ordr<?php echo $p ?>" value="<?php echo $ordr ?>">
                                          </td>



                                          <td>

                                            <div class="btn-group">

                                              <button type="submit" name="savesub<?php echo $p ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                                              <a style="display: none;" href="products-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> </i> <i class="fa fa-plus"></i></a>


                                              <button type="submit" name="delsub<?php echo $p ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                                            </div>
                                          </td>
                                        </tr>

                                      </form>
                                      <?php $p++; } ?>






                          <tr>
                            <td colspan="7" class="text-center">


                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModals">
                                Add New SubCategory
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="clientModals" tabindex="-1" role="dialog" aria-labelledby="clientModalL" aria-hidden="true">
                                <form method="post" action="" enctype="multipart/form-data">

                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="clientModalL">Add New SubCategory</h5>
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
                                              <input autofocus="" type="text" class="form-control" name="newname" value="">
                                            </td>
                                          </tr>

                                          <tr>
                                            <td>
                                              Parent:
                                            </td>
                                            <td>
                                              <select type="text" class="form-control" name="pid">
                                              <?php $qrowsx =mysqli_query($con,"SELECT id,name FROM productcat  ORDER BY ordr " ) or die(mysqli_error($con));
                                   while($qrowx=mysqli_fetch_array($qrowsx)){
                                   $newpname = $qrowx['name'];
                                   $newpid = $qrowx['id']; ?>
                                   <option value="<?php echo $newpid ?>"><?php echo $newpname ?></option>
                                 <?php } ?>
                                            </select>
                                         


                                            </td>
                                          </tr>
                                          <tr style="">

                                            <td>
                                              Category Image:
                                            </td>

                                            <td colspan="2">
                                              <input type="file" class="form-control" name="img" >

                                            </td>
                                          </tr>
                                          <tr>

                                            <td>
                                              Category Order:
                                            </td>

                                            <td  style="max-width: 60px;">
                                              <input required="" type="text" class="form-control" name="newordr" value="<?php echo $p ?>">
                                            </td>

                                          </tr>



                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                                      <button type="submit"  name="addsub" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </td>
                        </tr>




                            </table>
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
<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Edit Page
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'pages'; ?>
  <?php if(!empty( $_GET['pages_name'])){ $page = $_GET['pages_name'];$link=$page; } ?>


  <?php



  for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['saveres'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['saveres'.$i];
    $name=$_POST['name'.$i];
    $metak=$_POST['metak'.$i];
    $slug1=$_POST['slug'.$i];
    $metad=$_POST['metad'.$i];
    $ordr=$_POST['ordr'.$i];


       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


    $sql = "UPDATE blogs SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr' WHERE `id` =$id";

    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Saved";

      header("location: pages-$slug");



  }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];


      $sql = "DELETE FROM blogs WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Page Deleted";

      header('location:pages');

    }

  }




  
  ?>




  <?php
  if(isset($_POST['addcat'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $slug1=$_POST['newslug'];
       $metak=$_POST['newmetak'];
       $metad=$_POST['newmetad'];
       $ordr=$_POST['newordr'];

       // Parent Values

       
       $pid=12;
       $pslug='pages';


       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


  $data=mysqli_query($con,"INSERT INTO blogs (name,pid,pslug,slug,metak,metad,ordr)VALUES ('$name','$pid','$pslug','$slug','$metak','$metad','$ordr')")or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Page Added";


      header("location: pages-$slug");
      
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
       $slug=$slug1;

       $pid=2;
       $pslug='pages';


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


  $data=mysqli_query($con,"INSERT INTO blogs (pid,pslug,name,slug,metak,metad,ordr,post,cover)VALUES ('$pid','$pslug','$name','$slug','$metak','$metad','$ordr','$post','$image')")or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Page Added";
      
      header("location: pages-$slug");


  }

  ?>


  




  <?php
    if(isset($_POST['saveinfo'])){
      $msg="Unsuccessful" ;
$id=$_POST['saveinfo'];
    $name=$_POST['name'];
    $slug1=$_POST['slug'];
    $metak=$_POST['metak'];
    $metad=$_POST['metad'];
    $ordr=$_POST['ordr'];
    $post=$_POST['editor1'];

    $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
    $slug=strtolower($slug2);

    if (!empty($_FILES['image1']['name'])) {
        
      // Get image name
      $image = $_FILES['image1']['name'];
      $image = md5(uniqid())  . "1.png";
      
      // image file directory
      $target = "../images/covers/".basename($image);

      $data=mysqli_query($con,"UPDATE blogs SET `cover`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }


    $sql = "UPDATE blogs SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr',`post` = '$post' WHERE `id` =$id";


    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Saved";


      header("location: pages-$slug");


    }

    ?>


    <?php



 if (!empty($page)) {


    $rows =mysqli_query($con,"SELECT * FROM blogs where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
  

    while($row=mysqli_fetch_array($rows)){

      $pageid = $row['id'];  
      $pagename = $row['name'];
      $pagemetak = $row['metak'];
      $pagemetad = $row['metad'];
      $pagepost = $row['post'];
      $pagecover = $row['cover'];
      $pageordr = $row['ordr'];

    }

  }

    ?>






<style type="text/css">
  
  #cke_1_contents{
    height: 500px !important;
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

        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
         

                 <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-image"></i> <?php echo $page ?>
            </div>
            <div class="widget-content padded clearfix">


     
    <div class="row">

     

      <div class="col-md-12">
        <center>
        <img style="height: 300px;" src="../images/covers/<?php echo $pagecover ?>" >
      </center>
        <br><br>

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
            <th style="max-width: 60px;">
              Order
            </th>

      

          </thead>
          <tbody>
          <tr>
            <td>
              <input type="text" class="form-control" name="name" value="<?php echo $pagename ?>">
            </td>

            <td>
              <input type="text" class="form-control" name="slug" value="<?php echo $page ?>">
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

            <td  style="max-width: 60px;">
              <input type="text" class="form-control" name="ordr" value="<?php echo $pageordr ?>">
            </td>


          </tr>
        </tbody>


</table>

      </div>
    </div>





    
    <div class="row">


      <div class="col-md-12">

      
   <textarea name="editor1" style="min-height: 900px"><?php echo $pagepost ?></textarea>
                 
      </div>
    </div>
    <br><br>

    <center>
                <button type="submit" name="saveinfo" class="btn btn-primary" value="<?php echo $pageid ?>"> <i class="fa fa-save"></i> Save</button>



        </form>
<br><br>
<br><br>

</center>
</form>
</div>
</div>
</div>
</div>
</div>
<br>
<br>
<br>

  <?php  } ?>

    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-tags"></i>Pages
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
                  Meta Descp
                </th>
                <th style="max-width: 60px;">
                  Order
                </th>

                <th class="hidden-xs">
                  Add / Edit Pages
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM blogs ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

               $slug = $row['slug']; 
               $name = $row['name']; 
               $metak = $row['metak']; 
               $metad = $row['metad']; 
               $ordr = $row['ordr']; 
               $id = $row['id']; 
               $pslug = $row['pslug']; 


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

                          <button type="submit" name="saveres<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="pages-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> </i> <i class="fa fa-pencil"></i></a>

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
                            Add New Blog
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalL" aria-hidden="true">
                            <form method="post" action="" enctype="multipart/form-data">

                              <div class="modal-dialog modal-lg" role="document" style="padding-top: 0px;">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="clientModalL">Add New Page</h5>
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
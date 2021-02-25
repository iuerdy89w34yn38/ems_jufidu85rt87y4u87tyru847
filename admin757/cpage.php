<html>
  <head>

    <?php include('include/head.php') ?>



    <?php if(!empty( $_GET['page_name']))  $link = $_GET['page_name'];?>
    <?php if(!empty( $_GET['cpage_name'])){

   $page = $_GET['cpage_name']; $link=$page; ?>




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

      $data=mysqli_query($con,"UPDATE pages SET `cover`='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }


    $sql = "UPDATE pages SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr',`post` = '$post' WHERE `id` =$id";

 


    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Saved";

    header("location: cpages-$slug");


  }

  ?>














    <?php

    $rows =mysqli_query($con,"SELECT * FROM pages where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
  

    while($row=mysqli_fetch_array($rows)){

      $pageid = $row['id'];  
      $pagename = $row['name'];
      $pagemetak = $row['metak'];
      $pagemetad = $row['metad'];
      $pagepost = $row['post'];
      $pagecover = $row['cover'];
      $pageordr = $row['ordr'];

    }

    ?>


    <title> Edit <?php echo $pagename ?>  </title>
    <style type="text/css">


      
    th{
      font-size: 13px;
      text-align: center;
      font-weight: 400;
    }

    td{
      padding:5px 5px 1px 10px;
    }

    </style>
 

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
              <i class="fa fa-image"></i> <?php echo $page ?>
            </div>
            <div class="widget-content padded clearfix">
    
    <div class="row">

      <div class="col-md-2">
      </div>
      <div class="col-md-8">

        <img style="width: 100%" src="../images/covers/<?php echo $pagecover ?>" >
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

      
   <textarea name="editor1"><?php echo $pagepost ?></textarea>
                 
      </div>
    </div>
    <br><br>

    <center>
                <button type="submit" name="saveinfo" class="btn btn-primary" value="<?php echo $pageid ?>"> <i class="fa fa-save"></i> Save</button>



        </form>
<br><br>
<br><br>
<br><br>
<br><br>


    </div>
    </div>
    </div>
    </div>
    </div>




    <?php include('include/footer.php') ?>


  </body>
</html>

<?php }else{ ?>

<title>Custom Pages</title>
  </head>
  <body onload="showtoast()" class="page-header-fixed bg-1 sidebar-nav">
    <div class="modal-shiftfix">

    <?php include('include/header.php') ?>
     
</div>
</body>
</html>

<?php } ?>
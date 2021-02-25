<html>
  <head>

    <?php include('include/head.php') ?>


    <title>
      Contact Details
    </title>

    <?php $link = $_GET['page_name'] ?>
    <?php $page = $_GET['page_name'] ?>



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

          $data=mysqli_query($con,"UPDATE pages SET `cover`='$image' where `id`=$id")or die( mysqli_error($con) );

          if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
          }else{
            $msg = "Failed to upload image";
          }


        }


        $sql = "UPDATE contact SET `post` = '$post' WHERE `id` =1";

  mysqli_query($con, $sql) ;
   
   
  $sql = "UPDATE pages SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`post` = '$post' WHERE `id` =$id";
  mysqli_query($con, $sql) ;
  $msg="Saved";


      }
?>





<?php
  if(isset($_POST['submit'])){
    $msg="Unsuccessful" ;




    $sitename = $_POST['sitename'];  

    $sitephone = $_POST['sitephone'];  
    $sitemail = $_POST['sitemail'];  
    $siteaddress1 = $_POST['siteaddress'];  
    $siteaddress=str_replace("'", "''", $siteaddress1);


    $gmaps = $_POST['gmaps'];  
    $fpost1 = $_POST['fpost'];

    $fpost=str_replace("'", "''", $fpost1);


    $facebook = $_POST['facebook'];  
    $twitter = $_POST['twitter'];  
    $insta = $_POST['insta'];  
    $youtube = $_POST['youtube'];


    if (!empty($_FILES['image1']['name'])) {
        
      // Get image name
      $image = $_FILES['image1']['name'];
      $image = md5(uniqid())  . "1.png";
      
      // image file directory
      $target = "../images/".basename($image);

          $data=mysqli_query($con,"UPDATE contact SET `logo`='$image' where `id`=1")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['image1']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }


    $sql = "UPDATE contact SET `sitename` = '$sitename',`phone` = '$sitephone',`email` = '$sitemail',`address` = '$siteaddress',`gmaps` = '$gmaps',`fpost` = '$fpost',`facebook` = '$facebook',`twitter` = '$twitter',`insta` = '$insta',`youtube` = '$youtube' WHERE `id` =1";

 


    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Saved";




  }

  ?>

  </head>
  <body  onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
    <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
     



        <?php
    $rows =mysqli_query($con,"SELECT * FROM pages where slug='contacts' " ) or die(mysqli_error($con));


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
        <div class="col-lg-10" style="background: #fff">
<!--
         

                 <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-image"></i> Contact Page
            </div>
            <div class="widget-content padded clearfix">


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

-->


    <hr>
    <center><h2>Site Details</center>
  

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

    ?>
  <form method="post" action="" enctype="multipart/form-data">

    <div class="row">
      <div class="col-md-3">

      </div>

      <div class="col-md-6">

        <table>
          <thead>
            
          </thead>
          <tbody>


            <tr>
              <td> Site Name: </td>
              <td> <input type="text" name="sitename" class="form-control" value="<?php echo $sitename ?>"> </td>
            </tr>
            <tr>
              <td> Site Phone: </td>
              <td> <input type="text" name="sitephone" class="form-control" value="<?php echo $sitephone ?>"> </td>
            </tr>
            <tr>
              <td> Site Email: </td>
              <td> <input type="text" name="sitemail" class="form-control" value="<?php echo $sitemail ?>"> </td>
            </tr>

            <tr>
              <td> Site Address: </td>
              <td> <textarea name="siteaddress" class="form-control"><?php echo $siteaddress ?> </textarea> </td>
            </tr>

            <tr>
              <td>Map Code: </td>
              <td> <textarea name="gmaps" class="form-control"><?php echo $gmaps ?> </textarea> </td>
            </tr>
            <tr>
              <td>Footer Text: </td>
              <td> <textarea name="fpost" class="form-control"><?php echo $fpost ?> </textarea> </td>
            </tr>
            <tr>
              <td> Facebook: </td>
              <td> <input type="text" name="facebook" class="form-control" value="<?php echo $facebook ?>"> </td>
            </tr>
            <tr>
              <td> Twitter: </td>
              <td> <input type="text" name="twitter" class="form-control" value="<?php echo $twitter ?>"> </td>
            </tr>
            <tr>
              <td> Instagram: </td>
              <td> <input type="text" name="insta" class="form-control" value="<?php echo $insta ?>"> </td>
            </tr>
            <tr>
              <td> Youtube: </td>
              <td> <input type="text" name="youtube" class="form-control" value="<?php echo $youtube ?>"> </td>
            </tr>





          </tbody>
        </table>

        <br>
        Logo:

        <center>
            <img src="../images/<?php echo $sitelogo ; ?>" style="width: 100px" class="">
<br>
<br>

            <input type="file" style="width: 400px;" name="image1" class="form-control">

<br>
<br>
            <input type="submit" name="submit" class="btn">
        </center>

     </div>


    </div>

  </form>
</h2>
</center>


</div>
</div>
</div>
</div>
    <div class="space">
    </div>



    </div>

    <?php include('include/footer.php') ?>

  </body>
</html>
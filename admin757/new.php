<html>
<head>

  <?php include('include/head.php') ?>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['new_name'])) $page = $_GET['new_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'news' ?>


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


    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Saved";



  }

  ?>

  <?php




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['updatemar'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['updatemar'.$i];
      $name=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];
      $month=$_POST['month'.$i];
      $year=$_POST['year'.$i];
      $url=$_POST['url'.$i]; 




      $sql = "UPDATE marquee SET `text` = '$name',`url` = '$url',`month` = '$month',`year` = '$year',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savemar'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savemar'.$i];
      $name=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];
      $month=$_POST['month'.$i];
      $year=$_POST['year'.$i];




      $sql = "UPDATE marquee SET `text` = '$name',`month` = '$month',`year` = '$year',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delmar'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delmar'.$i];

      $sql = "DELETE FROM marquee WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Deleted";


      header("location:news");



    }

  }




  if(isset($_POST['addmar'])){

    $msg="Unsuccessful" ;

    $name=$_POST['newname'];
    $desp1=$_POST['newurl'];
    $ordr=$_POST['newordr'];
    $month=$_POST['newmonth'];
    $year=$_POST['newyear'];

    $url = str_replace("'", "''", $desp1); 




    $data=mysqli_query($con,"INSERT INTO marquee (text,url,ordr,month,year)VALUES ('$name','$url','$ordr','$month','$year')")or die( mysqli_error($con) );

    $msg="Added" ;


  }





  ?>













  <?php

  $rows =mysqli_query($con,"SELECT * FROM pages where `slug` = '$link'  " ) or die(mysqli_error($con));


  while($row=mysqli_fetch_array($rows)){

    $pageid = $row['id'];  
    $pagename = $row['name'];
    $pageslug = $row['slug'];
    $pagemetak = $row['metak'];
    $pagemetad = $row['metad'];
    $pagepost = $row['post'];
    $pagecover = $row['cover'];


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
                      <i class="fa fa-handshake"></i> <?php echo $page ?> Clients
                    </div>
                    <div class="widget-content padded clearfix">
                      <table class="table table-bordered">
                       <thead>
                        <th colspan="2">
                         Heading 
                       </th>
                       <th>
                         Year 
                       </th>
                       <th>
                         Month 
                       </th>


                       <th style="max-width: 60px;">
                        Order
                      </th>





                    </thead>
                    <tbody>

                      <?php

                      $rows =mysqli_query($con,"SELECT * FROM marquee WHERE id=$page  ORDER BY ordr" ) or die(mysqli_error($con));
                      $n=0;

                      while($row=mysqli_fetch_array($rows)){

                        $name = $row['text']; 
                        $url = $row['url'];
                        $year = $row['year'];
                        $month = $row['month'];

                        $ordr = $row['ordr']; 
                        $id = $row['id']; 




                        ?>
                        <form method="post" action="" enctype="multipart/form-data">

                          <tr>
                            <td colspan="2">
                              <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">

                            </td>


                            <td>
                              <input type="text" class="form-control" name="month<?php echo $n ?>" value="<?php echo $month ?>">

                            </td>
                            <td>
                              <input type="text" class="form-control" name="year<?php echo $n ?>" value="<?php echo $year ?>">

                            </td>


                            <td  style="max-width: 60px;">
                              <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                            </td>


                          </tr>
                          <tr>
                           <td colspan="5">
                            <textarea class="ckeditor"  rows="5" style="width: 100%"  name="url<?php echo $n ?>" ><?php echo $url ?></textarea>

                          </td>

                        </tr>
                        <tr>

                          <td colspan="5" class="text-center">

                            <div class="btn-group">

                              <button type="submit" name="updatemar<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                              <button type="submit" name="delmar<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                            </div>
                          </td>

                          </td>

                      </form>

                      <?php $n++; } ?>

                   


      
                  </tbody>
                </table>
              </div>
                </div>
              </div>
              </div>
            </div>

    <?php }  ?>


  </div>

</div>

</div>
</div>
</div>

<br><br>






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
              <i class="far fa-bullhorn"></i>News & Events 
            </div>
            <div class="widget-content padded clearfix">

              <table class="table table-bordered">
                <thead>
                  <th colspan="2">
                   Heading 
                 </th>
                 <th  style="max-width: 60px;">
                   Month 
                 </th>
                 <th  style="max-width: 60px;">
                   Year 
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

                $rows =mysqli_query($con,"SELECT * FROM marquee  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $name = $row['text']; 
                  $url = $row['url'];
                  $year = $row['year'];
                  $month = $row['month'];

                  $ordr = $row['ordr']; 
                  $id = $row['id']; 


                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td colspan="2">
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">

                      </td>


                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="month<?php echo $n ?>" value="<?php echo $month ?>">

                      </td>
                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="year<?php echo $n ?>" value="<?php echo $year ?>">

                      </td>


                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>


                      <td class="text-center">

                        <div class="btn-group">

                          <button type="submit" name="savemar<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <a href="news-<?php echo $id ?>" class="btn btn-primary-outline"><i class="fa fa-pencil"></i></a>


                          <button type="submit" name="delmar<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                        </div>
                      </td>



                    </tr>



                  </form>

                  <?php $n++; } ?>

                 


                                  <tr>
                        <td colspan="7" class="text-center">


                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModal">
                            Add New News\Event
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalL" aria-hidden="true">
                            <form method="post" action="" enctype="multipart/form-data">

                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="clientModalL">Add New News/Event</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <table>


                                      <tr>
                                        <td colspan="1">
                                           Heading:
                                        </td>
                                        <td colspan="5">
                                          <input type="text" class="form-control" name="newname" value="">
                                        </td>
                                      </tr>

                                      <tr>
                                        <td>
                                          Month:
                                        </td>
                                        <td>
                                          <input type="text" class="form-control" name="newmonth" value="">
                                        </td>
                                     

                                        <td>
                                          Year:
                                        </td>

                                        <td>
                                          <input type="text" class="form-control" name="newyear" value="">

                                        </td>

                                        <td>
                                          Order:
                                        </td>

                                        <td >
                                          <input required="" type="text" class="form-control" name="newordr" value="">
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
                                  <button type="submit" name="addmar" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
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

    <hr>
    <br><br>




  </div>




  <?php include('include/footer.php') ?>


</body>
</html>



<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Videos
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['client_name'])) $page = $_GET['client_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>

  <?php



  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      
      $ordr=$_POST['ordr'.$i];






      $sql = "UPDATE videos SET `name` = '$name',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";
      header("location:videos");


    }

  }



  for ($i=0; $i < 100 ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];
  
  

      $sql = "DELETE FROM videos WHERE id=$id  ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Category Deleted";

      header('location:videos');

    }

  }




  
  ?>



  <?php
  if(isset($_POST['addcat'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       
       $ordr=$_POST['newordr'];




  $data=mysqli_query($con,"INSERT INTO videos (name,ordr)VALUES ('$name','$ordr')")or die( mysqli_error($con) );


      header("location:videos");

      
  }







  
  ?>





<style type="text/css">
  
  #catimg{
    height: 100px;
    width:  200px;
  }

  #catimg1{
    width:  200px;
  }  
  #ccatimg{
    height: 70px;
    width:  150px;
  }

  #ccatimg1{
    width:  120px;
  }

</style>




</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
    
   
   




    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-tags"></i>Videos
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Code 
                 </th>

                 <th colspan="2">
                   Videos 
                 </th>
                 
                <th style="max-width: 60px;">
                  Order
                </th>

                <th class="hidden-xs">
                  Add Videos
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM videos  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){


                  $name = $row['name']; 
                  
                  $ordr = $row['ordr']; 
                  $id = $row['id']; 

                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <textarea class="form-control" name="name<?php echo $n ?>" ><?php echo $name ?></textarea>
                      </td>


                      <td  colspan="2" style="max-width:400px;">
                        <?php echo $name ?>
                      </td>
                      

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>



                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash-o"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>

                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="newname" value="">
                      </td>


                      <td colspan="2">
                      

                      </td>

                      <td  style="max-width: 60px;">
                        <input type="text" class="form-control" name="newordr" value="">
                      </td>



                      <td>

                        <div class="btn-group">

                          <button type="submit" name="addcat" class="btn btn btn-outline"> <i class="fa fa-plus"></i></button>
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

<div class="space"></div>



  </div>
</div>

<?php include('include/footer.php') ?>

</body>
</html>
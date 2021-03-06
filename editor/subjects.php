<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Manage subjects
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
  <?php if(empty( $_GET['page_name'])) $link = 'subjects' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];




      $sql = "UPDATE subjects SET `name` = '$name',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];

      $sql = "DELETE FROM subjects WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg=" Deleted";



    }

  }




  if(isset($_POST['addcat'])){

    $msg="Unsuccessful" ;

    $name=$_POST['newname'];
    $ordr=$_POST['newordr'];





   $data=mysqli_query($con,"INSERT INTO subjects (name,ordr)VALUES ('$name','$ordr')")or die( mysqli_error($con) );

   $msg="Added" ;


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
              <i class="fa fa-images"></i> subjects
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Title 
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

                $rows =mysqli_query($con,"SELECT * FROM subjects  ORDER BY ordr" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $name = $row['name'];
                  $ordr = $row['ordr']; 

                  $id = $row['id']; 


                  ?>
                  <form method="post" action="" enctype="multipart/form-data">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                      </td>




                      <td  style="max-width: 60px;">
                        <input required="" type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                      </td>




                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>


                  <tr>
                    <td colspan="5" class="text-center">


                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add New Subject
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Subject</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table>


                                  <tr>
                                    <td>
                                      Name:
                                    </td>
                                    <td>
                                      <input type="text" class="form-control" name="newname" value="">
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



      <div class="space">
      </div>




    </div>

    <?php include('include/footer.php') ?>

  </body>
  </html>
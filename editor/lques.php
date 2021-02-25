<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Manage Long Questions
  </title>

  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />



  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
  <?php if(empty( $_GET['page_name'])) $link = 'lques' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

    $id=$_POST['savecat'.$i]; 
    $classid=$_POST['classid'.$i]; 
    $chapterid=$_POST['chapterid'.$i]; 
    $subjectid=$_POST['subjectid'.$i]; 
    $typeid=$_POST['typeid'.$i]; 
    $ques=$_POST['ques'.$i];
    $ans=$_POST['ans'.$i]; 





      $sql = "UPDATE lques SET `classid` = '$classid',`subjectid` = '$subjectid',`typeid` = '$typeid',`chapterid` = '$chapterid',`ques` = '$ques',`ans` = '$ans' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];

      $sql = "DELETE FROM lques WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg=" Deleted";



    }

  }




  if(isset($_POST['addcat'])){

    $msg="Unsuccessful" ;


    $classid=$_POST['newclassid']; 
    $subjectid=$_POST['newsubjectid']; 
    $chapterid=$_POST['newchapterid']; 
    $typeid=$_POST['newtypeid']; 
    $ques=$_POST['newques'];
    $ans=$_POST['newans']; 





   $data=mysqli_query($con,"INSERT INTO lques (classid,subjectid,chapterid,typeid,ques,ans)VALUES ('$classid','$subjectid','$chapterid','$typeid','$ques','$ans')")or die( mysqli_error($con) );

   $msg="Added" ;


 }

?>

<style type="text/css">
  .dataTable th.sorting:before,.dataTable th.sorting:after,.dataTable th.sorting_desc:after,.dataTable th.sorting_asc:after{
    display: none;
  }
</style>



</head>
<body onload="showtoast()" class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">


    <?php include('include/header.php') ?>






    <div class="container-fluid main-content">
      <div class="row">


        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix" style="padding:10px">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-images"></i> Long Questions
            </div>
            

          <table class="table "  id="example" >
 
                 <thead>
                  <th>
                    ID
                 </th>
                  <th style="min-width: 100px">
                    Class
                 </th>
                  <th style="min-width: 100px">
                    Subject
                 </th>
                  <th style="min-width: 100px">
                    Chapter
                 </th>
                  <th style="min-width: 100px">
                    Type
                 </th>
                  <th style="min-width: 300px">
                    Question
                 </th>

                  <th  style="min-width: 300px">
                    Answere
                 </th>

                <th style="min-width:80px">
                  Save
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM lques  ORDER BY id" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){
                  
                  $id = $row['id']; 
                  $classid = $row['classid']; 
                  $subjectid = $row['subjectid']; 
                  $chapterid = $row['chapterid']; 
                  $typeid = $row['typeid']; 
                  $ques = $row['ques'];
                  $ans = $row['ans']; 



                  ?>

                    <tr>
                      <td>
                                          <form method="post" action="" enctype="multipart/form-data">

                       <span style=""> <?php echo $id ?></span>
                      </td>
                      <td>
<select class="form-control" placeholder="Select Class" name="classid<?php echo $n ?>">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM classes ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option <?php if($classid==$newcat) echo 'selected' ?> value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 

                       <span style="display:none;"> <?php echo $classid ?></span>
                      </td>

                      <td>
<select class="form-control" placeholder="Select Class" name="subjectid<?php echo $n ?>">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM subjects ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option <?php if($subjectid==$newcat) echo 'selected' ?> value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 
                       <span style="display:none;"> <?php echo $subjectid ?></span>
                      </td>
                   

                      <td>
<select class="form-control" placeholder="Select Class" name="chapterid<?php echo $n ?>">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM chapters ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option <?php if($chapterid==$newcat) echo 'selected' ?> value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 
                       <span style="display:none;"> <?php echo $subjectid ?></span>
                      </td>
   <td>
<select class="form-control" placeholder="Select Type" name="typeid<?php echo $n ?>">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM type ORDER BY id" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option <?php if($typeid==$newcat) echo 'selected' ?> value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 
                       <span style="display:none;"> <?php echo $typeid ?></span>
                      </td>

                      <td>

                        <input type="text" class="form-control" name="ques<?php echo $n ?>" value="<?php echo $ques ?>">
                       <span style="display:none;"> <?php echo $ques ?></span>
                      </td>

                      <td>
                        <textarea name="ans<?php echo $n ?>" class="form-control" ><?php echo $ans ?></textarea>
                        
                       <span style="display:none;"> <?php echo $ans ?></span>
                      </td>


                      <td>

                        <div class="btn-group">

                          <button type="submit" name="savecat<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i></button>

                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                        </div>

                                          </form>

                      </td>
                    </tr>


                  <?php $n++; } ?>

                </tbody>
                <tfoot>
                   
                  <th>
                    ID
                 </th>
                  <th style="min-width: 100px">
                    Class
                 </th>
                  <th style="min-width: 100px">
                    Subject
                 </th>
                  <th style="min-width: 100px">
                    Chapter
                 </th>
                  <th style="min-width: 100px">
                    Type
                 </th>
                  <th style="min-width: 300px">
                    Question
                 </th>

                  <th>
                    Answere
                 </th>

                <th style="min-width:80px">
                  Save
                </th>


                </tfoot>

                </table>


<div class="widget-content padded clearfix">



              <table class="table table-bordered">


                  <tr>
                    <td colspan="5" class="text-center">


                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add New Long Question
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table>


                                  <tr>
                                    <td>
                                      Class:
                                    </td>
                                    <td colspan="3">

<select class="select2" placeholder="Select Class" name="newclassid">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM classes ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 

                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Subject:
                                    </td>
                                    <td colspan="3">
<select class="select2" placeholder="Select Subject" name="newsubjectid">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM subjects ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 

                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Chapter:
                                    </td>
                                    <td colspan="3">
<select class="select2" placeholder="Select Chapter" name="newchapterid">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM chapters ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 

                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Type:
                                    </td>
                                    <td colspan="3">
<select class="select2" placeholder="Select Chapter" name="newtypeid">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM type ORDER BY id" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 

                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Question:
                                    </td>
                                    <td colspan="3">
                                      
                                      <input type="text" class="form-control" name="newques" value="">
                                    </td>
                                  </tr>

                                  <tr>

                                    <td>
                                      Answere:
                                    </td>

                                    <td  style="">
                                      <textarea rows="6" name="newans" class="form-control"> </textarea>
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
    <?php include('include/dtfooter.php') ?>


  </body>
  </html>
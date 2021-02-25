<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Manage MCQs
  </title>

  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />



  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
  <?php if(empty( $_GET['page_name'])) $link = 'mcqs' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

    $id=$_POST['savecat'.$i]; 
    $classid=$_POST['classid'.$i]; 
    $chapterid=$_POST['chapterid'.$i]; 
    $subjectid=$_POST['subjectid'.$i]; 
    $ques=$_POST['ques'.$i];
    $opt1=$_POST['opt1'.$i];
    $opt2=$_POST['opt2'.$i];
    $opt3=$_POST['opt3'.$i];
    $opt4=$_POST['opt4'.$i];
    $ans=$_POST['ans'.$i]; 





      $sql = "UPDATE mcqs SET `classid` = '$classid',`subjectid` = '$subjectid',`chapterid` = '$chapterid',`ques` = '$ques',`opt1` = '$opt1',`opt2` = '$opt2',`opt3` = '$opt3',`opt4` = '$opt4',`ans` = '$ans' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];

      $sql = "DELETE FROM mcqs WHERE id=$id ";

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
    $ques=$_POST['newques'];
    $opt1=$_POST['newopt1'];
    $opt2=$_POST['newopt2'];
    $opt3=$_POST['newopt3'];
    $opt4=$_POST['newopt4'];
    $ans=$_POST['newans']; 





   $data=mysqli_query($con,"INSERT INTO mcqs (classid,subjectid,chapterid,ques,opt1,opt2,opt3,opt4,ans)VALUES ('$classid','$subjectid','$chapterid','$ques','$opt1','$opt2','$opt3','$opt4','$ans')")or die( mysqli_error($con) );

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
              <i class="fa fa-images"></i> MCQs
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
                  <th style="min-width: 300px">
                    Question
                 </th>
                  <th>
                    Option_1
                 </th>
                  <th>
                    Option_2
                 </th>
                  <th>
                    Option_3
                 </th>
                  <th>
                    Option_4
                 </th>
                  <th>
                    Answere
                 </th>

                <th style="min-width:80px">
                  Save
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM mcqs  ORDER BY id" ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){
                  
                  $id = $row['id']; 
                  $classid = $row['classid']; 
                  $subjectid = $row['subjectid']; 
                  $chapterid = $row['chapterid']; 
                  $ques = $row['ques'];
                  $opt1 = $row['opt1'];
                  $opt2 = $row['opt2'];
                  $opt3 = $row['opt3'];
                  $opt4 = $row['opt4'];
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

                        <input type="text" class="form-control" name="ques<?php echo $n ?>" value="<?php echo $ques ?>">
                       <span style="display:none;"> <?php echo $ques ?></span>
                      </td>

                      <td>

                        <input type="text" class="form-control" name="opt1<?php echo $n ?>" value="<?php echo $opt1 ?>">
                       <span style="display:none;"> <?php echo $opt1 ?></span>
                      </td>

                      <td>

                        <input type="text" class="form-control" name="opt2<?php echo $n ?>" value="<?php echo $opt2 ?>">
                       <span style="display:none;"> <?php echo $opt2 ?></span>
                      </td>

                      <td>

                        <input type="text" class="form-control" name="opt3<?php echo $n ?>" value="<?php echo $opt3 ?>">
                       <span style="display:none;"> <?php echo $opt3 ?></span>
                      </td>

                      <td>

                        <input type="text" class="form-control" name="opt4<?php echo $n ?>" value="<?php echo $opt4 ?>">
                       <span style="display:none;"> <?php echo $opt4 ?></span>
                      </td>

                      <td>

                        <input type="text" class="form-control" name="ans<?php echo $n ?>" value="<?php echo $ans ?>">
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
                  <th style="min-width: 300px">
                    Question
                 </th>
                  <th>
                    Option_1
                 </th>
                  <th>
                    Option_2
                 </th>
                  <th>
                    Option_3
                 </th>
                  <th>
                    Option_4
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
                        Add New MCQ
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New MCQ</h5>
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
<select class="form-control" placeholder="Select Class" name="newclassid">
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
<select class="form-control" placeholder="Select Subject" name="newsubjectid">
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
<select class="form-control" placeholder="Select Chapter" name="newchapterid">
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
                                      Question:
                                    </td>
                                    <td colspan="3">
                                      
                                      <input type="text" class="form-control" name="newques" value="">
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>
                                      Option 1:
                                    </td>
                                    <td>
                                      
                                      <input type="text" class="form-control" name="newopt1" value="">
                                    </td>

                                    <td>
                                      Option 2:
                                    </td>
                                    <td>
                                      
                                      <input type="text" class="form-control" name="newopt2" value="">
                                    </td>
                                  </tr>



                                  <tr>
                                    <td>
                                      Option 3:
                                    </td>
                                    <td>
                                      
                                      <input type="text" class="form-control" name="newopt3" value="">
                                    </td>

                                    <td>
                                      Option 4:
                                    </td>
                                    <td>
                                      
                                      <input type="text" class="form-control" name="newopt4" value="">
                                    </td>
                                  </tr>


                                  <tr>

                                    <td>
                                      Answere:
                                    </td>

                                    <td  style="">
                                      <input required="" type="text" class="form-control" name="newans" value="">
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
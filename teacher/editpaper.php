<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Edit Paper
  </title>

  <?php if(!empty( $_GET['pid'])) $pid = $_GET['pid'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'newpaper' ?>

  <?php



  if(isset($_POST['addcat'])){

    $msg="Unsuccessful" ;

    $name=$_POST['name'];
    $clid=$_POST['clid'];
    $sid=$_POST['sid'];
    $chid=$_POST['chid'];
    $name=$_POST['name'];
    $mheading=$_POST['mheading'];
    $tm=$_POST['tm'];
    $am=$_POST['am'];
    $mm=$_POST['mm'];
    $sheading=$_POST['sheading'];
    $ts=$_POST['ts'];
    $as=$_POST['as'];
    $ms=$_POST['ms'];
    $lheading=$_POST['lheading'];
    $tl=$_POST['tl'];
    $al=$_POST['al'];
    $ml=$_POST['ml'];



      $sql = "UPDATE paper SET `name` = '$name',`clid` = '$clid',`sid` = '$sid',`chid` = '$chid',`name` = '$name',`mheading` = '$mheading',`tm` = '$tm',`am` = '$am',`mm` = '$mm',`sheading` = '$sheading',`ts` = '$ts',`as` = '$as',`ms` = '$ms',`lheading` = '$lheading',`tl` = '$tl',`al` = '$al',`ml` = '$ml' WHERE `id` =$pid";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";

  }




  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savepm'.$i])){
      $msg="Unsuccessful" ;

    $id=$_POST['savepm'.$i]; 
    $ordr=$_POST['ordr'.$i]; 


      $sql = "UPDATE pmcqs SET `ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg='Updated';

    }

  }


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delpm'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delpm'.$i];

      $sql = "DELETE FROM pmcqs WHERE id=$id ";
      mysqli_query($con, $sql) ;

      $rowsx =mysqli_query($con,"SELECT * FROM pmcqs  WHERE pid=$pid" ) or die(mysqli_error($con));
      $rowcount=mysqli_num_rows($rowsx);
      $sql = "UPDATE paper SET `tm` = '$rowcount' WHERE `id` =$pid";
      mysqli_query($con, $sql) ;


      ($msg=mysqli_error($con));
      if(empty($msg))  $msg=" Deleted";



    }

  }


  if(isset($_POST['addpm'])){

    $msg="Unsuccessful" ;
    $mcq=$_POST['newmcq'];
    $ordr=$_POST['newordr'];


    $data=mysqli_query($con,"INSERT INTO pmcqs (pid,mid,ordr)VALUES ($pid,'$mcq','$ordr')")or die( mysqli_error($con) );


   $msg="Added" ;

}


  ?>



  <style type="text/css">

    @media (min-width: 767px){

      .modal-dialog {
        width: 46%;
      }

    }

    table{
      display: block;
      overflow: auto;
    }
    td{
      font-size: 12px;
      padding: 5px 10px;
    }

    td.qover{
    max-width: 350px;
    width: 350px;
    overflow-x: auto;
    white-space: nowrap;
    }
    td.optover{
    max-width: 120px;
    width: 120px;
    overflow-x: auto;
    white-space: nowrap;
    }
    .table tbody>tr>td{
      padding: 5px 15px;
    }


  </style>

</head>
<body onload="showtoast()" class="bg-1 ">
  <div class="modal-shiftfix">


    <?php // include('include/header.php') ?>





    <?php if(!empty($pid)){ ?>

      <div class="container-fluid main-content">
        <div class="row">
          <!-- Basic Table -->

          <div class="col-lg-1">
          </div>
          <div class="col-lg-10">
            <div class="widget-container fluid-height clearfix">
              <div class="heading" style="text-transform: capitalize;">
                <i class="fa fa-images"></i> Edit Paper
              </div>
              <div class="widget-content padded clearfix">

                <form method="post" action="" enctype="multipart/form-data">

                 <?php
                 $rows =mysqli_query($con,"SELECT * FROM paper WHERE id=$pid" ) or die(mysqli_error($con));
                 $n=0;
                 while($row=mysqli_fetch_array($rows)){
                  $tid = $row['tid']; 
                  $name = $row['name'];
                  $clid=$row['clid'];
                  $sid=$row['sid'];
                  $chid=$row['chid']; 
                  $datec=$row['datec']; 
                  $mheading=$row['mheading'];
                  $tm=$row['tm'];
                  $am=$row['am'];
                  $mm=$row['mm'];
                  $sheading=$row['sheading'];
                  $ts=$row['ts'];
                  $as=$row['as'];
                  $ms=$row['ms'];
                  $lheading=$row['lheading'];
                  $tl=$row['tl'];
                  $al=$row['al'];
                  $ml=$row['ml'];
                  $rowsx =mysqli_query($con,"SELECT name FROM teacher WHERE id='$tid'" ) or die(mysqli_error($con));
                  while($rowx=mysqli_fetch_array($rowsx)){
                   $tname= $rowx['name'];
                 }
                 $rowsx =mysqli_query($con,"SELECT name FROM classes WHERE id='$clid'" ) or die(mysqli_error($con));
                 while($rowx=mysqli_fetch_array($rowsx)){
                   $clname= $rowx['name'];
                 }
                 $rowsx =mysqli_query($con,"SELECT name FROM subjects WHERE id='$sid'" ) or die(mysqli_error($con));
                 while($rowx=mysqli_fetch_array($rowsx)){
                   $sname= $rowx['name'];
                 } 
                 $rowsx =mysqli_query($con,"SELECT name FROM chapters WHERE id='$chid'" ) or die(mysqli_error($con));
                 while($rowx=mysqli_fetch_array($rowsx)){
                   $chname= $rowx['name'];
                 }

                 $tmm=$am*$mm;   
                 $tms=$as*$ms;   
                 $tml=$al*$ml;
                 $total=  $tmm+$tms+$tml; 



                 ?>

                 <table>

                  <tr>
                    <td>
                      Paper Name:
                    </td>
                    <td colspan="5">

                      <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                    </td>
                  </tr>

                  <tr>
                    <td>
                      Class:
                    </td>
                    <td>
                      <select class="form-control" placeholder="Select Class" name="clid">
                       <?php
                       $rowsx =mysqli_query($con,"SELECT * FROM classes ORDER BY ordr" ) or die(mysqli_error($con));
                       while($rowx=mysqli_fetch_array($rowsx)){
                        $name= $rowx['name']; 
                        $newcat= $rowx['id']; ?>
                        <option <?php if($clid==$newcat) echo 'selected' ?> value = "<?php echo $newcat ?>"><?php echo $name ?></option>
                      <?php } ?>

                    </select> 

                  </td>

                  <td>
                    Subject:
                  </td>
                  <td>
                    <select class="form-control" placeholder="Select Subject" name="sid">
                     <?php
                     $rowsx =mysqli_query($con,"SELECT * FROM subjects ORDER BY ordr" ) or die(mysqli_error($con));
                     while($rowx=mysqli_fetch_array($rowsx)){
                      $name= $rowx['name']; 
                      $newcat= $rowx['id']; ?>
                      <option <?php if($sid==$newcat) echo 'selected' ?> value = "<?php echo $newcat ?>"><?php echo $name ?></option>
                    <?php } ?>

                  </select> 

                </td>

                <td>
                  Chapter:
                </td>
                <td>
                  <select class="form-control" placeholder="Select Chapter" name="chid">
                   <option value = "%">All Chapters</option>


                   <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM chapters ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
                    <option <?php if($chid==$newcat) echo 'selected' ?> value = "<?php echo $newcat ?>"><?php echo $name ?></option>
                  <?php } ?>

                </select> 

              </td>
            </tr>


            <tr>
              <td>
                MCQs Heading:
              </td>
              <td colspan="5">

                <input type="text" class="form-control" name="mheading" value="<?php echo $mheading ?>">
              </td>
            </tr>


            <tr>
              <td>
                Total MCQs:
              </td>
              <td>

                <input type="number" class="form-control" name="tm" value="<?php echo $tm ?>">
              </td>

              <td>
                Attempt MCQs:
              </td>
              <td>

                <input type="number" class="form-control" name="am" value="<?php echo $am ?>">
              </td>
              <td>
                Marks Per MCQ:
              </td>
              <td>

                <input type="number" class="form-control" name="mm" value="<?php echo $mm ?>">
              </td>
            </tr>


            <tr>
              <td>
                Short Heading:
              </td>
              <td colspan="5">

                <input type="text" class="form-control" name="sheading" value="<?php echo $sheading ?>">
              </td>
            </tr>


            <tr>
              <td>
                Total Short:
              </td>
              <td>

                <input type="number" class="form-control" name="ts" value="<?php echo $ts ?>">
              </td>

              <td>
                Attempt Short:
              </td>
              <td>

                <input type="number" class="form-control" name="as" value="<?php echo $as ?>">
              </td>
              <td>
                Marks Per Short:
              </td>
              <td>

                <input type="number" class="form-control" name="ms" value="<?php echo $ms ?>">
              </td>
            </tr>



            <tr>
              <td>
                Long Heading:
              </td>
              <td colspan="5">

                <input type="text" class="form-control" name="lheading" value="<?php echo $lheading ?>">
              </td>
            </tr>


            <tr>
              <td>
                Total Short:
              </td>
              <td>

                <input type="number" class="form-control" name="tl" value="<?php echo $tl ?>">
              </td>

              <td>
                Attempt Short:
              </td>
              <td>

                <input type="number" class="form-control" name="al" value="<?php echo $al ?>">
              </td>
              <td>
                Marks Per Short:
              </td>
              <td>

                <input type="number" class="form-control" name="ml" value="<?php echo $ml ?>">
              </td>
            </tr>


          </table>

        </div>
        <div class=" text-center">
          <button type="submit" name="addcat" class="btn btn-primary"> <i class="fa fa-save"></i> Update Paper Info </button>
        </div>
      </div>
    </div>

  </form>
</div>



</div>
</div>

<?php if($sid==8){ ?>


        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix" style="padding:10px">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-images"></i> MCQs
            </div>
            

          <table class="table "  id="example" >
 
                 <thead>
                  <!--
                  <th>
                    ID
                 </th>
                  <th style="min-width: 100px">
                    Class
                 </th>
                  <th style="min-width: 100px">
                    Subject
                 </th> 
               -->
                  <th>
                    Chapter
                 </th>
                  <th  class="qover">
                    Question
                 </th>
                  <th  class="optover">
                    Option_1
                 </th>
                  <th class="optover">
                    Option_2
                 </th class="optover">
                  <th>
                    Option_3
                 </th>
                  <th>
                    Option_4
                 </th>
                  <th>
                    Answere
                 </th>
                  <th style="min-width: 100px">
                    Order
                 </th>

                <th style="min-width:120px">
                  Save
                </th>


              </thead>
              <tbody>

                <?php

      $rowsm =mysqli_query($con,"SELECT * FROM pmcqs WHERE pid=$pid ORDER BY ordr " ) or die(mysqli_error($con));
      $n=0;

      while($rowm=mysqli_fetch_array($rowsm)){
        $mcid = $rowm['id']; 
        $mid = $rowm['mid']; 
        $ordr = $rowm['ordr']; 


                $rows =mysqli_query($con,"SELECT * FROM mcqs WHERE id=$mid" ) or die(mysqli_error($con));
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
<!--
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
                      -->

     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM chapters WHERE id=$chapterid ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
              <?php echo $name ?>
<?php } ?>


                      </td>

                      <td class="qover">


                       <span style="display:;"> <?php echo $ques ?></span>
                      </td>

                      <td class="optover">


                       <span > <?php echo $opt1 ?></span>
                      </td>

                      <td class="optover">


                       <span > <?php echo $opt2 ?></span>
                      </td>

                      <td class="optover">


                       <span > <?php echo $opt3 ?></span>
                      </td>

                      <td  class="optover">


                       <span > <?php echo $opt4 ?></span>
                      </td>

                      <td class="optover">


                       <span> <?php echo $ans ?></span>
                      </td>


                        <td>
                             <input type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">

                        </td>


                      <td>
                        <div class="btn-group">

                          <button type="submit" name="savepm<?php echo $n ?>" class="btn btn-success-outline" value="<?php echo $mcid ?>"> <i class="fa fa-save"></i></button>

                          <button type="submit" name="delpm<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $mcid ?>"> <i class="fa fa-trash"></i></button>
                          <input type="text" name="paperid" style="display: none;" value="<?php echo $pid ?>">
                        </div>

                                          </form>

                      </td>
                    </tr>


                  <?php $n++; }  } ?>

                </tbody>
                <tfoot>
                   <!--
                  <th>
                    ID
                 </th>
                  <th style="min-width: 100px">
                    Class
                 </th>
                  <th style="min-width: 100px">
                    Subject
                 </th>
               -->
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
                  <th>
                    Order
                 </th>

                <th style="min-width:120px">
                  Save
                </th>


                </tfoot>

                </table>


<div class="widget-content padded clearfix">
           <center>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add New MCQ
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <td style="width: 400px">
<select class="select2" placeholder="Select MCQ" name="newmcq">
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM mcqs ORDER BY id" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['ques']; 
                    $newcat= $rowx['id']; ?>
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 

                                    </td>
                                  </tr>
                                 

                                  <tr>

                                    <td>
                                      Ordr:
                                    </td>

                                    <td  style="">
                                      <input required="" type="text" value="<?php echo $ordr+1; ?>" class="form-control" name="newordr" value="">
                                    </td>

                                  </tr>



                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                              <button type="submit" name="addpm" class="btn btn-primary"> <i class="fa fa-plus"></i> Add </button>
                            </div>
                          </div>
                        </div>

                                </form>
                      </div>
                   
                   </center>



            </div>
          </div>
        </div>   





<?php } ?>

<?php } } ?>

<div class="space">
</div>




</div>

<?php include('include/footer.php') ?>

</body>
</html>
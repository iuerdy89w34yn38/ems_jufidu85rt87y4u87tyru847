<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    View / Create Paper
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
  <?php if(empty( $_GET['page_name'])) $link = 'newpaper' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['savecat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecat'.$i];
      $name=$_POST['name'.$i];
      $ordr=$_POST['ordr'.$i];




      $sql = "UPDATE classes SET `name` = '$name',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Updated";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['delcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcat'.$i];

      $sql = "DELETE FROM classes WHERE id=$id ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg=" Deleted";



    }

  }



  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['solcat'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['solcat'.$i];
      $solval=$_POST['solval'.$i];
      if($solval==1) $solval=0; else $solval=1;

      $sql = "UPDATE paper SET `sol` = '$solval' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg='Updated';



    }

  }




  if(isset($_POST['addcat'])){

    $msg="Unsuccessful" ;

    $name=$_POST['name'];
    $tid=$username;
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

   $data=mysqli_query($con,"INSERT INTO paper (tid,clid,sid,chid,name,mheading,tm,am,mm,sheading,ts,`as`,ms,lheading,tl,al,ml)VALUES ($tid,'$clid','$sid','$chid','$name','$mheading','$tm','$am','$mm','$sheading','$ts','$as','$ms','$lheading','$tl','$al','$ml')")or die( mysqli_error($con) );
    $rows =mysqli_query($con,"SELECT id FROM paper ORDER BY id desc limit 1" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $pid = $row['id'];

    }



   if ($sid==8) {

      $rowsx =mysqli_query($con,"SELECT id FROM mcqs WHERE subjectid='$sid' AND  classid='$clid' AND  chapterid LIKE '$chid'   ORDER BY RAND() LIMIT $tm" ) or die(mysqli_error($con));
      $n=1;

          while($rowx=mysqli_fetch_array($rowsx)){
              $mid= $rowx['id'];
              $data=mysqli_query($con,"INSERT INTO pmcqs (pid,mid,ordr)VALUES ($pid,'$mid','$n')")or die( mysqli_error($con) );
              $n++;
            }

      $rowsx =mysqli_query($con,"SELECT id FROM sques WHERE subjectid='$sid' AND  classid='$clid' AND  chapterid LIKE '$chid'    ORDER BY RAND() LIMIT $ts" ) or die(mysqli_error($con));
      $n=1;
          while($rowx=mysqli_fetch_array($rowsx)){
              $sqid= $rowx['id'];
              $data=mysqli_query($con,"INSERT INTO pshort (pid,sid,ordr) VALUES ($pid,'$sqid','$n')")or die( mysqli_error($con) );
              $n++;
            }
      $rowsx =mysqli_query($con,"SELECT id,typeid FROM lques WHERE subjectid='$sid' AND  classid='$clid' AND  chapterid LIKE '$chid' AND typeid=1    ORDER BY RAND() LIMIT $tl" ) or die(mysqli_error($con));
      $n=1;
          while($rowx=mysqli_fetch_array($rowsx)){
              $lqid= $rowx['id'];
              $type= $rowx['typeid'];
              $data=mysqli_query($con,"INSERT INTO plong (pid,lid,typeid,ordr) VALUES ($pid,'$lqid','$type','$n')")or die( mysqli_error($con) );
              $n++;
            }
      $rowsx =mysqli_query($con,"SELECT id,typeid FROM lques WHERE subjectid='$sid' AND  classid='$clid' AND  chapterid LIKE '$chid' AND typeid=2    ORDER BY RAND() LIMIT $tl" ) or die(mysqli_error($con));
      $n=1;
          while($rowx=mysqli_fetch_array($rowsx)){
              $lqid= $rowx['id'];
              $type= $rowx['typeid'];
              $data=mysqli_query($con,"INSERT INTO plong (pid,lid,typeid,ordr) VALUES ($pid,'$lqid','$type','$n')")or die( mysqli_error($con) );
              $n++;
            }

   }



   $msg="Added" ;


 }

?>



<style type="text/css">
  
  @media (min-width: 767px){

.modal-dialog {
    width: 96%;
}

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
              <i class="fa fa-images"></i> Existing Papers
            </div>
            <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th style="min-width: 200px">
                   Paper Name 
                 </th>

                <th>
                  Class
                </th>
                <th>
                  Subject
                </th>
                <th>
                  Marks
                </th>
                <th>
                  Date Created
                </th>

                <th>
                  Active
                </th>

                <th style="min-width: 100px">
                  Action
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM paper ORDER BY id" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
 
                  $id = $row['id']; 
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
                  $sol=$row['sol'];
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

                    <tr>
                      <td>
                        <?php echo $name ?>
                      </td>




                      <td>
                        
                        <?php 
                         $rowsx =mysqli_query($con,"SELECT name FROM classes WHERE id='$clid'" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    echo $clname= $rowx['name'];
                    }
                     ?>
                      </td>



                      <td>
                        
                        <?php 
                         $rowsx =mysqli_query($con,"SELECT name FROM subjects WHERE id='$sid'" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    echo $sname= $rowx['name'];
                    }
                     ?>
                      </td>



                      <td>
                        <?php echo $total ?> Marks
                      </td>
                      <td>
                        
                        <?php echo $datec ?>

                      </td>


                      <td>
                  <form method="post" action="" enctype="multipart/form-data">

                        <div class="btn-group">
                        <input type="text" name="solval<?php echo $n ?>" value="<?php echo $sol ?>" class="hidden">

                          <button type="submit" name="solcat<?php echo $n ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> <i class="fa fa-<?php echo ($sol==1) ? 'check' : 'minus'; ?>"></i></button>
                        </div>

                      </td>


                      <td>

                        <div class="btn-group">

                          <a target="_blank" class="btn btn-warning-outline" href="printpaper-<?php echo $id ?>"> <i class="fa fa-print"></i></a>
                          <a class="btn btn-success-outline" href="editpaper-<?php echo $id ?>"> <i class="fa fa-pencil"></i></a>
                          <button type="submit" name="delcat<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>
                        </div>
                  </form>

                      </td>
                    </tr>


                  <?php $n++; } ?>


                  <tr>
                    <td colspan="7" class="text-center">


                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Create New Paper
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="post" action="" enctype="multipart/form-data">

                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New Paper</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table>

                                  <tr>
                                    <td>
                                      Paper Name:
                                    </td>
                                    <td colspan="3">
                                      
                                      <input type="text" class="form-control" name="name" value="">
                                    </td>

                                    <td>
                                    </td>

                                    <td>
                                      Total: <span id="total"></span> Marks
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
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
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
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
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
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 

                                    </td>
                                  </tr>
                                 

                                  <tr>
                                    <td>
                                      MCQs Heading:
                                    </td>
                                    <td colspan="5">
                                      
                                      <input type="text" class="form-control" name="mheading" value="Attempt the Following MCQs. No Multiple Marking Allowed.">
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>
                                      Total MCQs:
                                    </td>
                                    <td>
                                      
                                      <input type="number" class="form-control" name="tm" value="0">
                                    </td>

                                    <td>
                                      Attempt MCQs:
                                    </td>
                                    <td>
                                      
                                      <input onkeyup="ctotal()" onchange="ctotal()" type="number" class="form-control" name="am" value="0">
                                    </td>
                                    <td>
                                      Marks Per MCQ:
                                    </td>
                                    <td>
                                      
                                      <input onkeyup="ctotal()" onchange="ctotal()" type="number" class="form-control" name="mm" value="0">
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>
                                      Short Heading:
                                    </td>
                                    <td colspan="5">
                                      
                                      <input type="text" class="form-control" name="sheading" value="Attempt any 5 Short Questions of your choice. Extra Questions are not Allowed.">
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>
                                      Total Short:
                                    </td>
                                    <td>
                                      
                                      <input type="number" class="form-control" name="ts" value="0">
                                    </td>

                                    <td>
                                      Attempt Short:
                                    </td>
                                    <td>
                                      
                                      <input onkeyup="ctotal()" onchange="ctotal()" type="number" class="form-control" name="as" value="0">
                                    </td>
                                    <td>
                                      Marks Per Short:
                                    </td>
                                    <td>
                                      
                                      <input onkeyup="ctotal()" onchange="ctotal()" type="number" class="form-control" name="ms" value="0">
                                    </td>
                                  </tr>



                                  <tr>
                                    <td>
                                      Long Heading:
                                    </td>
                                    <td colspan="5">
                                      
                                      <input type="text" class="form-control" name="lheading" value="Attempt any 3 Long Questions of your choice.">
                                    </td>
                                  </tr>


                                  <tr>
                                    <td>
                                      Total Short:
                                    </td>
                                    <td>
                                      
                                      <input type="number" class="form-control" name="tl" value="0">
                                    </td>

                                    <td>
                                      Attempt Short:
                                    </td>
                                    <td>
                                      
                                      <input onkeyup="ctotal()" onchange="ctotal()" type="number" class="form-control" name="al" value="0">
                                    </td>
                                    <td>
                                      Marks Per Short:
                                    </td>
                                    <td>
                                      
                                      <input onkeyup="ctotal()" onchange="ctotal()" type="number" class="form-control" name="ml" value="0">
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

    <script type="text/javascript">
      
      function ctotal() {

        am=$('input[name ="am"]').val();
        mm=$('input[name ="mm"]').val();
        as=$('input[name ="as"]').val();
        ms=$('input[name ="ms"]').val();
        al=$('input[name ="al"]').val();
        ml=$('input[name ="ml"]').val();
        tot=am*mm+as*ms+al*ml;

        $('#total').html(tot);
      }

    </script>

  </body>
  </html>
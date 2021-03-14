<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Student Papers
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
  <?php if(empty( $_GET['page_name'])) $link = 'papers' ?>

  <?php


  for ($i=0; $i < $ilimit ; $i++) { 

    if(isset($_POST['start'.$i])){
      $pid=$_POST['start'.$i];

           $rowsx =mysqli_query($con,"SELECT * FROM paper WHERE id='$pid' " ) or die(mysqli_error($con));
          while($rowx=mysqli_fetch_array($rowsx)){
                  $mcqs=$rowx['am'];
                  $mm=$rowx['mm'];
                  $short=$rowx['as'];
                  $ms=$rowx['ms'];
                  $long=$rowx['al'];
                  $ml=$rowx['ml'];
            }



      $data=mysqli_query($con,"INSERT INTO spaper (pid,sid,mcqs,short,`long`,mm,ms,ml)VALUES ($pid,'$stdid','$mcqs','$short','$long','$mm','$ms','$ml')")or die( mysqli_error($con) );

    $rows =mysqli_query($con,"SELECT id FROM spaper ORDER BY id desc limit 1" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $sid = $row['id'];
    }


      ($msg=mysqli_error($con));
      if(empty($msg)) header("location:solve-".$sid.""); // Redirecting To Other Page
        ;



    }

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
              <i class="fa fa-images"></i> Active Papers
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

                <th style="min-width: 100px">
                  Action
                </th>


              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM paper WHERE clid=$stdclass && sol=1 ORDER BY id" ) or die(mysqli_error($con));
                $n=0;
                while($row=mysqli_fetch_array($rows)){
 
                  $pid = $row['id']; 
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




                      <td class="text-center">
                  <form action=""  method="POST">

                          <button type="submit" name="start<?php echo $n ?>" class="btn btn-primary-outline" value="<?php echo $pid ?>"> Start <i class="fa fa-chevron-circle-right"></i></button>
                  </form>

                      </td>
                    </tr>


                  <?php $n++; } ?>


  

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
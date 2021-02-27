<html>
<head>
  <?php include('include/head.php') ?>

  <title>
    Print Paper
  </title>
  <?php if(!empty($_GET['pid'])) $pid = $_GET['pid'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'newpaper' ?>


  <style type="text/css">

    @media (min-width: 767px){
      .modal-dialog {
        width: 96%;
      }
    }

    .table > thead > tr > th {
      text-align: left;
      border: none !important;
    }

    .table thead>tr>th, .table tbody>tr>th, .table tfoot>tr>th, .table thead>tr>td, .table tbody>tr>td, .table tfoot>tr>td {
    padding: 5px 15px;
    line-height: 1;
    vertical-align: middle !important;
    border-top: 0px;
}


    span{
      text-transform: capitalize;
    }

    .opt{
      width: 40%;
    }
  </style>
</head>
<body  onload="window.print()" class="container">
  <?php if(!empty($pid)){ ?>

  <table class="table table-bordered">
    <thead>
      <th colspan="6" style="font-size: 34px; text-align: center">
        <img src="../images/logo.png" width="35px">
        <?php echo $sitename ?>
      </th>
    </thead>
  </table>
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

 <table class="table">
  <thead>
    <th style="text-align: center;">
      Paper:
      <?php echo $name ?>
      <br>
      Teacher:
      <?php echo $tname ?>

    </th>
  </thead>
</table>
<table class="table">
  <thead>
    <th>
      Student Name: 
      <br>
      Student Roll:
    </th>
    <th style="text-align: right;">
      <?php echo $sname ?> - 
      <?php echo $clname ?>
      <br>
      Total Marks:
      <?php echo $total ?>
    </th>
  </thead>
</table>

<table class="table">
  <thead>
    <th>
      <?php echo $mheading ?>
      <span style="text-align: right;float: right;">
        <?php echo $am ?> x <?php echo $mm ?> = <?php echo $tmm ?>

      </span>
    </th>
  </thead>

  <tbody>
    <?php
    $rows =mysqli_query($con,"SELECT * FROM pmcqs WHERE pid=$pid " ) or die(mysqli_error($con));
    $n=1;
    while($row=mysqli_fetch_array($rows)){
      $mid = $row['mid'];
      $rowsx =mysqli_query($con,"SELECT * FROM mcqs WHERE id='$mid'" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
       $mques= $rowx['ques'];
       $opt1= $rowx['opt1'];
       $opt2= $rowx['opt2'];
       $opt3= $rowx['opt3'];
       $opt4= $rowx['opt4'];
       $ans= $rowx['ans'];
     }

     ?>
     <tr>
      <td  style="border-top: "> 
        <?php echo $n ?>) 
        <?php echo $mques ?> 
        <table class="opts">
          <tr>
            <td class="opt">A) <span> <?php echo $opt1 ?></span></td>
            <td>B) <span> <?php echo $opt2 ?></span></td>
          </tr>
          <tr>
            <td class="opt">C) <span> <?php echo $opt3 ?></span></td>
            <td>D) <span> <?php echo $opt4 ?></span></td>
          </tr>
        </table>

      </td>


    </tr>
  <?php $n++;} ?>
</tbody>
</table>
<br>

<table class="table">
  <thead>
    <th>
      <?php echo $sheading ?>
      <span style="text-align: right;float: right;">
        <?php echo $as ?> x <?php echo $ms ?> = <?php echo $tms ?>

      </span>
    </th>
  </thead>

  <tbody>
    <?php
    $rows =mysqli_query($con,"SELECT * FROM pshort WHERE pid=$pid " ) or die(mysqli_error($con));
    $n=1;
    while($row=mysqli_fetch_array($rows)){
      $sid = $row['sid'];
      $rowsx =mysqli_query($con,"SELECT * FROM sques WHERE id='$sid'" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
       $mques= $rowx['ques'];
       $ans= $rowx['ans'];
     }

     ?>
     <tr>
      <td  style=""> 
        <?php echo $n ?>) <?php echo $mques ?> 


      </td>


    </tr>
    <?php $n++; } ?>
  </tbody>
</table>

<br>


<table class="table">
  <thead>
    <th>
      <?php echo $lheading ?>
      <span style="text-align: right;float: right;">
        <?php echo $al ?> x <?php echo $ml ?> = <?php echo $tml ?>
        
      </span>
    </th>
  </thead>
  
  <tbody>
    <?php
    $rows =mysqli_query($con,"SELECT * FROM plong WHERE pid=$pid AND typeid=1 ORDER BY ordr" ) or die(mysqli_error($con));
    $n=0;
    $d=1;
    while($row=mysqli_fetch_array($rows)){
      $lid = $row['lid'];
      $rowsx =mysqli_query($con,"SELECT * FROM lques WHERE id='$lid'" ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
       $lques= $rowx['ques'];
       $ans= $rowx['ans'];
     }
    $rows2 =mysqli_query($con,"SELECT * FROM plong WHERE pid=$pid AND typeid=2 ORDER BY ordr LIMIT 1 OFFSET $n " ) or die(mysqli_error($con));
    while($row2=mysqli_fetch_array($rows2)){
      $lid2 = $row2['lid'];
      $rowsx2 =mysqli_query($con,"SELECT * FROM lques WHERE id='$lid2'" ) or die(mysqli_error($con));
      while($rowx2=mysqli_fetch_array($rowsx2)){
       $lques2= $rowx2['ques'];
       $ans2= $rowx2['ans'];
     }

   }

     ?>
     <tr>
      <td  style=""> 
        Question <?php echo $d ?>:
        <br>
         a) <?php echo $lques ?> 
        <br>
         b) <?php echo $lques2 ?> 
        
        <br>
        <br>
        
      </td>
      

    </tr>
    <?php $n++;$d++; } ?>
  </tbody>
</table>


<?php }} ?>


<?php include('include/footer.php') ?>
</body>
</html>
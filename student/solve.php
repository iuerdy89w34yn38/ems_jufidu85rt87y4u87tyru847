<html>
<head>

  <?php include('include/head.php') ?>
  <script src="newadmin/jquery.min.js"></script>


  <title>
    Solve Paper
  </title>

  <?php if(!empty( $_GET['solid'])) $solid = $_GET['solid'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
  <?php if(empty( $_GET['page_name'])) $link = 'papers' ?>

  <?php



    if(isset($_POST['submitmcqs'])){
      $tm=0;
      $rowsx =mysqli_query($con,"SELECT * FROM spaper WHERE id='$solid' " ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
      $pid = $rowx['pid'];
      $mm = $rowx['mm'];
      }

    for ($i=0; $i < $ilimit ; $i++) { 
      if(!empty($_POST['mcqs'.$i])){
      $mcqs=$_POST['mcqs'.$i];
      $mid=$i;

      $rowsx =mysqli_query($con,"SELECT * FROM mcqs WHERE id='$mid' " ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
      $ans = $rowx['ans']; 
      }

      if (strcasecmp($mcqs, $ans) == 0) {
        $correct=1; 
        $marks=$mm;
      }else{
      $correct=0;
      $marks=0;
      }



      $data=mysqli_query($con,"INSERT INTO smcqs (solid,pid,sid,mid,ans,correct,marks)VALUES ($solid,'$pid','$stdid','$mid','$mcqs','$correct','$marks')")or die( mysqli_error($con) );

      $sql = "UPDATE spaper SET `m` = 1 WHERE `id` =$solid";
      mysqli_query($con, $sql);
      $tm=$tm+$marks;

    }

  }
      $sql = "UPDATE spaper SET `tm` = $tm WHERE `id` =$solid";
      mysqli_query($con, $sql);
  if(empty($_POST['forcesubmit'])) header("location:solve-".$solid.""); else{
      $sql = "UPDATE spaper SET `m` = 1,`s` = 1,`l` = 1 WHERE `id` =$solid";
      mysqli_query($con, $sql);
      header("location:solve-".$solid."");
  }



}



    if(isset($_POST['submitshort'])){

      $rowsx =mysqli_query($con,"SELECT * FROM spaper WHERE id='$solid' " ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
      $pid = $rowx['pid'];
      $ms = $rowx['ms'];
      }

    for ($i=0; $i < $ilimit ; $i++) { 
      if(!empty($_POST['short'.$i])){

      $shortans=$_POST['short'.$i];
      $sqid=$i;

    $image='';
    if (!empty($_FILES['img'.$i]['name'])) {
        // Get image name
      $image = $_FILES['img'.$i]['name'];
      $image = md5(uniqid())  . "1.png";
      
        // image file directory
      $target = "../images/solve/".basename($image);
      if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }

      $data=mysqli_query($con,"INSERT INTO sshort (solid,pid,sid,sqid,ans,img)VALUES ($solid,'$pid','$stdid','$sqid','$shortans','$image')")or die( mysqli_error($con) );

      $sql = "UPDATE spaper SET `s` = 1 WHERE `id` =$solid";
      mysqli_query($con, $sql);


      ($msg=mysqli_error($con));
      //if(empty($msg)) header("location:solve-".$solid."");
      
    }

  }

}


    if(isset($_POST['submitlong'])){

      $rowsx =mysqli_query($con,"SELECT * FROM spaper WHERE id='$solid' " ) or die(mysqli_error($con));
      while($rowx=mysqli_fetch_array($rowsx)){
      $pid = $rowx['pid'];
      $ms = $rowx['ms'];
      }

    for ($i=0; $i < $ilimit ; $i++) { 
      if(!empty($_POST['long'.$i])){

      $ans=$_POST['long'.$i];
      $anstype=$_POST['typeid'.$i];

      $lid=$i;

    $image='';
    if (!empty($_FILES['img'.$i]['name'])) {
        // Get image name
      $image = $_FILES['img'.$i]['name'];
      $image = md5(uniqid())  . "1.png";
      
        // image file directory
      $target = "../images/solve/".basename($image);
      if (move_uploaded_file($_FILES['img'.$i]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }

      $data=mysqli_query($con,"INSERT INTO slong (solid,pid,sid,lid,ans,typeid,img)VALUES ($solid,'$pid','$stdid','$lid','$ans','$anstype','$image')")or die( mysqli_error($con) );

      $sql = "UPDATE spaper SET `l` = 1 WHERE `id` =$solid";
      mysqli_query($con, $sql);


      ($msg=mysqli_error($con));
      //if(empty($msg)) header("location:solve-".$solid."");
      
    }

  }

}


?>



  <style type="text/css">

    @media (min-width: 767px){

      .modal-dialog {
        width: 96%;
      }

    }


.opacity input[type="radio"] {
    display: inline;
}

.has-error{
  background: #fbfbfb;
}
.has-error:after{
  content: 'Please choose atleast 1 option.';
  color: red;
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}

.lab{
  text-transform: capitalize;
}

.blurit{
  filter: blur(10px);
}

.msg:before{
    content: 'Click to Start';
    color: #000;
    font-size: 24px;
    padding: 20px;
    background: #00000021;
    position: absolute;
    z-index: 99;
    top: 35%;
    left: 43%;

}



      /* The snackbar - position it at the bottom and in the middle of the screen */
      #snackbar {
        visibility: hidden; /* Hidden by default. Visible on click */
        min-width: 250px; /* Set a default minimum width */
        margin-left: -125px; /* Divide value of min-width by 2 */
        background-color: #000; /* Black background color */
        color: #fff; /* White text color */
        text-align: center; /* Centered text */
        border-radius: 2px; /* Rounded borders */
        padding: 16px; /* Padding */
        position: fixed; /* Sit on top of the screen */
        z-index: 1; /* Add a z-index if needed */
        left: 50%; /* Center the snackbar */
        bottom: 30px; /* 30px from the bottom */
        border: 1px solid #fff;
      }

      /* Show the snackbar when clicking on a button (class added with JavaScript) */
      #snackbar.show {
        visibility: visible; /* Show the snackbar */
        /* Add animation: Take 0.5 seconds to fade in and out the snackbar. 
        However, delay the fade out process for 2.5 seconds */
        -webkit-animation: fadein 0.5s, fadeout 0.5s;
        animation: fadein 0.5s, fadeout 0.5s;
      }



</style>


</head>
<body id="body" class="page-header-fixed bg-1 " style="overflow: auto;">
  <div class="modal-shiftfix">

<?php if(!empty($solid)){ ?>

    <?php



    $rowsx =mysqli_query($con,"SELECT * FROM spaper WHERE id=$solid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $pid=$rowx['pid'];
      $mcqs=$rowx['mcqs'];
      $mm=$rowx['mm'];
      $short=$rowx['short'];
      $ms=$rowx['ms'];
      $long=$rowx['long'];
      $ml=$rowx['ml'];
      $m=$rowx['m'];
      $s=$rowx['s'];
      $l=$rowx['l'];
      $stime = $rowx['stime']; 
      $etime = $rowx['etime'];

    }



    $rows =mysqli_query($con,"SELECT * FROM paper WHERE id=$pid ORDER BY id" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $tid = $row['tid']; 
      $papername = $row['name'];
      $time = $row['time'];
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

   }



   ?>

<?php 
date_default_timezone_set('Asia/Karachi');
$ts=date("Y-m-d h:i:s",time());
$srts = strtotime($ts);
$srst = strtotime($stime);
$srdiff = $srts - $srst;
$elp = date('i:s', $srts - $srst);
$srtime=strtotime('00:'.$time.':00');
$srelp = strtotime('00:'.$elp);
$remtime = $srtime - $srelp;
$rem = date('i:s', $remtime);
sscanf($rem, "%d:%d:%d", $hours, $minutes, $seconds);
$time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
?>
   <div class="container-fluid main-content">
    <div class="row">
      <!-- Basic Table -->
      <div class="col-lg-1">
      </div>
      <div class="col-lg-10 msg" id="msg">
        <div class="widget-container fluid-height clearfix">
          <div class="heading" style="text-transform: capitalize;">
            <i class="fa fa-images"></i> Solve Paper

            <div style="float: right; font-weight: 600" class=""> 
              <?php 
                        if($remtime<0) echo ' Time Over '; else { ?> 
                      <div class="timerem">

                         <script type="text/javascript">
                           
jQuery(function ($) {
    var time = <?php echo $time_seconds-- ?>,
        display = $('#remtime');
    startTimer(time, display);
});

                         </script>
                      Time Remaining: <span id="remtime"><?php echo $rem ?></span> Mins
                     </div>
                   <?php } ?>



            </div>
          </div>
          <div class="widget-content padded clearfix blurit"  id="paper">


           <table class="table">
            <thead>
              <th style="text-align: center;">
                Paper:
                <?php echo $papername ?>
                <br>
                Teacher:
                <?php echo $tname ?>

              </th>
            </thead>
          </table>
          <table class="table">
            <thead>
              <th>
                Student Name: <?php echo $stdname ?>
                <br>
                Student ID: <?php echo $stdid ?>
              </th>
              <th style="text-align: center;">
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
              <th style="text-align: left;">
                <?php echo $mheading ?>
                <span style="text-align: right;float: right;">
                  <?php echo $am ?> x <?php echo $mm ?> = <?php echo $tmm ?>

                </span>
              </th>
            </thead>
          </table>


<?php if(!empty($mcqs) AND $m==0 ){ ?>


<br>
<br>
<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">

      <?php 
      $n=1;
          $rowsx =mysqli_query($con,"SELECT * FROM pmcqs WHERE pid=$pid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $mid=$rowx['id'];
      $pmid=$rowx['mid'];
      $ordr=$rowx['ordr'];
       ?>
        
        <div class="stepwizard-step">
            <a href="#step-<?php echo $n ?>" type="button" class="btn btn-<?php echo ($n==1) ? 'primary' : 'default' ?>  btn-circle" <?php if($n>1) echo 'disabled="disabled"' ?>><?php echo $n; ?></a>
            <p>Step <?php echo $n; ?></p>
        </div>
        <?php $n++; } ?>
      <div class="stepwizard-step">
          <a href="#step-22" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
          <p>Submit</p>
      </div>



    </div>
</div>
<form id="solform" method="post" action="">

   <?php 
      $n=1;
          $rowsx =mysqli_query($con,"SELECT * FROM pmcqs WHERE pid=$pid ORDER BY RAND()" ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $mid=$rowx['id'];
      $pmid=$rowx['mid'];
      $ordr=$rowx['ordr'];
       ?>

    <div class="row setup-content" id="step-<?php echo $n ?>">
        <div class="col-xs-12">
            <div class="col-md-12">
              <br>
                <h4> MCQs <?php echo $n ?></h4>
              <br>

                <div class="form-group">

                  <?php 
    $rows =mysqli_query($con,"SELECT * FROM mcqs WHERE id=$pmid ORDER BY id" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $ques = $row['ques']; 
      $opt1 = $row['opt1']; 
      $opt2 = $row['opt2']; 
      $opt3 = $row['opt3']; 
      $opt4 = $row['opt4']; 

    }



     $i = 0;
     $fruit = [
        'f1' => $opt1,
        'f2' => $opt2,
        'f3' => $opt3,
        'f4' => $opt4,
    ];


       ?>
    <p><?php echo $ques ?></p>

    <div class="row">
<?php 

for ($j = 0; $j < 4; $j++) {

      $keys;
    if ($i == 0) $keys = array_keys($fruit);
    $length = count($fruit);
    if ($i % $length == 0) shuffle($keys);
    $vals = array($keys[$i % $length], $fruit[$keys[$i++ % $length]]);

list($key, $mcqsvalue) = $vals;
  ?>
      <div class="col-md-6">
            <input required="required" type="radio" id="mcqs<?php echo $i ?>" name="mcqs<?php echo $pmid ?>" value="<?php echo $mcqsvalue ?>">
            <label for="mcqs<?php echo $i ?>" class="lab"> <?php echo "$mcqsvalue";?></label><br>
      </div>

<?php } ?>
      

      
    </div>

 


                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                
                  </div>
        </div>
    </div>

    <?php $n++;  } ?>


    <div class="row setup-content" id="step-22">
        <div class="col-xs-12">
            <div class="col-md-12">
                  <h3> Submit</h3>
                <button name="submitmcqs" class="btn btn-primary btn-lg pull-right" type="submit">Submit!</button>
                  </div>
        </div>
    </div>


</form>
</div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php } else if (!empty($short) AND $s==0 ){  ?>

<h2>Short Questions</h2>
<?php 
  $rowsx =mysqli_query($con,"SELECT pid FROM spaper WHERE id=$solid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $paperid=$rowx['pid'];
    }
  $rowsx =mysqli_query($con,"SELECT sid FROM paper WHERE id=$paperid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $subid=$rowx['sid'];
    }
?>


<?php if($subid==8) { ?>

<br>
<br>
<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">

      <?php 
      $n=1;
          $rowsx =mysqli_query($con,"SELECT * FROM pshort WHERE pid=$pid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $sid=$rowx['id'];
      $psid=$rowx['sid'];
      $ordr=$rowx['ordr'];
       ?>
        
        <div class="stepwizard-step">
            <a href="#step-<?php echo $n ?>" type="button" class="btn btn-<?php echo ($n==1) ? 'primary' : 'default' ?>  btn-circle" <?php if($n>1) echo 'disabled="disabled"' ?>><?php echo $n; ?></a>
            <p>Step <?php echo $n; ?></p>
        </div>
        <?php $n++; } ?>
      <div class="stepwizard-step">
          <a href="#step-22" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
          <p>Submit</p>
      </div>



    </div>
</div>
<form id="solform" method="post" action=""  enctype="multipart/form-data">

   <?php 
      $n=1;
          $rowsx =mysqli_query($con,"SELECT * FROM pshort WHERE pid=$pid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $sid=$rowx['id'];
      $psid=$rowx['sid'];
      $ordr=$rowx['ordr'];
       ?>

    <div class="row setup-content" id="step-<?php echo $n ?>">
        <div class="col-xs-12">
            <div class="col-md-12">
              <br>
                <h4> Short <?php echo $n ?></h4>
              <br>

                <div class="form-group">

                  <?php 
    $rows =mysqli_query($con,"SELECT * FROM sques WHERE id=$psid ORDER BY id" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $qid = $row['id']; 
      $ques = $row['ques']; 

    }


       ?>
    <p><?php echo $ques ?></p>

    <div class="row">


      <div class="col-md-10">
            <textarea placeholder="Your Ans" style="width: 100%;padding: 10px" rows="4" type="text" id="short<?php echo $qid ?>" name="short<?php echo $qid ?>"> </textarea>
            <br>
            <br>
            <input type="file" name="img<?php echo $qid ?>">
      </div>
      

      
    </div>

 


                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                
                  </div>
        </div>
    </div>

    <?php $n++;  } ?>


    <div class="row setup-content" id="step-22">
        <div class="col-xs-12">
            <div class="col-md-12">
                  <h3> Submit</h3>
                <button name="submitshort" class="btn btn-primary btn-lg pull-right" type="submit">Submit!</button>
                  </div>
        </div>
    </div>


</form>
</div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>



<?php } else if (!empty($long) AND $l==0 ){ ?>

<h2>Long Questions</h2>

<?php 
  $rowsx =mysqli_query($con,"SELECT pid FROM spaper WHERE id=$solid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $paperid=$rowx['pid'];
    }
  $rowsx =mysqli_query($con,"SELECT sid FROM paper WHERE id=$paperid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $subid=$rowx['sid'];
    }
?>


<?php if($subid==8) { ?>

<br>
<br>
<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">

      <?php 
      $n=1;
          $rowsx =mysqli_query($con,"SELECT * FROM plong WHERE pid=$pid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $lid=$rowx['id'];
      $plid=$rowx['lid'];
      $ordr=$rowx['ordr'];
       ?>
        
        <div class="stepwizard-step">
            <a href="#step-<?php echo $n ?>" type="button" class="btn btn-<?php echo ($n==1) ? 'primary' : 'default' ?>  btn-circle" <?php if($n>1) echo 'disabled="disabled"' ?>><?php echo $n; ?></a>
            <p>Step <?php echo $n; ?></p>
        </div>
        <?php $n++; } ?>
      <div class="stepwizard-step">
          <a href="#step-22" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
          <p>Submit</p>
      </div>



    </div>
</div>
<form id="solform" method="post" action=""  enctype="multipart/form-data">

   <?php 
      $n=1;
          $rowsx =mysqli_query($con,"SELECT * FROM plong WHERE pid=$pid ORDER BY ordr " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $lid=$rowx['id'];
      $plid=$rowx['lid'];
      $typeid=$rowx['typeid'];
      $ordr=$rowx['ordr'];

       $rowsxe =mysqli_query($con,"SELECT name FROM type WHERE id='$typeid'" ) or die(mysqli_error($con));
                 while($rowxe=mysqli_fetch_array($rowsxe)){
                   $tyname= $rowxe['name'];
                 }
       ?>

    <div class="row setup-content" id="step-<?php echo $n ?>">
        <div class="col-xs-12">
            <div class="col-md-12">
              <br>
                <h4> Long <?php echo round($n/2) ?> <?php echo $tyname ?></h4>
              <br>

                <div class="form-group">

                  <?php 
    $rows =mysqli_query($con,"SELECT * FROM lques WHERE id=$plid ORDER BY id" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $qid = $row['id']; 
      $ques = $row['ques']; 

    }


       ?>
    <p><?php echo $ques ?></p>

    <div class="row">


      <div class="col-md-10">
            <textarea placeholder="Your Ans" style="width: 100%;padding: 10px" rows="4" type="text" id="long<?php echo $qid ?>" name="long<?php echo $qid ?>"> </textarea>
            <br>
            <input type="text" name="typeid<?php echo $qid ?>" value="<?php echo $typeid ?>" class="hidden">
            <br>
            <input type="file" name="img<?php echo $qid ?>">
      </div>
      

      
    </div>

 


                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                
                  </div>
        </div>
    </div>

    <?php $n++;  } ?>


    <div class="row setup-content" id="step-22">
        <div class="col-xs-12">
            <div class="col-md-12">
                  <h3> Submit</h3>
                <button name="submitlong" class="btn btn-primary btn-lg pull-right" type="submit">Submit!</button>
                  </div>
        </div>
    </div>


</form>
</div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>


<?php } else { ?>

<?php 
date_default_timezone_set('Asia/Karachi');
$ts=date("Y-m-d h:i:s",time());
$sql = "UPDATE spaper SET `etime` ='$ts'  WHERE `id` =$solid";
mysqli_query($con, $sql);
echo $msg=mysqli_error($con);
?>
<h2>Paper Completed</h2>


<?php } ?>


<?php } ?>

<div class="space">
</div>
<div id="snackbar">Dont Leave the Paper...</div> 
<audio src="../images/mus.mp3"  id="myAudioElement"></audio>



</div>

<?php include('include/footer.php') ?>

    <script>
    var elem = document.getElementById("body");
    elem.onmouseup = function() {

        req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
        req.call(elem);
        document.getElementById("msg").classList.remove("msg")
        document.getElementById("paper").classList.remove("blurit")

    }

    window.onblur= function() {
        console.log('windows lur');
        showtoast();
    }
    window.onfocus= function() {
        console.log('windows focus');
        hidetoast();
    }

    function showtoast() {

    $("#myAudioElement")[0].play();
    var x = document.getElementById("snackbar");
    x.className = "show";
          document.getElementById("paper").classList.add("blurit")

  }
    function hidetoast() {
      $("#myAudioElement")[0].pause();
      $("#myAudioElement")[0].currentTime = 0;
    var x = document.getElementById("snackbar");
    setTimeout(function(){ 
      x.className = x.className.replace("show", ""); 
      document.getElementById("paper").classList.remove("blurit")
    }, 5000);
  }


    </script>


<script type="text/javascript">
$(document).ready(function () {
    
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='radio']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');


});




function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = duration;
        }

        if(timer==0) {
    
          $('*').removeAttr('required');
          $("#solform").prepend('<input type="text" name="forcesubmit" value="1" class="hidden">');
          $('button[type="submit"]').trigger('click');
        }

    }, 1000);
}





</script>

</body>
</html>
<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Solve Paper
  </title>

  <?php if(!empty( $_GET['sid'])) $sid = $_GET['sid'] ?>
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

      ($msg=mysqli_error($con));
      if(empty($msg)) header("location:solve-".$pid.""); // Redirecting To Other Page
      ;



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

      if(empty($msg))  $msg=$solval;



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
</style>


</head>
<body onload="showtoast()" class="page-header-fixed bg-1 ">
  <div class="modal-shiftfix">


    <?php



    $rowsx =mysqli_query($con,"SELECT * FROM spaper WHERE id=$sid " ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
      $pid=$rowx['pid'];
      $mcqs=$rowx['mcqs'];
      $mm=$rowx['mm'];
      $short=$rowx['short'];
      $ms=$rowx['ms'];
      $long=$rowx['long'];
      $ml=$rowx['ml'];
    }



    $rows =mysqli_query($con,"SELECT * FROM paper WHERE id=$pid ORDER BY id" ) or die(mysqli_error($con));
    while($row=mysqli_fetch_array($rows)){ 
      $tid = $row['tid']; 
      $papername = $row['name'];
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



<?php if(!empty($mcqs)){ ?>

   <div class="container-fluid main-content">
    <div class="row">
      <!-- Basic Table -->
      <div class="col-lg-1">
      </div>
      <div class="col-lg-10">
        <div class="widget-container fluid-height clearfix">
          <div class="heading" style="text-transform: capitalize;">
            <i class="fa fa-images"></i> Solve Paper
          </div>
          <div class="widget-content padded clearfix">


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
<form method="post" action="">

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

list($key, $fruitvalue) = $vals;
  ?>
      <div class="col-md-6">
            <input required="required" type="radio" id="mcqs<?php echo $n ?>" name="mcqs<?php echo $n ?>" value="mcqs<?php echo $n ?>">
            <label for="mcqs<?php echo $n ?>" class="lab"> <?php echo "$fruitvalue";?></label><br>
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
                <button class="btn btn-success btn-lg pull-right" type="submit">Submit!</button>
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

<div class="space">
</div>




</div>

<?php include('include/footer.php') ?>


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

</script>

</body>
</html>
<html>
<head>

  <?php include('include/head.php') ?>
  <title>
    Products Reviews
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['user_name'])) $page = $_GET['user_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'productrevs' ?>


  <?php 


  if(isset($_POST['uprev'])){

      $msg="Unsuccessful" ;
      
       $id=$_POST['uprev'];
       $rating=$_POST['rating'];
       $review1=$_POST['review'];
       $review=str_replace("'", "''", $review1);


       
  $sql = "UPDATE reviews SET `rating` = '$rating',`review` = '$review' WHERE `id` =$id";
  mysqli_query($con, $sql) ;


  $msg="UPdated" ;



  }

?>

  <?php 


  if(isset($_POST['delrev'])){

      $msg="Unsuccessful" ;
      
       $id=$_POST['delrev'];

       
  $sql = "DELETE FROM `reviews` WHERE `id` =$id";
 mysqli_query($con, $sql) ;
     ($msg=mysqli_error($con));
     if(empty($msg))  $msg="Product Deleted"; 


//header("location:productrevs"); // Redirecting To Other Page


  }

?>


  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />
<style type="text/css">
  .fa{
    cursor: pointer;
  }
</style>
</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
    
  
    <?php if (!empty($page)) {

      ?>
                                <form method="post" action="" enctype="multipart/form-data">

      <div class="container-fluid main-content">
        <div class="row">
          <!-- Basic Table -->
          <div class="col-lg-1">
          </div>
          <div class="col-lg-10">
            <div class="widget-container fluid-height clearfix overflow">



<?php 
         $rows =mysqli_query($con,"SELECT * FROM reviews where id='$page'  ORDER BY datec" ) or die(mysqli_error($con));
          while($row=mysqli_fetch_array($rows)){
           $newrevid = $row['id']; 
           $rewproid = $row['proid']; 
           $newrevactid = $row['actid']; 
           $newrating = $row['rating']; 
           $newreview = $row['review']; 
           $newdatec = $row['datec'];

             $rowsx =mysqli_query($con,"SELECT * FROM product where id='$rewproid' LIMIT 1" ) or die(mysqli_error($con));
          while($rowx=mysqli_fetch_array($rowsx)){
           $proname = $rowx['name']; 
           $proimg = $rowx['img1']; }

          $rowsx =mysqli_query($con,"SELECT * FROM users where id='$newrevactid'  ORDER BY datec" ) or die(mysqli_error($con));
          while($rowx=mysqli_fetch_array($rowsx)){
           $actpic = $rowx['img']; 
           $actname = $rowx['name'];
           }

        ?>

   <form action="" method="post">
      <div class="row ratinguser">
   
        <div class="col-md-12">


        </div>
      </div>
      <div class="row">


        <div class="col-md-12 text-center">
          <br>
          <img src="../images/products/<?php echo $proimg ?>" style="width: 140px;">
  
          <br>
          Edit Rating & Review for: <?php echo $proname ?>
        </div>
      </div>
      <div class="row">

        <div class="col-md-1">
        </div>
        <div class="col-md-1">
          <br>
          <img src="../images/users/<?php echo $actpic ?>" style="width: 40px;">
        </div>
        <div class="col-md-4">
          <br>
          <?php echo $actname ?>
          <Br>
          <?php echo $newdatec ?>
        </div>


      </div>
      <br>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          Rating:

   <!--Rating Section -->
  <div id="rating_div" class="w3-container">
        <div class="star-rating">
          <span class="fa divya fa-star-o" data-rating="1" style="font-size:20px;"></span>
          <span class="fa fa-star-o" data-rating="2" style="font-size:20px;"></span>
          <span class="fa fa-star-o" data-rating="3" style="font-size:20px;"></span>
          <span class="fa fa-star-o" data-rating="4" style="font-size:20px;"></span>
          <span class="fa fa-star-o" data-rating="5" style="font-size:20px;"></span>
          <input type="hidden" name="rating" class="rating-value" value="<?php echo $newrating ?>">
          <input type="hidden" name="proid" value="<?php echo $rewproid ?>">
        </div>
  </div>


          
        </div>
        <br>
        <br>

        </div>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          <span>Review:</span>
          <textarea rows="5" class="form-control" name="review"><?php echo $newreview ?></textarea>
          
        </div>

        </div>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10 text-center">
          <br><br>
          <button type="submit" name="uprev" class="btn btn-primary " style="color: #fff" value="<?php echo $newrevid ?>"> Update </button>
          <button type="submit" name="delrev" class="btn btn-danger " style="color: #fff" value="<?php echo $newrevid ?>"> Delete </button>
          <br><Br>
        </div>

        </div>
      </form>
    <?php } ?>


        </div>
      </div>
            
</div>
</div>
</div>

<?php } ?>

<div class="">
  <div class="row">
    <!-- Basic Table -->

    <div class="col-md-12">
      <div class="widget-container fluid-height clearfix overflow">
        <div class="heading">
          <i class="fa fa-users"></i>View, Seacrch or Export the Users.
        </div>
        <div class="widget-content padded clearfix">
          


  <table  class="table "  id="example">
    <thead>
      <tr>
        <td> Product  </td>
        <td> Product Name </td>
        <td> User </td>
        <td> User Name </td>
        <td> User Rating </td>
        <td> User Review </td>
        <td> Manage </td> 
      </tr>
    </thead>
    <tbody>

        <?php
          $rows =mysqli_query($con,"SELECT * FROM reviews  ORDER BY datec" ) or die(mysqli_error($con));
          while($row=mysqli_fetch_array($rows)){
           $revid = $row['id']; 
           $proid = $row['proid']; 
           $revactid = $row['actid']; 
           $rating = $row['rating']; 
           $review = $row['review']; 
           $datec = $row['datec'];

          $rowsx =mysqli_query($con,"SELECT * FROM product where id='$proid' LIMIT 1" ) or die(mysqli_error($con));
          while($rowx=mysqli_fetch_array($rowsx)){
           $proname = $rowx['name']; 
           $proimg = $rowx['img1']; }

          $rowsx =mysqli_query($con,"SELECT * FROM users where id='$revactid'  ORDER BY datec" ) or die(mysqli_error($con));
          while($rowx=mysqli_fetch_array($rowsx)){
           $revactpic = $rowx['img']; 
           $revactname = $rowx['name']; }

           ?>

      <tr>
        <td>
          <a href="dproducts-<?php echo $revactid ?>">
         <img src="../images/products/<?php echo $proimg ?> " style="width: 50px"></td>
       </a>
     </td>
        <td style="max-width: 150px"> <?php echo $proname ?> </td>
        <td>
          <a href="users-<?php echo $revactid ?>">
         <img src="../images/users/<?php echo $revactpic ?> " style="width: 50px"></td>
       </a>
        <td> 
          <a href="users-<?php echo $revactid ?>">
          <?php echo $revactname ?> </td>
        </a>
        <td> 
          <a href="productrevs-<?php echo $revid ?>">

    <div id="rating_div" class="w3-container">
        <div class="star<?php echo rand(1,1000) ?> ">
          <span><strong></strong></span>
          <span class="fa fa-star-o" data-rating="1" ></span>
          <span class="fa fa-star-o" data-rating="2" ></span>
          <span class="fa fa-star-o" data-rating="3" ></span>
          <span class="fa fa-star-o" data-rating="4" ></span>
          <span class="fa fa-star-o" data-rating="5" ></span>
          <input type="hidden" name="rating" class="rating-value" value="<?php echo $rating ?>">
        </div>
  </div>
</a>
 </td>
        <td style="max-width: 200px"> 
          <a href="productrevs-<?php echo $revid ?>">

            <?php echo substr($review,0,50) ?>...
          </a>
        </td>
        <td> <a href="productrevs-<?php echo $revid ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a> </td> 
      </tr>
    <?php } ?>

      
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


<?php include('include/dtfooter.php') ?>





<script>
var $star_rating = $('.star-rating .fa');
var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {
});



</script>


</body>
</html>
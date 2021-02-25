<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Details - Admin Panel
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['dservice_name'])) $page = $_GET['dservice_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'services' ?>

  <?php


  for ($i=0; $i < 2 ; $i++) { 

    if(isset($_POST['upcat'.$i])){
      $msg="Unsuccessful" ;


      $id=$_POST['upcat'.$i];

      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];
      $desp=$_POST['desp'.$i];
      $ordr=$_POST['ordr'.$i];
      $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));

  $catid=$_POST['catid'];
  $subid=$_POST['subid'];



  $rows =mysqli_query($con,"SELECT slug FROM servicecat where id='$catid'  ORDER BY ordr" ) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($rows)){
   $catslug = $row['slug'];        }



   $rows =mysqli_query($con,"SELECT slug FROM servicesubcat where id='$subid'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $subslug = $row['slug'];        }
     




      if(isset($_POST['feat'.$i]) ){
       $feat=1;
     }else{
       $feat=0;
     } 



     for($nt=1;$nt<=$pimglimit;$nt++ ){

    if (!empty($_FILES['img'.$nt]['name'])) {

        $rows =mysqli_query($con,"SELECT img$nt FROM service where id='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $oldimg = $row['img'.$nt];
      if (!empty("../images/services/".$oldimg)) {
    unlink("../images/services/".$oldimg);
        $msg = "OLd Image Deleted";
      }
     }


        // Get image name
      $image = $_FILES['img'.$nt]['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "../images/services/".basename($image);

      $data=mysqli_query($con,"UPDATE service SET `img$nt` ='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img'.$nt]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }
  } 






     $sql = "UPDATE service SET `name` = '$name',`slug` = '$slug',`pid` = '$subid',`pslug` = '$subslug',`mid` = '$catid',`mslug` = '$catslug',`desp` = '$desp',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr',`feat` = '$feat' WHERE `id` =$id";

     mysqli_query($con, $sql) ;
     ($msg=mysqli_error($con));
     if(empty($msg))  $msg="Updated"; 


   }

 }






  if(isset($_POST['delimg'])){
    $msg="Unsuccessful" ;

    $id=$_POST['delimg'];



      $rowsx =mysqli_query($con,"SELECT $id FROM service where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
     $img = $rowx[$id]; 
     unlink("../images/services/".$img);
      }


     $sql = "UPDATE service SET $id = '' WHERE `slug` ='$page' ";

   mysqli_query($con, $sql) ;
   ($msg=mysqli_error($con));

   if(empty($msg))  $msg="Image Deleted";

 }







?>




</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>

    <?php if(!empty($page)) { ?>

      <div class="row">
      <div class="col-lg-1">
      </div>
      <div class="col-lg-10">
        <div class="widget-container fluid-height clearfix">
          <div class="heading" style="text-transform: capitalize;">
            <i class="fa fa-lightbulb"></i> <?php echo $page ?> service Details
            <span style="float: right;    text-decoration: underline;">
              <a href="services"> <i class="fa fa-reply"></i>Back to services </a>
            </span>
          </div>
          <div class="widget-content padded clearfix">
           <form method="post" action="" enctype="multipart/form-data">

            <table class="table table-bordered">
              <thead>
               <th>
                Name 
              </th>

              <th>
                Category 
              </th>
              <th colspan="2">
               Subcategory
             </th>

           </thead>
           <tbody>



             <?php

             $rows =mysqli_query($con,"SELECT * FROM service where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
             $n=0;

             while($row=mysqli_fetch_array($rows)){

               $slug = $row['slug']; 
               $name = $row['name']; 
               $metak = $row['metak']; 
               $metad = $row['metad']; 
               $ordr = $row['ordr']; 
               $id = $row['id']; 
               $subid = $row['pid']; 
               $catid = $row['mid']; 
               $bid = $row['brand']; 
               $feat = $row['feat']; 
               $desp = $row['desp']; 
               $price = $row['price']; 
               $sale = $row['sale']; 
               $saleprice = $row['saleprice']; 
               $sizesm = $row['sizesm']; 
               $sizemd = $row['sizemd']; 
               $sizelg = $row['sizelg']; 
               $img1 = $row['img1']; 
               $img2 = $row['img2']; 
               $img3 = $row['img3']; 
               $img4 = $row['img4']; 
               $img5 = $row['img5']; 


               ?>

               <tr>
                 <td>
                   <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                 </td>

                 <td> 

                <select class="form-control" placeholder="Select Brand" name="catid">
                   <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM servicecat ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
                    <option <?php if($catid==$newcat) echo "selected"; ?> value="<?php echo $newcat ?>"><?php echo $name ?></option>
                  <?php } ?>
                </select>


                </td>
                 <td colspan="2"> 

                <select class="form-control" placeholder="Select Brand" name="subid">
                   <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM servicesubcat ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
                    <option <?php if($subid==$newcat) echo "selected"; ?> value="<?php echo $newcat ?>"><?php echo $name ?></option>
                  <?php } ?>
                </select>

                </td> 


               </tr>
               <tr>
                <td> <strong>Slug</strong> </td> <td> <strong>Order</strong> </td> <td colspan="2"> <strong>Featured </strong></td>
              </tr>

               <tr>

                 <td>
                   <input readonly="" type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                 </td>
                 <td  style="max-width: 60px;">
                   <input required="" type="text" class="form-control" name="ordr<?php echo $n ?>" value="<?php echo $ordr ?>">
                 </td>
                 <td  style="max-width: 60px;">
                   <center>
                     <input type="checkbox" style="display: inline-block;" class="" name="feat<?php echo $n ?>" <?php if($feat==1) echo 'checked' ?> >
                    <spant style="vertical-align: text-bottom;">Show on Homepage </spant>

                   </center>
                 </td>
                

              </tr>
              
               <tr>
                 <td > <strong>Meta Keywords</strong> </td> <td colspan="2"> <strong>Meta Description </strong></td>
              </tr>
              <tr>


              <td >
               <input type="text" placeholder="Meta Keywords" class="form-control" name="metak<?php echo $n ?>" value="<?php echo $metak ?>">
             </td>
             <td colspan="2">
               <input type="text" placeholder="Meta Description" class="form-control" name="metad<?php echo $n ?>" value="<?php echo $metad ?>">
             </td>
           </tr>


    



    </tbody>
  </table>

  <textarea name="desp<?php echo $n ?>" id="editor1"><?php echo $desp; ?></textarea>
  <br>
  <br>
  <style type="text/css">
    .plusimg{
      width: 90px
    }
    .realimg{
      width: 90px
    }
    .inputimg{
      width: 95px
    }
    .mainimg{
      border:1px solid black !important;
    }
  </style>


  <div class="images">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <?php for($nt=1;$nt<=$pimglimit;$nt++){ ?>
            <td class="text-center <?php if($nt==1) echo "mainimg" ?>" >
              <?php if(empty($row["img$nt"])){?>
                <img src="../images/plus.png" class="plusimg" >
              <?php }else{ ?>
                <img src="../images/services/<?php echo $row["img$nt"] ?>" class="realimg">

              <?php } ?>
               <br>
                <br>
              <center>
                <input <?php if( empty($row["img$nt"]) AND $nt==1) echo "required"; ?> type="file" name="img<?php echo $nt ?>" class="inputimg">

              </center>
              <br>
              <form action="" method="POST">
              <button name="delimg" class="btn btn-danger" value="img<?php echo $nt ?>"><i class="fa fa-trash"></i></button>
            </form>
            </td>
          <?php } ?>

        </tr>
      </tbody>
    </table>


  </div>

  <center>

   <button type="submit" name="upcat<?php echo $n ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i> Save</button>

 </center>

</form>
</div>
</div>
</div>
</div>
</div>




<?php } } ?>




</div>



<div class="space"></div>

<?php include('include/footer.php') ?>

<script type="text/javascript">

  $("#salecheck").show(function() {
    if(this.checked){
      $('#saleprice').show();
    }else{
     $('#saleprice').val('0');
     $('#saleprice').hide();
   }
 });

  $("#salecheck").change(function() {
    if(this.checked) {
      $('#saleprice').show();
    }else{
      $('#saleprice').val('0');
      $('#saleprice').hide();

    }
  });



$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});



</script>



</body>
</html>
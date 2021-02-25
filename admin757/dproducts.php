<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Product Details - Admin Panel
  </title>

  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />


  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['dproduct_name'])) $page = $_GET['dproduct_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'products' ?>

  <?php


  for ($i=0; $i < 2 ; $i++) { 

    if(isset($_POST['upcat'.$i])){
      $msg="Unsuccessful" ;


      $id=$_POST['upcat'.$i];

      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $metak=$_POST['metak'.$i];
      $newbid=$_POST['brand'.$i];
      $metad=$_POST['metad'.$i];
      $desp=$_POST['desp'.$i];
      $price=$_POST['price'.$i];
      $saleprice=$_POST['saleprice'.$i];
      $ordr=$_POST['ordr'.$i];
      $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));

  $catid=$_POST['catid'];
  $subid=$_POST['subid'];



  $rows =mysqli_query($con,"SELECT slug FROM productcat where id='$catid'  ORDER BY ordr" ) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($rows)){
   $catslug = $row['slug'];        }



   $rows =mysqli_query($con,"SELECT slug FROM productsubcat where id='$subid'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $subslug = $row['slug'];        }
     




      if(isset($_POST['feat'.$i]) ){
       $feat=1;
     }else{
       $feat=0;
     } 

     if(isset($_POST['sale'.$i]) ){
       $sale=1;
     }else{
       $sale=0;
     } 

     if(isset($_POST['sizesm'.$i]) ){
       $sizesm=1;
     }else{
       $sizesm=0;
     } 
     if(isset($_POST['sizemd'.$i]) ){
       $sizemd=1;
     }else{
       $sizemd=0;
     } 
     if(isset($_POST['sizelg'.$i]) ){
       $sizelg=1;
     }else{
       $sizelg=0;
     } 

     for($nt=1;$nt<=$pimglimit;$nt++ ){

    if (!empty($_FILES['img'.$nt]['name'])) {


      $rows =mysqli_query($con,"SELECT img$nt FROM product where id='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $oldimg = $row['img'.$nt];
      if (!empty("../images/products/".$oldimg)) {
    // unlink("../images/products/".$oldimg);
        $msg = "OLd Image Deleted";
      }
     }

        // Get image name
      $image = $_FILES['img'.$nt]['name'];
      $image = md5(uniqid())  . "1.png";

        // image file directory
      $target = "../images/products/".basename($image);

      $data=mysqli_query($con,"UPDATE product SET `img$nt` ='$image' where `id`='$id'")or die( mysqli_error($con) );

      if (move_uploaded_file($_FILES['img'.$nt]['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }


    }
  } 






     $sql = "UPDATE product SET `name` = '$name',`slug` = '$slug',`pid` = '$subid',`pslug` = '$subslug',`mid` = '$catid',`mslug` = '$catslug',`brand` = '$newbid',`desp` = '$desp',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr',`feat` = '$feat',`price` = '$price',`sale` = '$sale',`saleprice` = '$saleprice',`sizesm` = '$sizesm' ,`sizemd` = '$sizemd' ,`sizelg` = '$sizelg',`pending` = '0' WHERE `id` =$id";

     mysqli_query($con, $sql) ;
     ($msg=mysqli_error($con));
     if(empty($msg))  $msg='Product Updated '; 


   }

 }






  if(isset($_POST['delimg'])){
    $msg="Unsuccessful" ;

    $id=$_POST['delimg'];



      $rowsx =mysqli_query($con,"SELECT $id FROM product where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
     $img = $rowx[$id]; 
     unlink("../images/products/".$img);
      }


     $sql = "UPDATE product SET $id = '' WHERE `slug` ='$page' ";

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
            <i class="fa fa-lightbulb"></i> <?php echo $page ?> product Details
            <span style="float: right;    text-decoration: underline;">
              <a href="products"> <i class="fa fa-reply"></i>Back to products </a>
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

             $rows =mysqli_query($con,"SELECT * FROM product where slug='$page'  ORDER BY ordr" ) or die(mysqli_error($con));
             $n=0;

             while($row=mysqli_fetch_array($rows)){

               $proid = $row['id']; 
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

               $pending = $row['pending']; 


               ?>

               <tr>
                 <td>
                   <input type="text" class="form-control" name="name<?php echo $n ?>" value="<?php echo $name ?>">
                 </td>

                 <td> 

                <select class="form-control" placeholder="Select Brand" name="catid">
                   <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM productcat ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
                    <option <?php if($catid==$newcat) echo "selected"; ?> value="<?php echo $newcat ?>"><?php echo $name ?></option>
                  <?php } ?>
                </select>


                </td>
                 <td colspan="2"> 

                <select class="form-control" placeholder="Select Subcategory" name="subid">
                   <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM productsubcat ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
                    <option <?php if($subid==$newcat) echo "selected"; ?> value="<?php echo $newcat ?>"><?php echo $name ?></option>
                  <?php } ?>
                </select>

                </td> 


               </tr>
               <tr>
                <td style="display: none;"> <strong>Slug</strong> </td><td> <strong>Price</strong> </td> <td> <strong>Order</strong> </td> <td colspan="2"> <strong>Featured </strong></td>
              </tr>

               <tr>

                 <td style="display: none;">
                   <input type="text" class="form-control" name="slug<?php echo $n ?>" value="<?php echo $slug ?>">
                 </td>
                 <td colspan="1">
             <input type="number" placeholder="Price" class="form-control" name="price<?php echo $n ?>" value="<?php echo $price ?>">
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
              
               <tr style="display: none;">
                <td style="display: none"> <strong>Brand</strong> </td> <td> <strong>Meta Keywords</strong> </td> <td colspan="2"> <strong>Meta Description </strong></td>
              </tr>
              <tr style="display: none;">

                <td style="display: none">
                 <select class="form-control" placeholder="Select Brand" name="brand<?php echo $n ?>">
                   <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM brands ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newbid= $rowx['id']; ?>
                    <option <?php if($newbid==$bid) echo "selected"; ?> value="<?php echo $newbid ?>"><?php echo $name ?></option>
                  <?php } ?>
                </select>
              </td>
              <td>
               <input type="text" placeholder="Meta Keywords" class="form-control" name="metak<?php echo $n ?>" value="<?php echo $metak ?>">
             </td>
             <td colspan="3">
               <input type="text" placeholder="Meta Description" class="form-control" name="metad<?php echo $n ?>" value="<?php echo $metad ?>">
             </td>
           </tr>


           <tr style="display: none;">
            <td> <strong>Price</strong> </td> <td> <strong>Sale Price</strong> </td> <td colspan="2"> <strong>Product Sizes </strong></td>
          </tr>
          <tr style="display:none; ">
          

           <td>
             <input id="salecheck" type="checkbox" style="display: inline-block;" class="" name="sale<?php echo $n ?>" <?php if($sale==1) echo 'checked' ?> > Set Before Sale Price
             <br>
             <input id="saleprice" type="number" placeholder="Sale Price" class="form-control" name="saleprice<?php echo $n ?>" value="<?php echo $saleprice ?>">

           </td>
           <td colspan="2">
            <input type="checkbox" style="display: inline-block;" name="sizesm<?php echo $n ?>" <?php if($sizesm==1) echo 'checked' ?>  > Small &nbsp;&nbsp;
            <input type="checkbox" style="display: inline-block;" name="sizemd<?php echo $n ?>" <?php if($sizemd==1) echo 'checked' ?> > Medium &nbsp;&nbsp;
            <input type="checkbox" style="display: inline-block;" name="sizelg<?php echo $n ?>" <?php if($sizelg==1) echo 'checked' ?> > Large

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
                <img src="../images/products/<?php echo $row["img$nt"] ?>" class="realimg">

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

    <br>
    <br>
<?php if($pending==0){ ?>
   <button type="submit" name="upcat<?php echo $n ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> <i class="fa fa-save"></i> Save</button>
    <br>
  <?php }else { ?>
   <button type="submit" name="upcat<?php echo $n ?>" class="btn btn-primary" value="<?php echo $id ?>"> <i class="fa fa-save"></i> Save & Publish</button>
    <br>
<?php } ?>
 </center>

</form>

<div class="prorev">
  <h3> Product Reviews: </h3>
  <center>
  <table class="table" >
    <tbody>
      <tr>
        <td class="text-right">
        <img src="../images/products/<?php echo $img1 ?>" style="height: 90px">
      </td>
      <td>

        <?php  $avgrt =mysqli_query($con,"SELECT AVG(rating) FROM reviews where proid='$proid'  ORDER BY datec" ) or die(mysqli_error($con)); 
          while($avg=mysqli_fetch_array($avgrt)){
           $avgrate = round($avg['AVG(rating)'],1);}
           $avgct =mysqli_query($con,"SELECT id  FROM reviews where proid='$proid'" ) or die(mysqli_error($con));   $countrate=mysqli_num_rows($avgct);
            ?>
          <span><strong>Rating:</strong></span>

             <div id="rating_div" class="w3-container">
        <div class="star<?php echo rand(1,1000) ?> ">
          <span><strong></strong></span>
          <span class="fa fa-star-o" data-rating="1" ></span>
          <span class="fa fa-star-o" data-rating="2" ></span>
          <span class="fa fa-star-o" data-rating="3" ></span>
          <span class="fa fa-star-o" data-rating="4" ></span>
          <span class="fa fa-star-o" data-rating="5" ></span>
          <input type="hidden" name="rating" class="rating-value" value="<?php echo $avgrate ?>">
          <span><?php echo $avgrate ?>   (<?php echo $countrate ?>) </span>

        </div>
  </div>

</td>
</tr>

    </tbody>
  </table>

</center>
          
  <table  class="table "  id="example">
    <thead>
      <tr>
        <td> ID </td>
        <td> User </td>
        <td> User Name </td>
        <td> User Rating </td>
        <td> User Review </td>
        <td> Date Added </td> 
      </tr>
    </thead>
    <tbody>

        <?php
          $rows =mysqli_query($con,"SELECT * FROM reviews where proid='$proid'  ORDER BY datec" ) or die(mysqli_error($con));
          while($row=mysqli_fetch_array($rows)){
           $revid = $row['id']; 
           $revactid = $row['actid']; 
           $rating = $row['rating']; 
           $review = $row['review']; 
           $datec = $row['datec'];

          $rowsx =mysqli_query($con,"SELECT * FROM users where id='$revactid'  ORDER BY datec" ) or die(mysqli_error($con));
          while($rowx=mysqli_fetch_array($rowsx)){
           $revactpic = $rowx['img']; 
           $revactname = $rowx['name']; }

           ?>

      <tr>
        <td> <?php echo $revid ?> </td>
        <td>
          <a href="users-<?php echo $revactid ?>">
         <img src="../images/users/<?php echo $revactpic ?> " style="width: 50px"></td>
       </a>
        <td> 
          <a href="users-<?php echo $revactid ?>">
          <?php echo $revactname ?> </td>
        </a>
        <td> 
          <a href="productrevs-<?php echo $revactid ?>">

    <div id="rating_div" class="w3-container">
        <div class="star<?php echo rand(1,1000) ?> ">
          <span><strong>Rate:</strong></span>
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
          <a href="productrevs-<?php echo $revactid ?>">

            <?php echo substr($review,0,50) ?>...
          </a>
        </td>
        <td> <?php echo $datec ?> </td> 
      </tr>
    <?php } ?>

      
    </tbody>

  </table>


</div>


</div>
</div>
</div>
</div>




<?php } } ?>




</div>



<div class="space"></div>

<?php include('include/footer.php') ?>
<?php include('include/dtfooter.php') ?>

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
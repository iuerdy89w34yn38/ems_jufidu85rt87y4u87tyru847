<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Print  Order
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['order_name'])) $page = $_GET['order_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>


<style type="text/css">
  .noborder{
    border-top: none !important;
  }

  .table tfoot > tr:first-child > td {
    border-top: 1px solid #dddddd;
    padding-top: 10px;
    padding-bottom: 5px;
}


</style>


</head>
<body onload="window.print()" class=" layout-boxed">
  <div class=" ">



    


    <?php if (!empty($page)) {

      ?>

      <div class="container-fluid main-content">
        <div class="row">

          <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
              <div class="widget-content clearfix">



    <?php 
        $rows =mysqli_query($con,"SELECT * FROM shop where  id='$page' LIMIT 1" ) or die(mysqli_error($con));
        $rowcount=mysqli_num_rows($rows);
        $n=0;      $stotal=0;

        while($row=mysqli_fetch_array($rows)){
          $oid = $row['id']; 
          $actid = $row['actid']; 
          $pid = $row['pid']; 
          $qty = $row['qty']; 
          $size = $row['size']; 
          $cstatus = $row['status']; 
          $datec = $row['datec']; 
          $pdate = $row['pdate']; 
          $edate = $row['edate']; 
          $ddate = $row['ddate']; 
                  $expdate = $row['expdate']; 
                  $expreason = $row['expreason'];

    $bfirstname = $row['bfname'];
    $blastname = $row['blname'];
    $bpostalcode = $row['bpostal'];
    $baddress1 = $row['baddress1'];
    $baddress2 = $row['baddress2'];
    $bcity = $row['bcity'];
    $bcountry = $row['bcountry'];
    $bphone = $row['bmobile'];
    $bemail = $row['bemail'];
    $sfirstname = $row['sfname'];
    $slastname = $row['slname'];
    $spostalcode = $row['spostal'];
    $saddress1 = $row['saddress1'];
    $saddress2 = $row['saddress2'];
    $scity = $row['scity'];
    $scountry = $row['scountry'];
    $sphone = $row['smobile'];
    $semail = $row['semail'];
    $inst = $row['inst'];
    
    



              $rowsx =mysqli_query($con,"SELECT name,price,img1 FROM product where id='$pid' " ) or die(mysqli_error($con));
              while($rowx=mysqli_fetch_array($rowsx)){

                $price = $rowx['price'];  
                $proname = $rowx['name']; 
                $image = $rowx['img1']; 
                $total = $qty*$price;
                $stotal = $stotal+$total;


        
          ?>




          <table class="table" style="font-weight: 600;">
            <tr class="text-center">
              <td class="noborder text-left"> <img src="../images/<?php echo $sitelogo ?>" style="width: 50px"> 
               <?php echo $sitename ?> Invoice</td>
              <td class="noborder text-right"> Date: <?php echo $datec ?> </td>

             </tr>
           </table>
           <br>
          <table class="table" style="font-weight: 600;">

         <tr>
        <td colspan="" class="text-left noborder">Order ID: <?php echo $page ?></td><td class="noborder text-center">Product ID: <?php echo $pid ?></td><td class="noborder text-right" >Customer ID: <?php echo $actid ?></td>
      </tr>

          </table>

          <br><br>
          <table class="table">
         <tr>
        <td class="text-right">Product Image: </td><td><img src="../images/products/<?php echo $image ?>" style="width: 50px;"></td>
        <td class="text-right">Product Name: </td><td><?php echo $proname ?></td> 
         <td class="text-right">Size: </td><td> <?php echo $size ?> </td>
      </tr>
      <tr>


       <td class="text-right">Qty</td> <td> <?php echo $qty ?> </td>
       <td class="text-right">Price</td><td><?php echo number_format($price) ?></td>
       <td class="text-right">Total Price</td><td> Rs.  <?php echo number_format($stotal) ?>/- </td>
      </tr>
    </table>

      <?php }?>





<hr><br>
<div class="col-md-12"> 
    
<h4>Billing Details:</h4>


<strong>
    Name:
    </strong>
<?php if(!empty($bfirstname)) echo $bfirstname ; ?> -

<?php if(!empty($blastname)) echo $blastname ; ?>
    <br>

   
<strong>
    Address:
    </strong> 

<?php if(!empty($baddress1)) echo $baddress1 ; ?> ,

<?php if(!empty($baddress)) echo $baddress2 ; ?>

<?php if(!empty($bcountry)) { echo $bcountry ; }?>

<?php if(!empty($bcity)) {  echo $bcity ; }?> 
    
<?php if(!empty($bpostalcode)) echo $bpostalcode ; ?>
<br>

<strong>
Contact:    </strong>
    <br>
<?php if(!empty($bphone)) echo $bphone ; ?>
    <br>
<?php if(!empty($bemail)) echo $bemail ; ?>
</div>

<div class="col-md-12"> 
  <hr>

<h4>Shipping Details:</h4>
 
<strong>
    Name:
    </strong> 
<?php if(!empty($sfirstname)) echo $sfirstname ; ?>

<?php if(!empty($slastname)) echo $slastname ; ?>
 
    <br>

    
<strong>
    Address:
    </strong> 
   
<?php if(!empty($saddress1)) echo $saddress1 ; ?>

<?php if(!empty($saddress2)) echo $saddress2 ; ?>
, 
<?php if(!empty($scountry)) { echo $scountry ; }?>


<?php if(!empty($scity)) {  echo $scity ; } ?>

<?php if(!empty($spostalcode)) echo $spostalcode ; ?>


<br>

   
<strong>
    Contact:
    </strong> 
   
<br>
<?php if(!empty($sphone)) echo $sphone ; ?>
    <br>
    <?php if(!empty($semail)) echo $semail ; ?>   


</div>

<div class="col-md-3">
<br>

  <h4>Special Instructions: </h4>
  </div>
  <div class="col-md-8">
    <br>
    <?php echo $inst ?>
</div>

<br>
 </div>



<div class="container">

<table class="table">
  <tfoot><tr>
    <td class="text-center">Order Status:  <span style="text-transform: uppercase;"> <?php echo $cstatus ?> </span> </td>
   
    <td class="text-center">Cart Entry:  <span> <?php echo $datec ?> </span> </td>
  
  </tr>
  </tfoot>
</table>
<table class="table">
  <tfoot><tr>

    <?php if(!empty($pdate)){ ?>
    <td class="text-center">Cart Confirm Date:  <span> <?php echo $pdate ?> </span> </td>
  <?php } ?>
    <?php if(!empty($edate)){ ?>
    <td class="text-center">Dispatched Date:  <span> <?php echo $edate ?> </span> </td>
  <?php } ?>
    <?php if(!empty($ddate)){ ?>
    <td class="text-center">Delivered Date:  <span> <?php echo $ddate ?> </span> </td>
  <?php } ?>
  </tr>
  </tfoot>
</table>

</div>


      <?php if(!empty($expdate)){ ?>
                <table class="table">
              <tfoot><tr>
                
                <td class="text-center">Cancel / Expire Date:  <span> <?php echo $expdate ?> </span> </td>

                <td class="text-left">Reason :  <span style="text-transform: capitalize;"> <?php echo $expreason ?> </span> </td>

                
              </tr>
            </tfoot>
          </table>

        <?php } ?>
            </div>
          </div>
        </div>
      </div>


    <?php } } ?>



          </div>
        </div>




        <?php include('include/footer.php') ?>

      </body>
      </html>
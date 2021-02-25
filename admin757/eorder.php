<html>
<head>

  <?php include('include/head.php') ?>

  <?php 

  if(isset($_POST['action'])){
    $msg="Unsuccessful" ;

    $oid = $_POST['action'];

    $date = date('Y-m-d');
    $sql = "UPDATE shop SET `status` = 'delivered', `ddate` = '$date' WHERE `id` = '$oid' ";

    mysqli_query($con, $sql) ;
    ($msg=mysqli_error($con));
    if(empty($msg))  $msg="Order Delivery Completed";



  }
  ?>



  <title>
    Enroute Orders
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['order_name'])) $page = $_GET['order_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>


  <style type="text/css">

    #catimg{
      height: 150px;
      width:  200px;
    }

    #catimg1{
      width:  200px;
    }  
    #ccatimg{
      height: 100px;
      width:  150px;
    }

    #ccatimg1{
      width:  120px;
    }




  </style>


  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />


</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
    
    <?php include('include/orderdetail.php') ?>


<div class="">
  <div class="row">

    <div class="col-md-12">
      <div class="widget-container fluid-height clearfix overflow">
        <div class="heading">
          <i class="fa fa-tags"></i>Orders That are In Delivery Right Now.
        </div>
        <div class="widget-content padded clearfix">
          <table class="table "  id="example" >
            <thead>
             <tr>
              <td>Order#</td><td id="minwidth">Customer ID.</td>
              <td>Name </td>
              <td>Image</td><td style="min-width: 100px">Name</td>
              <td>Size</td><td>Qty</td><td></td><td>Price</td>
              <td style="min-width: 150px !important;">Date Created </td>
              <td>Action </td>

            </tr>
          </thead>
          <tbody>

            <?php 
            $rows =mysqli_query($con,"SELECT * FROM shop where status='enroute'  Order By id desc LIMIT $glimit  " ) or die(mysqli_error($con));
            $rowcount=mysqli_num_rows($rows);
            $n=0;      $stotal=0;

            while($row=mysqli_fetch_array($rows)){
              $oid = $row['id']; 
              $pid = $row['pid']; 
              $qty = $row['qty']; 
              $size = $row['size']; 
              $actid = $row['actid']; 
              $datec = $row['datec']; 
              $bfirstname = $row['bfname'];
              $blastname = $row['blname'];



              $rowsx =mysqli_query($con,"SELECT name,price,img1 FROM product where id='$pid' " ) or die(mysqli_error($con));
              while($rowx=mysqli_fetch_array($rowsx)){

                $price = $rowx['price'];  
                $proname = $rowx['name']; 
                $image = $rowx['img1']; 
                $total = $qty*$price;
                $stotal = $stotal+$total;



                ?>

                <tr class="orow" onclick="window.location='eorders-<?php echo $oid ?>'">

                  <td>
                   <?php echo $oid ?> 
                 </td>
                 <td id="minwidth"> <?php echo $actid ?> </td>
                 <td> <?php echo $bfirstname ?> <?php echo $blastname ?> </td>
                 <td><img src="../images/products/<?php echo $image ?>" class="minicartimg"></td><td><?php echo $proname ?></td><td> <?php echo $size ?> </td><td> <?php echo $qty ?> </td><td> x </td><td><?php echo number_format($price) ?></td>
                 <td><?php echo $datec ?>
                 <td><form action="" method="POST">
                  <button type="submit" name="action" value="<?php echo $oid ?>" class="btn"> Delivered </button>
                </form>

              </tr>

            <?php } } ?>
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






</body>
</html>
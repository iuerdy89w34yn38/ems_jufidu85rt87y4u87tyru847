<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Orders Management
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['brand_name'])) $page = $_GET['brand_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>
<style type="text/css">
  .table td {
    font-size: 14px;
    color: #fff;
}

</style>

</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>
    
    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->

        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-tasks"></i>Orders Dashborad 
            </div>
            <div class="widget-content padded clearfix">

              <div class="row">

                <div class="col-sm-6">
                  <div class="card">
                   <a class="ordera" href="corders">

                    <i class="fa fa-shopping-cart"></i> Cart Orders<span class="or"><i class="fa fa-arrow-right"></i>
                      <br> </span>
                      <br>
                      <br>
                      <center><span>Order That are Currently in Customer's Cart:</span></center>
                      <br>

                      <table class="table">
                        <tr>
                          <td class="text-right"> Total Items in Cart: </td><td> 
                            <?php 
                            $rows =mysqli_query($con,"SELECT * FROM shop where status='cart' " ) or die(mysqli_error($con));        
                            echo $rowcount=mysqli_num_rows($rows);
                            ?>
                          </td>
                          <td class="text-right"> Cart Value Total: </td><td>
                            <?php 
                            $stotal=0;
                            while($row=mysqli_fetch_array($rows)){
                              $pid = $row['pid']; 
                              $qty = $row['qty'];  

                              $rowsx =mysqli_query($con,"SELECT name,price FROM product where id='$pid' " ) or die(mysqli_error($con));
                              while($rowx=mysqli_fetch_array($rowsx)){
                                $price = $rowx['price'];  
                                $total = $qty*$price;
                                $stotal = $stotal+$total;  }} ?>
                                Rs. <?php echo number_format($stotal) ?>/-

                              </td>
                            </tr>
                          </table>
                        </a>

                      </div>
                    </div>




                  <div class="col-sm-6">
                    <div class="card">
                     <a class="ordera" href="porders">
                      
                      <i class="fa fa-clock-o"></i> Pending Orders<span class="or"><i class="fa fa-arrow-right"></i>
                        <br> </span>
                      <br>
                      <br>
                        <center><span>Orders Waiting For Admin Approval.</span></center>

                      <br>
                        <table class="table">
                          <tr>
                            <td class="text-right"> Orders: </td><td> 
                              <?php 
                              $rows =mysqli_query($con,"SELECT * FROM shop where status='pending' " ) or die(mysqli_error($con));        
                              echo $rowcount=mysqli_num_rows($rows);
                              ?>
                            </td>
                            <td class="text-right">  Value: </td><td>
                              <?php 
                              $stotal=0;
                              while($row=mysqli_fetch_array($rows)){
                                $pid = $row['pid']; 
                                $qty = $row['qty'];  

                                $rowsx =mysqli_query($con,"SELECT name,price FROM product where id='$pid' " ) or die(mysqli_error($con));
                                while($rowx=mysqli_fetch_array($rowsx)){
                                  $price = $rowx['price'];  
                                  $total = $qty*$price;
                                  $stotal = $stotal+$total;  } } ?>
                                  Rs. <?php echo number_format($stotal) ?>/-

                                </td>
                              </tr>
                            </table>
                          </a>

                        </div>

                      </div>
                    </div>

                    <div class="row">

                      <div class="col-sm-6">
                        <div class="card">
                         <a class="ordera" href="eorders">
                          
                           <i class="fa fa-truck"></i> EnRoute Orders<span class="or"><i class="fa fa-arrow-right"></i>
                            <br> </span>
                      <br>
                      <br>
                            <center><span>Orders That are In Delivery Right Now.</span></center>

                      <br>
                            <table class="table">
                              <tr>
                                <td class="text-right"> Orders: </td><td> 
                                  <?php 
                                  $rows =mysqli_query($con,"SELECT * FROM shop where status='enroute' " ) or die(mysqli_error($con));        
                                  echo $rowcount=mysqli_num_rows($rows);
                                  ?>
                                </td>
                                <td class="text-right">  Value: </td><td>
                                  <?php 
                                  $stotal=0;
                                  while($row=mysqli_fetch_array($rows)){
                                    $pid = $row['pid']; 
                                    $qty = $row['qty'];  

                                    $rowsx =mysqli_query($con,"SELECT name,price FROM product where id='$pid' " ) or die(mysqli_error($con));
                                    while($rowx=mysqli_fetch_array($rowsx)){
                                      $price = $rowx['price'];  
                                      $total = $qty*$price;
                                      $stotal = $stotal+$total;  } } ?>
                                      Rs. <?php echo number_format($stotal) ?>/-

                                    </td>
                                  </tr>
                                </table>
                              </a>

                            </div>

                          </div>





                      <div class="col-sm-6" >
                        <div class="card">
                         <a class="ordera" href="eorders">
                          
                            <i class="fa fa-check"></i> Delivered Orders<span class="or"><i class="fa fa-arrow-right"></i>
                            <br> </span>
                      <br>
                      <br>
                            <center><span>Orders That are Delivered Successfully..</span></center>

                      <br>

                            <table class="table">
                              <tr>
                                <td class="text-right"> Orders: </td><td> 
                                  <?php 
                                  $rows =mysqli_query($con,"SELECT * FROM shop where status='delivered' " ) or die(mysqli_error($con));        
                                  echo $rowcount=mysqli_num_rows($rows);
                                  ?>
                                </td>
                                <td class="text-right">
                                <span>  Value:  </span> </td><td>
                                  <span>
                                  <?php 
                                  $stotal=0;
                                  while($row=mysqli_fetch_array($rows)){
                                    $pid = $row['pid']; 
                                    $qty = $row['qty'];  

                                    $rowsx =mysqli_query($con,"SELECT name,price FROM product where id='$pid' " ) or die(mysqli_error($con));
                                    while($rowx=mysqli_fetch_array($rowsx)){
                                      $price = $rowx['price'];  
                                      $total = $qty*$price;
                                      $stotal = $stotal+$total;  } } ?>
                                      Rs. <?php echo number_format($stotal) ?>/-
                                    </span>

                                    </td>
                                  </tr>
                                </table>
                              </a>
                            </div>

                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="space"></div>



                </div>
              </div>

              <?php include('include/footer.php') ?>

            </body>
            </html>
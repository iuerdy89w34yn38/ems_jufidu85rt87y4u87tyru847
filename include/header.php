<?php 
if(!empty($actid)) {
        $rows =mysqli_query($con,"SELECT * FROM shop where status='cart' AND actid='$actid'" ) or die(mysqli_error($con));        $rowcount=mysqli_num_rows($rows);

      }
?>

<header class="header-wrapper">
    <div class="topbar clearfix" style="background: #ffa037">
      <div class="container">
        
        <ul class="topbar-left">
          <li>The Taste You Will Never Forget...</li>
        </ul>
        <ul class="topbar-right">
       
<?php if(!empty($actid)) { ?>
         
          <li> <i class="fa fa-user"></i> <a href="profile.php"><?php echo $actname ?> </a> </li>
<?php }else{ ?>
          <li> <i class="fa fa-sign-in"></i> <a href="login.php"> Login / Signup </a> </li>


<?php } ?>  
        </ul>

         <ul class="visible-xs">       

          <li class="mobcart bgcolor ">
              <a href="cart.php"><i class="fa fa-shopping-cart"></i> <span><?php echo $rowcount ?></span> </a>
          </li>


        </ul>


      </div>
    </div>
    <div class="text-center">
      <center>
        <br>
     <a href="home"><img src="images/<?php echo $sitelogo; ?>" alt="" class="img-responsive cuslogo"/></a>
   </center>
   </div>

<style type="text/css">
  .cuslogo{
    padding: 10px;
  }

  @media (max-width: 768px){
   .cuslogo {
    padding: 1px;
    position: absolute;
    top: 32px;
    z-index: 9;
    left: 30px;
}
   
  }

  .navigation{
    margin-left: 8%;
}


</style>


    <div class="header clearfix" >
      <nav class="navbar navbar-main navbar-default"style="background-color: #fff">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="header_inner">
               
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-nav"><span class="navbar-header"></span>
                  <ul class="nav navbar-nav navigation">

                    <!--

                    <?php

                    $rows =mysqli_query($con,"SELECT name,slug,res FROM pages  ORDER BY ordr" ) or die(mysqli_error($con));
                              
                      while($row=mysqli_fetch_array($rows)){
                        
                        $slug = $row['slug']; 
                        $name = $row['name']; 
                        $res = $row['res']; 

                        ?>

                    <li <?php if($link==$slug) echo'class="apply_now"' ;?> <?php if($slug=='blogs') echo'class="dropdown"' ; else if($slug=='videos') echo'style="display:none;"'; ?>>

                      <?php if($slug=='blogs'){ ?>
                        

                      <ul class="dropdown-menu">

                        <?php 

                        $rowsx =mysqli_query($con,"SELECT name,slug FROM blogs  ORDER BY ordr" ) or die(mysqli_error($con));
                                  
                          while($rowx=mysqli_fetch_array($rowsx)){
                            
                            $cslug = $rowx['slug']; 
                            $cname = $rowx['name']; 

                            ?>
                          <li><a href="blogs-<?php echo $cslug ?>"><?php echo $cname ?></a></li>

                      <?php } ?>
                      </ul>

                    <?php } ?>



                      <a href="<?php if($res==0) echo'pages-' ;?><?php if($slug=='pages') echo'#'; else  echo $slug ?>"></span><?php echo $name ?></a>

                    </li>
                    <?php } ?>

                  -->

                      <?php

                $rows =mysqli_query($con,"SELECT * FROM productcat  ORDER BY ordr  LIMIT $pclimit" ) or die(mysqli_error($con));
                $n=1;

                while($row=mysqli_fetch_array($rows)){
                  $slug = $row['slug']; 
                  $pslug = $row['slug']; 
                  $name = $row['name']; 
                  $img = $row['img']; 
                  $desp = $row['desp']; 

                  $ordr = $row['ordr']; 
                  $feat = $row['feat']; 
                  $id = $row['id']; 
                  $parentid = $row['id']; 

                  ?>


                    <li   >

                      <a href="products-<?php  echo $slug ?>"></span><?php echo $name ?></a>

                    </li>


                  <?php } ?>


<li class="cartmenu bgcolor hidden-xs">

  <div class="dropdown show">
  <a style="font-size: 19px;color: #fff" class="btn btn-secondary dropdown-toggle hoverwhite" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff">
    
    <i class="fa fa-shopping-cart"></i> <span> <?php if(!empty($actid)) { ?> <?php  echo $rowcount ?> <?php } ?></span>

  </a>
  <div class="dropdown-menu cartdd">
    <?php if(!empty($actid)) { ?>
    <table class="table table-striped">
      <thead>
         <tr>
        <td>Image</td><td style="min-width: 200px">Name</td><td>Size</td><td>Qty</td><td></td><td>Price</td>
      </tr>
      </thead>
      <tbody>

<?php 
        $rows =mysqli_query($con,"SELECT * FROM shop where status='cart' AND actid='$actid'" ) or die(mysqli_error($con));
        $rowcount=mysqli_num_rows($rows);
        $n=0;      $stotal=0;

        while($row=mysqli_fetch_array($rows)){
          $oid = $row['id']; 
          $pid = $row['pid']; 
          $qty = $row['qty']; 
          $size = $row['size']; 


          $rowsx =mysqli_query($con,"SELECT name,price,img1 FROM product where id='$pid' " ) or die(mysqli_error($con));
          while($rowx=mysqli_fetch_array($rowsx)){

            $price = $rowx['price'];  
            $proname = $rowx['name'];
            $image = $rowx['img1']; 

            $total = $qty*$price;
            $stotal = $stotal+$total;

          
        
          ?>

        <tr>
        <td><img src="images/products/<?php echo $image ?>" class="minicartimg"></td><td><?php echo $proname ?></td><td> <?php echo $size ?> </td><td> <?php echo $qty ?> </td><td> x </td><td><?php echo number_format($price) ?></td>
      </tr><tr>
      <?php } } ?>
      </tbody>
      <tfoot>
          <tr>
            <td colspan="3" class="text-right">Total</td><td colspan="3">Rs.  <?php echo number_format($stotal) ?> </td>
          </tr>
          <tr>
            <td colspan="6" class="bgcolor text-center">

                <a href="cart.php" class="bgcolor"  > <div style="width: 100%"> <span class="hoverwhite"> View Cart </span> </div></a>
              </td>
            </tr>
      </tfoot>
      

    </table>
  <?php } ?>
  </div>
</div>
                </li>


              
                  </ul>
                </div><!-- navbar-collapse -->

              </div>
            </div>
          </div>
        </div><!-- /.container -->
      </nav><!-- navbar -->
    </div>
  </header>


  <style type="text/css">
@media (max-width: 767px){
  .navbar-nav>li:hover > .dropdown-menu {
       position: initial;
    display: contents;
}
.topbar {
    display: block;
}
.zs-enabled {
      height: 250px;
    margin-top: 5px;
}

.mobcart {
    position: absolute !important;
    background: #ffa924;
    top: 56px;
    right: 5%;
    padding: 5px 10px;
    z-index: 9;
}


}


@media (min-width: 768px){

  .cartdd{
    color: black;
    padding: 10px;
    top: 30px !important;
    left: -320px !important;
}

@media (min-width: 992px){

  .cartdd{
    color: black;
    padding: 10px;
    top: 30px !important;
    left: -350px !important;
}

}

}

.cartmenu{
  position: relative;
    z-index: 99999;
}

.navbar-nav {
    float: unset;
    display: inline-block;
}

.navbar-toggle {
    position: absolute;
    top: -60px;
    }


  .minicartimg{
    width: 50px
  }
  td{
    vertical-align: middle !important;
    font-size: 14px
  }
</style>

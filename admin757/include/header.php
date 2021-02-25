<button class="navbar-toggle mobheader">
  <i class="fa fa-bars"></i> 
</button>
<div class="navbar navbar-fixed-top">
    <div class="sitetext"> 
       <center><?php echo $sitename ?> </center>
     
    </div>
 
 

    <div class="container-fluid main-nav clearfix">
 

    <div class="nav-collapse">


      <ul class="nav">

        <div id="jquery-accordion-menu" class="jquery-accordion-menu black">
        <div class="jquery-accordion-menu-header" style="margin-bottom: 25px;">Admin Panel</div>


        <ul>

          <li><a href="#"><i class="fa fa-globe"></i>Website Pages </a>
            <ul class="submenu" >
              <li><a <?php if($link=='home') echo'class="active"'?> href="home"> Homepage </a></li>
              <!--
              <li><a <?php if($link=='clients') echo'class="active"'?> href="clients"> Clients </a></li>
              <li><a <?php if($link=='news') echo'class="active"'?> href="news"> News & Events </a></li>
              <li><a <?php if($link=='images') echo'class="active"'?> href="image"> Images Gallery </a></li>
              <li><a <?php if($link=='videos') echo'class="active"'?> href="videos"> Video Gallery </a></li>
            -->
              <li><a <?php if($link=='contacts') echo'class="active"'?> href="contacts"> Contact Us </a></li>
              
        
              <?php $rows =mysqli_query($con,"SELECT name,slug,res,icon FROM pages WHERE hide=0 AND res=0 ORDER BY ordr" ) or die(mysqli_error($con));      
          while($row=mysqli_fetch_array($rows)){
            $slug = $row['slug']; 
            $name = $row['name'];
            $icon = $row['icon'];      ?>
              <li > <a <?php if($link==$slug) echo'class="active"'?> href="cpages-<?php echo $slug ?>"> <?php echo $name ?> </a></li>
            <?php } ?>

              <li><a <?php if($link=='customs') echo'class="active"'?> href="customs">Manage Pages</a></li>


          </li>
            </ul>
          </li>
  <li><a href="#"><i class="fa fa-edit"></i>Blogs </a>
            <ul class="submenu" >
   <?php $rows =mysqli_query($con,"SELECT name,slug FROM blogs ORDER BY ordr" ) or die(mysqli_error($con));      
          while($row=mysqli_fetch_array($rows)){
            $slug = $row['slug']; 
            $name = $row['name'];
               ?>
              <li > <a <?php if($link==$slug) echo'class="active"'?> href="pages-<?php echo $slug ?>"> <?php echo $name ?> </a></li>
            <?php } ?>
              <li><a <?php if($link=='pages') echo'class="active"'?> href="pages"> Add/Manage Blogs</a></li>

            </ul>
          </li>



          <li><a href="#"><i class="fa fa-th-large"></i>Products  </a>
            <ul class="submenu" >
              <li><a <?php if($link=='products') echo'class="active"'?> href="products"> All Products <span class="jquery-accordion-menu-label">12 </span> </a></li>
              <li><a <?php if($link=='productscat') echo'class="active"'?> href="productscat"> Products Category </a></li>
              <li><a <?php if($link=='productrevs') echo'class="active"'?> href="productrevs"> Products Reviews </a></li>
              <li><a <?php if($link=='productreqs') echo'class="active"'?> href="productreqs"> Products Requests </a></li>
              

            </ul>
          </li>


          <li style="display: none"><a href="#"><i class="fa fa-group"></i>Services </a>
            <ul class="submenu" >
              <li><a <?php if($link=='services') echo'class="active"'?> href="services"> All Services </a></li>
              <li><a <?php if($link=='servicescat') echo'class="active"'?> href="servicescat"> Services Category </a></li>
              

            </ul>
          </li>



          <li style="display: "><a href="#"><i class="fa fa-list-ul"></i>Orders Management </a>
            <ul class="submenu" >
              <li><a <?php if($link=='orders') echo'class="active"'?> href="orders"> <i class="fa fa-layer-group"></i> View Orders Dashboard </a></li>
              <li><a <?php if($link=='corders') echo'class="active"'?> href="corders"> <i class="fa fa-shopping-cart"></i> Cart Orders </a></li>
              <li><a <?php if($link=='porders') echo'class="active"'?> href="porders"> <i class="fa fa-clock-o"></i> Pending Orders </a></li>
              <li><a <?php if($link=='eorders') echo'class="active"'?> href="eorders"> <i class="fa fa-truck"></i> Enroute Orders </a></li>
              <li><a <?php if($link=='dorders') echo'class="active"'?> href="dorders"> <i class="fa fa-check"></i> Delivered Orders </a></li>
              <li><a <?php if($link=='exporders') echo'class="active"'?> href="exporders"> <i class="fa fa-minus-circle"></i> Expired Orders </a></li>
              <li><a <?php if($link=='allorders') echo'class="active"'?> href="allorders"> <i class="fa fa-search"></i> Search All Orders </a></li>
              

              

            </ul>
          </li>

          <li><a <?php if($link=='users') echo'class="active"'?> href="users"> <i class="fa fa-users"></i> Users Management </a></li>

          <li><a <?php if($link=='manages') echo'class="active"'?> href="manages"><i class="fa fa-cog"></i>Admin Setting </a></li>


        </ul>
        <div class="jquery-accordion-menu-footer"><a href="logout.php"> <i class="far fa-sign-out fa-flip-horizontal "></i> Logout </a> </div>
      </div>



      </ul>

    </div>
  </div>
</div>




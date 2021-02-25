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



          <li><a <?php if($link=='home') echo'class="active"'?> href="home"> <i class="fa fa-dashboard"></i> Dashboard </a></li>

          <li><a <?php if($link=='classes') echo'class="active"'?> href="classes"> <i class="fa fa-users"></i> Classes </a></li>

          <li><a <?php if($link=='users') echo'class="active"'?> href="users"> <i class="fa fa-users"></i> Users Management </a></li>

          <li><a <?php if($link=='manages') echo'class="active"'?> href="manages"><i class="fa fa-cog"></i>Admin Setting </a></li>


        </ul>
        <div class="jquery-accordion-menu-footer"><a href="logout.php"> <i class="far fa-sign-out fa-flip-horizontal "></i> Logout </a> </div>
      </div>



      </ul>

    </div>
  </div>
</div>




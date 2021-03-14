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
        <div class="jquery-accordion-menu-header" style="margin-bottom: 25px;">Panel</div>


        <ul>



          <li><a <?php if($link=='home') echo'class="active"'?> href="home"> <i class="fa fa-dashboard"></i> Dashboard </a></li>

          <li><a <?php if($link=='papers') echo'class="active"'?> href="papers"> <i class="fa fa-list"></i> View Papers </a></li>



        </ul>
        <div class="jquery-accordion-menu-footer"><a href="logout.php"> <i class="far fa-sign-out fa-flip-horizontal "></i> Logout </a> </div>
      </div>



      </ul>

    </div>
  </div>
</div>




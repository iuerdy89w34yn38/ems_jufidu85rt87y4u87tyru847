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

          <li><a <?php if($link=='index') echo'class="active"'?> href="index"> <i class="fa fa-dashboard"></i> Dashboard </a></li>

          <li></li>


          <li><a <?php if($link=='papers') echo'class="active"'?> href="papers"> <i class="fa fa-align-justify"></i> Papers  </a></li>

          <li><a <?php if($link=='exams') echo'class="active"'?> href="exams"> <i class="fa fa-graduation-cap"></i> Examination </a></li>

          <li></li>


          <li><a <?php if($link=='students') echo'class="active"'?> href="students"> <i class="fa fa-user-circle-o"></i> Students Management </a></li>

          <li><a <?php if($link=='teachers') echo'class="active"'?> href="teachers"> <i class="fa fa-user-circle"></i> Teachers Management </a></li>

          <li><a <?php if($link=='editors') echo'class="active"'?> href="editors"> <i class="fa fa-user"></i> Editors Management </a></li>

          <li></li>


          <li><a <?php if($link=='manages') echo'class="active"'?> href="manages"><i class="fa fa-cog"></i>Admin Setting </a></li>
          <li></li>




          <li><a <?php if($link=='contact') echo'class="active"'?> href="contact"><i class="fa fa-cog"></i>Institute Setting </a></li>
          <li></li>


        </ul>
        <div class="jquery-accordion-menu-footer"><a href="logout.php" style="color: #888"> <i class="fa fa-sign-out  "></i> Logout </a> </div>
      </div>



      </ul>

    </div>
  </div>
</div>



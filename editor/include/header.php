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

          <li><a <?php if($link=='mcqs') echo'class="active"'?> href="mcqs"> <i class="fa fa-check-square"></i> MCQs </a></li>

          <li><a <?php if($link=='sques') echo'class="active"'?> href="sques"> <i class="fa fa-list"></i> Short Questions </a></li>

          <li><a <?php if($link=='lques') echo'class="active"'?> href="lques"> <i class="fa fa-indent"></i> Long Question </a></li>



          <li><a <?php if($link=='classes') echo'class="active"'?> href="classes"> <i class="fa fa-id-badge"></i> Classes </a></li>
          
          <li><a <?php if($link=='subjects') echo'class="active"'?> href="subjects"> <i class="fa fa-th"></i> Subjects </a></li>



        </ul>
        <div class="jquery-accordion-menu-footer"><a href="logout.php"> <i class="far fa-sign-out fa-flip-horizontal "></i> Logout </a> </div>
      </div>



      </ul>

    </div>
  </div>
</div>




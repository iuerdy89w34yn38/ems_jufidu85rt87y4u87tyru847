<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Dashboard
  </title>

  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'Null' ?>

 


</head>
<body onload="showtoast()" class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">


    <?php include('include/header.php') ?>






    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
          <div class="widget-container fluid-height clearfix">
            <div class="heading" style="text-transform: capitalize;">
              <i class="fa fa-images"></i> Dashboard
            </div>
            <div class="widget-content padded clearfix">
             
             
            </div>
          </div>
        </div>
      </div>
    </div>





      <div class="space">
      </div>




    </div>

    <?php include('include/footer.php') ?>

  </body>
  </html>
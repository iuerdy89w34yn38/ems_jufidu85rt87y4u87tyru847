<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

  <?php include 'include/head.php'; ?>

  <title><?php echo $sitename ?></title>

  <?php if(empty($_GET['page_name'])) $link ='home';  ?>
  
  
  <style>

    .card{
      background: #000;
      color:#fff;
      text-align: center;
      padding: 40% 10px;
      min-height: 200px;
      font-size: 18px;
      box-shadow: 2px 2px 5px #565656;
      transition: 0.1s linear;  
    }

    .card:hover{
      font-size: 22px;
      box-shadow: 4px 4px 5px #565656;

    }




  </style>



</head>

<body class="body-wrapper">

  <div class="main_wrapper">






    <center><h2 style="width: 100%;background: #000; color: #fff; padding: 20px">EMS Login</h2></center>


    <br><br>

    <div class="container">
      <div class="row">



         <div class="col-md-3">
            <a href="adminlogin.php">

          <div class="card homecard">

              Admin Login



          </div>
            </a>

        </div>
              


         <div class="col-md-3">
            <a href="editorlogin.php">

          <div class="card homecard">

              Editor Login



          </div>
            </a>

        </div>
              


         <div class="col-md-3">
            <a href="teacherlogin.php">

          <div class="card homecard">

              Teacher Login



          </div>
            </a>

        </div>
              
         <div class="col-md-3">
            <a href="studentlogin.php">

          <div class="card homecard">

              Student Login



          </div>
            </a>

        </div>
              

            <br>

          </div>
        </div>





    <?php include 'include/footer.php'; ?>

  </div>
</body>

</html>


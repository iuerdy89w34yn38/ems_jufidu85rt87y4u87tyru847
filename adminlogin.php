<?php 
session_start();
if(isset($_SESSION['admin'])){
  header("location:admin757/products");
}
?>
 <?php include"include/connect.php";?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<html>
  <head>

<link href="css/login.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
  .form-control{
    border-radius: 1px;
  }
</style>
    <title>
      Login
    </title>
    
  </head>
  <body class="login1">

    <div class="container">
      <br><br>
    <!-- Login Screen -->
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6 text-center" style="background: #f1f1f1; padding: 10%;">
        <h1>
          Admin Login
        </h1>
        <br><br>
        <form action="" method="post">
          <div class="form-group">
            <input class="form-control" name="username" placeholder="Username" type="text">
          </div>
          <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password">
          </div>
          <div class="form-group">

            <input type="submit" name="login" class="btn form-control" style="background: #000;color:#fff" value="Submit >">
          </div>
          
        </form>
        

        <?php
                       
           if (isset($_POST['login'])) {
                       if (empty($_POST['username']) || empty($_POST['password'])) {
                       echo "Username or Password is empty";
                       }
                       else
                       {
                       $username=$_POST['username'];
                       $password=$_POST['password'];
                       $username3 = stripslashes($username);
                       $username2 = str_replace("<", "", $username3);
                       $username1 = str_replace(">", "", $username2);
                       $username = str_replace("'", "", $username1);
                       $password3 = stripslashes($password);
                       $password2 = str_replace("<", "", $password3);
                       $password1 = str_replace(">", "", $password2);
                       $password = str_replace("'", "", $password1);



                       $query = mysqli_query($con,"SELECT * from admins where password='$password' AND username='$username'")or die(mysqli_error($con));
                       $rows = mysqli_num_rows($query);
                       if ($rows == 1) {



                       $_SESSION['name']=$username; // Initializing Session
                      
                  
                       header("location:admin757/products"); // Redirecting To Other Page
                       } else {
                        echo "Username or Password is Invalid";

                       }
                       }
                       }

                       ?>





     </div>
    </div>
    <!-- End Login Screen -->
  </body>
</html>
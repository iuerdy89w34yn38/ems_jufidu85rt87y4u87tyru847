<?php 
session_start();
if(isset($_SESSION['editorid'])){
  header("location:editor/index.php");
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
      Editor Login
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
          Editor Login
        </h1>
        <br><br>
        <form action="" method="post">
          <div class="form-group">
            <input class="form-control" name="email" placeholder="email" type="text">
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
                       if (empty($_POST['email']) || empty($_POST['password'])) {
                       echo "email or Password is empty";
                       }
                       else
                       {
                       $email=$_POST['email'];
                       $password=$_POST['password'];
                       $email3 = stripslashes($email);
                       $email2 = str_replace("<", "", $email3);
                       $email1 = str_replace(">", "", $email2);
                       $email = str_replace("'", "", $email1);
                       $password3 = stripslashes($password);
                       $password2 = str_replace("<", "", $password3);
                       $password1 = str_replace(">", "", $password2);
                       $password = str_replace("'", "", $password1);



                       $query = mysqli_query($con,"SELECT * from editor where password='$password' AND email='$email'")or die(mysqli_error($con));
                       $rows = mysqli_num_rows($query);
                       if ($rows == 1) {



                       $_SESSION['editorid']=$email; // Initializing Session
                      
                  
                       header("location:editor/index.php"); // Redirecting To Other Page
                       } else {
                        echo "email or Password is Invalid";

                       }
                       }
                       }

                       ?>





     </div>
    </div>
    <!-- End Login Screen -->
  </body>
</html>
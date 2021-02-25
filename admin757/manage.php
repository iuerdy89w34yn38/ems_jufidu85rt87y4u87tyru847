<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Manage
  </title>

  <?php $link = $_GET['page_name'] ?>

  <?php

  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['saveres'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['saveres'.$i];
      $name=$_POST['name'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];
      $ordr=$_POST['ordr'.$i];


      $sql = "UPDATE pages SET `name` = '$name',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Saved";


    }

  }



  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['savecus'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['savecus'.$i];
      $name=$_POST['name'.$i];
      $slug1=$_POST['slug'.$i];
      $metak=$_POST['metak'.$i];
      $metad=$_POST['metad'.$i];
      $ordr=$_POST['ordr'.$i];

      $slug2=preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1);
      $slug=strtolower($slug2);


      $sql = "UPDATE pages SET `name` = '$name',`slug` = '$slug',`metak` = '$metak',`metad` = '$metad',`ordr` = '$ordr' WHERE `id` =$id";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));
      if(empty($msg))  $msg="Saved";


    }

  }



  for ($i=0; $i < 10 ; $i++) { 

    if(isset($_POST['delcus'.$i])){
      $msg="Unsuccessful" ;

      $id=$_POST['delcus'.$i];
  
      $sql = "DELETE FROM pages WHERE id=$id AND res=0 ";

      mysqli_query($con, $sql) ;
      ($msg=mysqli_error($con));

      if(empty($msg))  $msg="Page Deleted";

    }

  }




  
  ?>



  <?php
  if(isset($_POST['addcus'])){

      $msg="Unsuccessful" ;
      
       $name=$_POST['newname'];
       $slug1=$_POST['newslug'];
       $metak=$_POST['newmetak'];
       $metad=$_POST['newmetad'];
       $ordr=$_POST['newordr'];


       $slug=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));


  $data=mysqli_query($con,"INSERT INTO pages (name,slug,metak,metad,ordr)VALUES ('$name','$slug','$metak','$metad','$ordr')")or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Page Added";
      
  }

  ?>
  
  <?php
  if(isset($_POST['admin'])){

      $msg="Unsuccessful" ;
      
       $user=$_POST['user'];
       $pass=$_POST['pass'];
       
  $sql = "UPDATE users SET `username` = '$user',`password` = '$pass' ";





  $data=mysqli_query($con,$sql)or die( mysqli_error($con) );

    ($msg=mysqli_error($con));

    if(empty($msg))  $msg="Admin Updated";
      
  }

  ?>
  




</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>


   



    <div class="container-fluid main-content">

      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
         

                 <div class="widget-container fluid-height clearfix">

       <div class="widget-content padded clearfix">
              <table class="table table-bordered">
                <thead>
                  <th>
                   Username 
                 </th>

                 <th>
                     Password
                </th>
                
                 <th>
                     Save
                </th>
                

              </thead>
              <tbody>

                <?php

                $rows =mysqli_query($con,"SELECT * FROM admins " ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                  $name = $row['username']; 
                  $pass = $row['password']; 
                  

                  ?>
                  <form method="post" action="">

                    <tr>
                      <td>
                        <input type="text" class="form-control" name="user" value="<?php echo $name ?>">
                      </td>
                      <td>
                        <input type="text" class="form-control" name="pass" value="<?php echo $pass ?>">
                      </td>
                 
                 


                      <td>

                        <button type="submit" name="admin" class="btn btn-success-outline"> <i class="fa fa-save"></i></button>

                      </td>
                    </tr>

                  </form>

                  <?php $n++; } ?>



                </tbody>
              </table>
            </div>
            
            <center><a class="btn btn-danger" href="logout.php">Logout</a></center>
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
  </div>
</div>

      
    </div>
  </div>
</div>

<?php include('include/footer.php') ?>

</body>
</html>
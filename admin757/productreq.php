<html>
<head>

  <?php include('include/head.php') ?>


  <title>
    Products - Admin  
  </title>

  <link rel="stylesheet" type="text/css"  href="dt/jquery.dataTables.min.css" />
  <link rel="stylesheet" type="text/css"  href="dt/buttons.dataTables.min.css" />



  <?php if(!empty( $_GET['page_name'])) $link = $_GET['page_name'] ?>
  <?php if(!empty( $_GET['product_name'])) $page = $_GET['product_name'] ?>
  <?php if(empty( $_GET['page_name'])) $link = 'products' ?>

  <?php


for ($i=0; $i < $ilimit ; $i++) { 

  if(isset($_POST['delpro'.$i])){
    $msg="Unsuccessful" ;

    $id=$_POST['delpro'.$i];
    

    $rowsx =mysqli_query($con,"SELECT img FROM pimgs where pid='$id'  ORDER BY ordr" ) or die(mysqli_error($con));
    while($rowx=mysqli_fetch_array($rowsx)){
     $img = $rowx['img']; 
     unlink("../images/products/".$img);

     $sql = "DELETE FROM pimg WHERE pid=$id  ";
     mysqli_query($con, $sql) ;
   }


   $sql = "DELETE FROM product WHERE id=$id  ";

   mysqli_query($con, $sql) ;
   ($msg=mysqli_error($con));

   if(empty($msg))  $msg="product Deleted";



 }

}

?>



<?php
if(isset($_POST['addpro'])){

  $msg="Unsuccessful" ;
  
  $name=$_POST['newname'];
  $catid=$_POST['catid'];
  $subid=$_POST['subid'];


  $slug1=$_POST['newname'];

  $slug0=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));
  $slug = $slug0."-".rand(1,100);

  $rows =mysqli_query($con,"SELECT slug FROM productcat where id='$catid'  ORDER BY ordr" ) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($rows)){
   $catslug = $row['slug'];        }



   $rows =mysqli_query($con,"SELECT slug FROM productsubcat where id='$subid'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $subslug = $row['slug'];        }
     



     $data=mysqli_query($con,"INSERT INTO product (name,mid,mslug,pid,pslug,slug)VALUES ('$name','$catid','$catslug','$subid','$subslug','$slug')");

     ($msg=mysqli_error($con));

     if(empty($msg))  $msg="Added";

     header("location:dproducts-$slug");

     
   }
   ?>


   <style type="text/css">
    
    #catimg{
      height: 50px;
      width:  70px;
    }

    #catimg1{
      width:  118px;
    }  

    #subimg{
      height: 50px;
      width:  70px;
    }


    #subimg1{
      height: 100px;
      width:  150px;
    }

    .filein{
      width: 100px;
    }

    .sptd{
      width: 2%;
      max-width: 2%
    }
    .orow:hover {
    background: #c5c5c5;
    color: #000;
}

  </style>

</head>
<body onload="showtoast()"  class="page-header-fixed bg-1 sidebar-nav">
  <div class="modal-shiftfix">



    <?php include('include/header.php') ?>



    <div class="container-fluid main-content">
      <div class="row">
        <!-- Basic Table -->
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading">
              <i class="fa fa-tags"></i>All Products
            </div>
            <div class="widget-content padded clearfix">

          <table class="table "  id="example" >
            <thead>
             <tr>
              <td>ID#</td>
              <td>Name </td>
              <td>Parent </td>
              <td>Image</td>
              <td>Order</td>
              <td>Manage</td>
            </tr>
          </thead>
          <tbody>

            <?php 
            
                $rows =mysqli_query($con,"SELECT * FROM product WHERE pending=1  ORDER BY ordr  LIMIT $plimit" ) or die(mysqli_error($con));
                $n=1;

                while($row=mysqli_fetch_array($rows)){

                  $slug = $row['slug']; 
                  $name = $row['name']; 
                  $img = $row['img1']; 
                  $desp = $row['desp']; 

                  $mid = $row['mid']; 
                  $mslug = $row['mslug']; 
                  $pid = $row['pid']; 
                  $pslug = $row['pslug'];

                  $ordr = $row['ordr']; 
                  $id = $row['id'];

                    $rowst =mysqli_query($con,"SELECT name FROM productcat WHERE slug='$mslug'  ORDER BY ordr  LIMIT $plimit" ) or die(mysqli_error($con));
                while($rowt=mysqli_fetch_array($rowst)){
                  $mname = $rowt['name'];  }

                    $rowst =mysqli_query($con,"SELECT name FROM productsubcat WHERE slug='$pslug'  ORDER BY ordr  LIMIT $plimit" ) or die(mysqli_error($con));
                while($rowt=mysqli_fetch_array($rowst)){
                  $pname = $rowt['name'];  }
                ?>

                <tr class="orow" >

                  <td onclick="window.location='dproducts-<?php echo $slug ?>'">
                   <?php echo $id ?> 
                 </td>
                 <td onclick="window.location='dproducts-<?php echo $slug ?>'"> <?php echo $name ?> </td>
                 <td onclick="window.location='dproducts-<?php echo $slug ?>'"> <?php echo $mname ?> > <?php echo $pname ?> </td>

                 <td onclick="window.location='dproducts-<?php echo $slug ?>'"><img src="../images/products/<?php echo $img ?>" style="width: 50px; "></td>

                 <td onclick="window.location='dproducts-<?php echo $slug ?>'"><?php echo $ordr ?></td>

                 <td> 
            <form method="post" action="" enctype="multipart/form-data">
                    
                        <div class="btn-group">

                          
                            <a href="dproducts-<?php echo $slug ?>" class="btn btn-success-outline" value="<?php echo $id ?>"> <i class="fa fa-eye"></i></a>

                            <a href="dproducts-<?php echo $slug ?>" class="btn btn-primary-outline" value="<?php echo $id ?>"> <i class="fa fa-pencil"></i></a>

                            <button type="submit" name="delpro<?php echo $n ?>" class="btn btn-danger-outline" value="<?php echo $id ?>"> <i class="fa fa-trash"></i></button>

             </form>

                        </div>

                  </td>

               </tr>


             <?php } ?>
           </tbody>

                </table>

           
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="space"></div>



    </div>
  </div>

  <?php include('include/footer.php') ?>


<?php include('include/dtfooter.php') ?>


</body>
</html>
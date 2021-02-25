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
  $subname=$_POST['subid'];


  $slug1=$_POST['newname'];

  $slug0=strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug1));
  $slug = $slug0."-".rand(1,100);

  $rows =mysqli_query($con,"SELECT slug FROM productcat where id='$catid'  ORDER BY ordr" ) or die(mysqli_error($con));
  while($row=mysqli_fetch_array($rows)){
   $catslug = $row['slug'];        }



   $rows =mysqli_query($con,"SELECT slug FROM productsubcat where name='$subname'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $subslug = $row['slug'];        }
     

   $rows =mysqli_query($con,"SELECT id FROM productsubcat where name='$subname'  ORDER BY ordr" ) or die(mysqli_error($con));
   while($row=mysqli_fetch_array($rows)){
     $subid = $row['id'];        }
     



     $data=mysqli_query($con,"INSERT INTO product (name,mid,mslug,pid,pslug,slug)VALUES ('$name','$catid','$catslug','$subid','$subslug','$slug')");

     ($msg=mysqli_error($con));

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
              <td>Price</td>
              <td>Manage</td>
            </tr>
          </thead>
          <tbody>

            <?php 
            
                $rows =mysqli_query($con,"SELECT * FROM product  ORDER BY ordr  LIMIT $plimit" ) or die(mysqli_error($con));
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

                  $price = $row['price']; 
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

                 <td onclick="window.location='dproducts-<?php echo $slug ?>'">Rs. <?php echo number_format($price) ?>/-</td>

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

                <div class="text-center">


                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clientModal">
                                Add New Product
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalL" aria-hidden="true">
                                <form method="post" action="" enctype="multipart/form-data">

                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="clientModalL">Add New Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <table>


                                          <tr>
                                            <td>
                                              Product Name:
                                            </td>
                                            <td>
                                              <input required="" type="text" class="form-control" name="newname" value="">
                                            </td>
                                          </tr>

                                          <tr>

                                            <td>
                                              Select Subcategory:
                                            </td>

                                            <td>
<select required="" id="continents" class="form-control" placeholder="Select Brand" name="catid">
 <option value ="">Select Category</option>  
     <?php
                   $rowsx =mysqli_query($con,"SELECT * FROM productcat ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $name= $rowx['name']; 
                    $newcat= $rowx['id']; ?>
 <option value = "<?php echo $newcat ?>"><?php echo $name ?></option>
<?php } ?>

</select> 
<select id="selectcountries" class="form-control" placeholder="Select Brand" name="subid"></select>

<br>


  <script language="javascript" type="text/javascript">


//create the interdepent selectors
function initSelectors(){
 // next 2 statements should generate error message, see console
 MAIN.createRelatedSelector(); 
 MAIN.createRelatedSelector(document.querySelector('#continents') );
 
 //countries
 MAIN.createRelatedSelector
     ( document.querySelector('#continents')           // from select element
      ,document.querySelector('#selectcountries')      // to select element
      ,{                                               // values object 
         <?php                $rowsx =mysqli_query($con,"SELECT * FROM productcat ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowx=mysqli_fetch_array($rowsx)){
                    $catname= $rowx['name'];
                    $catid= $rowx['id']; ?>
        "<?php echo $catname ?>": [<?php $rowsxq =mysqli_query($con,"SELECT * FROM productsubcat WHERE pid=$catid ORDER BY ordr" ) or die(mysqli_error($con));
                   while($rowxq=mysqli_fetch_array($rowsxq)){ $subname= $rowxq['name']; echo "'".$subname."',"; }?>],
      <?php } ?>Empty: ['Uzbekistan']

      }
      ,function(a,b){return a>b ? 1 : a<b ? -1 : 0;}   // sort method
 );

}

//create MAIN namespace
(function(ns){ // don't pollute the global namespace
    
 function create(from, to, obj, srt){
  if (!from) {
         throw CreationError('create: parameter selector [from] missing');
  }
  if (!to) {
         throw CreationError('create: parameter related selector [to] missing');
  }
  if (!obj) {
         throw CreationError('create: related filter definition object [obj] missing');
  }
  
  //retrieve all options from obj and add it
  obj.all = (function(o){
     var a = [];
     for (var l in o) {
       a = /array/i.test (o[l].constructor) ? a.concat(o[l]) : a;
     }
     return a.sort(srt);
  }(obj));
 // initialize and populate to-selector with all
  populator.call( from
                  ,null
                  ,to
                  ,obj
                  ,srt
  );
    
  // assign handler    
  from.onchange = populator;

  function initStatics(fn,obj){
   for (var l in obj) {
       if (obj.hasOwnProperty(l)){
           fn[l] = obj[l];
       }
   }
   fn.initialized = true;
  }
     
 function populator(e, relatedto, obj, srt){
    // set pseudo statics
    var self = populator;
    if (!self.initialized) {
        initStatics(self,{optselects:obj,optselectsall:obj.all,relatedTo:relatedto,sorter:srt || false});
    }
     
    if (!self.relatedTo){
        throw 'not related to a selector';
    }
    // populate to-selector from filter/all
    var optsfilter = this.selectedIndex < 1
                   ? self.optselectsall 
                   : self.optselects[this.options[this.selectedIndex].firstChild.nodeValue]
       ,cselect = self.relatedTo
       ,opts = cselect.options;
    if (self.sorter) optsfilter.sort(self.sorter);
    opts.length = 0;
    for (var i=0;i<optsfilter.length;i+=1){
        opts[i] = new Option(optsfilter[i],optsfilter[i]);
    }
  }
 }
    
 // custom Error
 function CreationError(mssg){
     return {name:'CreationError',message:mssg};
 }

 // return the create method with some error handling   
 window[ns] = { 
     createRelatedSelector: function(from,to,obj,srt) {
          try { 
              if (arguments.length<1) {
                 throw CreationError('no parameters');
              } 
              create.call(null,from,to,obj,srt); 
          } 
          catch(e) { console.log('createRelatedSelector ->',e.name,'\n'
                                   + e.message +
                                   '\ncheck parameters'); }
        }
 };    
}('MAIN'));
//initialize
initSelectors();

    </script>

                                            </td>
                                          </tr>

                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                                      <button type="submit" name="addpro" class="btn btn-primary"> Next <i class="fa fa-arrow-right"></i> </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>


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
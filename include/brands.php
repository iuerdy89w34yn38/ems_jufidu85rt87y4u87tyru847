


    <br>
    
    
    <div class="brandSection clearfix">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="owl-carousel partnersLogoSlider">
              
            	<?php $rows =mysqli_query($con,"SELECT * FROM product WHERE pid!=30   ORDER BY rand() " ) or die(mysqli_error($con));
                $n=0;

                while($row=mysqli_fetch_array($rows)){

                    $name = $row['name'];
                     $slug = $row['slug'];
                     $id = $row['id'];
                     $img = $row['img1'];
                     $img = $row['img1'];
                     
               


                     

                  ?>
              <div class="slide">
                <div class="partnersLogo clearfix">
                  <a href="dproducts-<?php echo $slug ?>"><img src="images/products/<?php echo $img ?>"></a>
                  <p style="color:black;"><?php echo $name ?></p>
                </div>
              </div>
              
              <?php } ?>
              
            </div>
          </div>
        </div>
      </div>
    </div><!-- Brand-section -->
    
    <style>
    .partnersLogoSlider .slide .partnersLogo img {
    width: 150px !important;
    height: 120px;
}
.brandSection {
    padding: 30px 0 5px;
    
}
    </style>

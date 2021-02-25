<?php include('../../../include/connect.php'); ?> 
<html>
    
    <head>
        
    </head>
    
    <style>
    td {
    border-left:1px solid;
    border-bottom:1px solid;
    }
</style>

<body  style="padding: 10px; background:black; color: white;">
<div style="width:14%; height:700px;float:left;overflow:auto; position:fixed;">
    
    <?php 
        
        
        $tbquery='show tables';
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        
                
        if ($result = $con->query($tbquery)) {
            
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

        if ($result = $con->query($tbquery)) {
            
            foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
                
                     echo '<tr>';
                  foreach($row as $key  => $value) {
                     echo '<td><a style="color:#fff" href="?squery=SELECT * FROM '. $value . '&srun=Submit">'. $value . '</a></td>';
                 }
                 
                     echo '</tr>';
            }
            
            
        }


            echo '</tbody>';
            echo '</table>';



?>
</div>
<div style="width: 85%; float:right;">
    
    <table style="width:100%;">
        <tr>
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
   
    </tr>
    </table>

    <?php
      if(isset($_GET['brun'])){
        $msg="Unsuccessful" ;

    

        $query=$_GET['bquery'];

  
  
        echo '<Br><Br>';  
        echo ' Results for Query: ';
       echo $query ; 

     
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

     
        echo '<Br><Br>
        ';  
        echo '<table style="width:100%; border:1px solid white;" >';
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


<hr style=" border: 1px solid white;">
<br>
    Shortcuts: 
        <br>
        <br>

<table style="border: 1px dashed white;width:100%;padding:20px;">
    <tr>
        <td>
        <form >
            Select Tables
            <table>
            <tr> <td><input name="squery" value="SELECT * FROM table" ></td><td><input type="submit" name="srun" style="float: right;"></td></tr>
            </table>    
         </form>
    </td>
    <td>
    
                <form >
        Rename Tables
        <table>
        <tr> <td><input style="width:300px;" name="bquery" value="RENAME TABLE `oldname` TO `newname`;" ></td><td><input type="submit" name="brun" style="float: right;"></td></tr>
        </table>
     
    </form>
    
        </td>
    <td>
    
                <form >
        Update Tables VAlues
        <table>
        <tr> <td><input style="width:400px;" name="bquery" value="UPDATE `table` SET `col` = 'value' WHERE `id` = 1" ></td><td><input type="submit" name="brun" style="float: right;"></td></tr>
        </table>
     
    </form>
    
        </td>
    </tr>
</table>

<style>
    thead > tr{
        border:1px solid black;
    } 
    
    
    
    
    
</style>

<br>

<hr>
<br>

Admin Credentials:
<br>
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
    
   
</div>
<?php  $current=basename($_SERVER['SCRIPT_FILENAME']); ?>
<a href="<?php echo $current ?>" style="position:fixed; top:10px; right:20px; padding:10px 14px; background:white;color:black;text-decoration:none">X</a>

</body>

</html>


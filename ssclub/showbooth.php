
<?php require_once('function.php'); 

	
	/*if(isset($_GET['id']))
	{
		$booth=$_GET['id'];
		$sql="SELECT * FROM `checkin` WHERE `BoothNo`='$booth' AND `TimeOut` =''";
		$qry=mysql_query($sql) or die(mysql_error());
		//$row=mysql_fetch_array($qry);
		 $num=mysql_num_rows($qry);
		
		if($num>0)
		{
		echo '<span style="color:#FF0000;font-size:14px"><strong>Occupied</strong></span>';
		
		}
		else{
		
		echo '<span style="color:#339900;font-size:14px;"><strong>Empty</strong></span>';
		
		}
		
		}*/
		
	if(isset($_POST['action']) && $_POST['action'] == 'username_availability'){ // Check for the username posted
	$username 		= htmlentities($_POST['username']); // Get the username values
	$check_query	= mysql_query('SELECT BoothNo FROM checkin WHERE BoothNo = "'.$username.'" AND `TimeOut`=""'); // Check the database
	echo mysql_num_rows($check_query); // echo the num or rows 0 or greater than 0
}
		?>
        
	


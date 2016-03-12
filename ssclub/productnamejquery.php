<?php require_once('function.php'); 

	$name = $_POST['name'];
	$qry=mysql_query("SELECT  `product` 
		FROM  `purchase` 
		WHERE  `weapone_no` = '$name'");	
	    $row=mysql_fetch_array($qry);
	    echo $row['product'];

<?php require_once('function.php'); 
	  error_reporting(0);
?>

<?php
		// select product model on base of product type ajax codeing on store.php page
		
		if(isset($_GET['id']))
			{
				$p_type=$_GET['id'];
				$qry=mysql_query("select `pmodel` from `product` where `p_type`='$p_type' GROUP BY `pmodel`");	
				
?>
 <select name="pmodel" id="pmodel">
  		<option value="" >--Product MODEL--</option>
        <?php
        		while($row1=mysql_fetch_array($qry))
				{
		?>
        <option value="<?php echo $row1['pmodel'];?>"><?php echo $row1['pmodel'];?></option>
       <?php }?>
  </select>
<?php }?>
<?php require_once('function.php'); 
	  error_reporting(0);
          
          //echo $_POST['pcode'];
          $p_type=$_POST['pcode'];
          $qry=mysql_query("select * from `product` where `pcode`='$p_type'");	
          if($qry){
              $row=  mysql_fetch_array($qry);
              if(!empty($row)){
                  
                  echo 'Product code already exists';
                  
              }else{
                  
                  echo 'not found';
                  
              }
          }
          
		// select product model on base of product type ajax codeing on store.php page
/*		
		if(isset($_GET['id']))
			{
				$p_type=$_GET['id'];
				$qry=mysql_query("select `pmodel` from `product` where `p_type`='$p_type' GROUP BY `pmodel`");	
				
?>
 <select name="pmodel" id="pmodel" onchange="pcodeget();">
  		<option value="" >--Product MODEL--</option>
        <?php
        		while($row1=mysql_fetch_array($qry))
				{
		?>
        <option value="<?php echo $row1['pmodel'];?>"><?php echo $row1['pmodel'];?></option>
       <?php }?>
  </select>
<?php }?>*/
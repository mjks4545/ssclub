<?php require_once('function.php'); 
	  error_reporting(0);
?>
<?php
		if(isset($_GET['id']))
			{
				$product=$_GET['id'];
                                $first = $product;
                                //if(strchr($product,'to')){
                                //    list($first,$second)=explode('to', $product);
                                
                              //  }elseif(strchr($weapon,',')){
                               //     list($first,$second)=explode(',', $weapon);
                             //   }

				$qry=mysql_query("select `p_type` from `product` where `p_name`='$first' GROUP BY `p_type`");	
?>
  <select name="subproduct" id="subproduct" onchange="getmodel(this.value)">
  		<option value="">--Product Type----</option>
        <?php while($row=mysql_fetch_array($qry))
				{
					$ptype=$row['p_type'];
					$p_name=$row['p_name'];
					$pmodel=$row['pmodel'];
		?>
        <option value="<?php echo $row['p_type'];?>"><?php echo $row['p_type'];?></option>
        <?php }?>
  </select>

 <span id="model"></sapn> 
 <?php }?>
 
 	<?php
    		if(isset($_GET['weapon']))
			{
                    
				$weapon=$_GET['weapon'];
                                $first = $weapon;
				$qry=mysql_query("select `prd_type`,`pmodel` from `purchase` where `weapone_no`='$first' GROUP BY `prd_type`");	
?>

  <select name="subproduct" id="subproduct">
  		<option value="">--Product Type----</option>
        <?php while($row=mysql_fetch_array($qry))
				{
					$ptype=$row['prd_type'];
					$p_name=$row['product'];
					$pmodel=$row['pmodel'];
		?>
        <option value="<?php echo $row[0];?>" <?php if($ptype==$ptype){ echo 'selected="selected"';}?>><?php echo $row[0];?></option>
        
  </select>	
			<span id="model">
          <!---seconde option-------->  
             <select name="pmodel" id="pmodel">
  		<option value="">--Product Model----</option>
      
        <option value="<?php echo $row[1];?>" <?php if($pmodel==$pmodel){ echo 'selected="selected"';}?>><?php echo $row[1];?></option>
       <?php }?>
  </select>	
            </sapn> 
			<?php }?>
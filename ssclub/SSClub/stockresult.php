<?php
				error_reporting(0);
				$quantity="";
				
				if($_GET['pname'] || $_GET['ptype'] || $_GET['pmodel'])
				{
					
					$pname=$_GET['pname'];
					$ptype=$_GET['ptype'];
					$pmodel=$_GET['pmodel'];
				 
				 	if($pname)
					{
					$query=mysql_query("select product,prd_type,pmodel,price,p_id from `purchase` where `product`='$pname' GROUP BY product,prd_type,pmodel") or die();
					} 
				 /*	if($pname)
					{
					$query=mysql_query("select SUM(Quantity),product,prd_type,pmodel,price from `purchase` where `product`='$pname'") or die();
					} */
					
					if($pname && $ptype)
					{
					$query=mysql_query("select SUM(Quantity),product,prd_type,pmodel,price,p_id from `purchase` where `product`='$pname' AND `prd_type`='$ptype' GROUP BY product,prd_type,pmodel") or die();
					}
					if($pname && $ptype && $pmodel)
					{
					$query=mysql_query("select SUM(Quantity),product,prd_type,pmodel,price,p_id from `purchase` where `product`='$pname' AND `prd_type`='$ptype' AND `pmodel`='$pmodel' GROUP BY product,prd_type,pmodel") or die();
					} 
					// sales record fetch..
					
									
					// query 2 sales
				
?>
<div align="center" style="margin-bottom:30px;color:#000;"><h4><strong>Stock Result..</strong></h4></div>
<table width="954" border="1" align="center" style="color:#000">
  <tr align="center" style="background:#CCC">
    <th width="176" height="33" scope="col">Product  Name</th>
    <th width="219" scope="col">Prdocut Type</th>
     <th width="219" scope="col">Prdocut Model</th>
    <th width="248" scope="col">Quantity</th>
    <td width="283"><strong>Price</strong></td>
    <td width="283"><strong>Sales Price</strong></td>
  </tr>
  <?php 
  		$gtotal="";
		$g_price="";
		$g_salesprice="";
		while($row=mysql_fetch_array($query))
  		{
		  $pname=$row['product'];
		  $ptype=$row['prd_type'];
		  $pmodel=$row['pmodel'];
		  $pid=$row['p_id'];
		  
		  // select last price where product and p_type and p_model is same
		  
		  $q_price=mysql_query("select price,sales_price from purchase where `product`='$pname' AND `prd_type`='$ptype' AND `pmodel`='$pmodel' ORDER BY `p_id` DESC") or die(mysql_error());
		   $p_price=mysql_fetch_array($q_price);
		   $price=$p_price[0];
		    $sales_price=$p_price['1'];
			// fetch grand price and grand sales price
			$g_price+=$p_price[0];
			$g_salesprice+=$p_price[1];
 		// fetch quantity from purchase
 		$qry5=mysql_query("select SUM(Quantity) from `purchase` where `product`='$pname' AND `prd_type`='$ptype' AND `pmodel`='$pmodel'") or die(mysql_error());
		 $row5=mysql_fetch_array($qry5);
		  $qty=$row5[0];
		  // fetch quantity from sales
		 $qry2=mysql_query("select SUM(Quantity) from `sales` where `Product`='$pname' AND `SubProduct`='$ptype' AND `pmodel`='$pmodel'") or die(mysql_error());
	  	 $row4=mysql_fetch_array($qry2);
		  $qty1=$row4[0];
		  // fetch quantity from sales_bill2 table whre more sales product are add
		  $qry3=mysql_query("select SUM(qty) from `sale_bill2` where `product`='$pname' AND `p_type`='$ptype' AND `p_model`='$pmodel'") or die();
		  $row6=mysql_fetch_array($qry3);
		  $qty2=$row6[0];
		  // get stock
	  	 $quanty=$qty-$qty1-$qty2;
		 $gtotal+=$quanty;	
  ?>
  
  <tr align="center">
    <th height="27" scope="col"><?php echo $row['product'];?></th>
    <td><?php echo $row['prd_type'];?></td>
    <td><?php echo $row['pmodel'];?></td>
    <td><?php if($pname=='Fire Arms'){?><a href="store.php?page=untitled2&product=<?php echo $pname;?>&type=<?php echo $ptype;?>&pmodel=<?php echo $pmodel;?>"><?php echo $quanty;?></a><?php }else{ ?><?php echo $quanty; }?></td>
    <td><?php echo $price;?></td>
     <td><?php echo $sales_price;?></td>
  </tr>
  <?php }?>
</table>
<div style="float:right;margin-right:170px;">
<table width="530" border="1">
  <tr>
    <th width="140"><?php echo $gtotal;?></th>
    <th width="150"><?php echo $g_price;?></th>
    <th width="150"><?php echo $g_salesprice;}?></th>
    </tr>
</table>
</div>
			
 <?php 			
 				// asceding and descending
					if(isset($_GET['bymodel']) and $_GET['bymodel']=="desc")
					{
						$_GET['bymodel']="asc";
					}else
			if(isset($_GET['bymodel']) and $_GET['bymodel']=="asc")
					{
					$_GET['bymodel']="desc";
					}
					
				// empty submit
				if(empty($_GET['pname']) && empty($_GET['ptype']))
				 {
				
				$query2=mysql_query("select product,prd_type,pmodel,price from `purchase` GROUP BY product,prd_type,pmodel ORDER BY `pmodel` ".$_GET['bymodel']."") or die(); 
				 
				 
						
				
?>
<div align="center" style="color:#000;"><h5 style="margin-bottom:50px"><strong>Stock Result</strong></h5></div>
<table width="959" border="1" align="center" style="color:#000;">
 <tr style="position:fixed;background:#CCC;margin-top:-48px;">
 	<td colspan="6">
    	<table border="1" width="959">
          <tr align="center" style="background:#CCC;">
   			 <th width="180" height="33" scope="col">Product  Name</th>
    		 <th width="430" scope="col">Prdocut Type</th>
    		<th width="330" scope="col">
    		<?php if($_GET['bymodel']==""){?><a href="store.php?page=stockresult&bymodel=asc">Prdocut Model</a><?php }?>
       		<?php if(isset($_GET['bymodel'])=="asc"){?><a href="store.php?page=stockresult&bymodel=desc">Prdocut Model</a><?php }?>
    
   			 </th>
           <th width="80" scope="col">Quantity</th>
          <td width="90"><strong>Price</strong></td>
          <td width="80"><strong>Sales Price</strong></td>
        </tr>
      </table>
   </td>
</tr>
 <?php 
 		
		$gtotal="";
		$g_price="";
		$g_salesprice="";
		while($row2=mysql_fetch_array($query2))
		{
			$proname=$row2['product'];
			 $protype=$row2['prd_type'];
			 $pmodel=$row2['pmodel'];
			 
			 // select last price where product and p_type and p_model is same
		  
		  $q_price1=mysql_query("select price,sales_price from purchase where `product`='$proname' AND `prd_type`='$protype' AND `pmodel`='$pmodel' ORDER BY `p_id` DESC") or die(mysql_error());
		   $p_price1=mysql_fetch_array($q_price1);
		   $price1=$p_price1[0];
		   $sale_price=$p_price1[1]; 
		   // for grand total pirce
		   $g_price+=$p_price1[0];
		   // for grand total sales price
		   $g_salesprice+=$p_price1[1];
		   
			// fetch quantity from purchase
			$qry=mysql_query("select SUM(Quantity) from `purchase` where `product`='$proname' AND `prd_type`='$protype' AND `pmodel`='$pmodel'");
			$record=mysql_fetch_array($qry);
			 $q=$record[0];
			
			// fetch quatity from sales
			$query3=mysql_query("select SUM(Quantity) from `sales` where `Product`='$proname' AND `SubProduct`='$protype' AND `pmodel`='$pmodel'") or die();
			$row3=mysql_fetch_array($query3);
			$quansales=$row3[0];
			
			// fetch record from sales_bill2 
			$query4=mysql_query("select SUM(qty) from `sale_bill2` where `product`='$proname' AND `p_type`='$protype' AND `p_model`='$pmodel'") or die();
		  $row7=mysql_fetch_array($query4);
		  $qtysales2=$row7[0];
		 
		  
		  // get stock
			$quan=$q-$quansales-$qtysales2;
			//echo $gtotal+=$q1-$quansales1-$qtysales3;
			$gtotal+=$quan;
			
 ?>
 
  <tr align="center">
    <th height="27" scope="col"><?php  echo $row2['product']?></th>
    <td><?php echo $row2['prd_type'];?></td>
    <td><?php echo $row2['pmodel'];?></td>
    <td><?php echo $quan?></td>
    <td><?php echo $price1;?></td>
    <td><?php echo $sale_price;?> </td>
  </tr>
  <?php }?>

</table>
<div style="float:right;margin-right:0px;">
<table width="300" border="1">
  <tr>
    <th  width="365"><?php echo $gtotal;?></th>
    <th  width="235"><?php echo $g_price;?></th>
    <th  width="150"><?php echo $g_salesprice;}?></th>
  </tr>
</table>
</div>

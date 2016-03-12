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
					$query=mysql_query("select product,prd_type,pmodel,price,p_id,remarks from `purchase` where `product`='$pname' GROUP BY product,prd_type,pmodel") or die();
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
<div class="main">

    <h1>Stock Result..</h1>

</div>
<table class="responstable">
  <tr>
    <th>Product  Name :</th>
    <th>Prdocut Type :</th>
    <th>Prdocut Model :</th>
    <th>PRD code :</th>
    <th>Status :</th>
    <th>Quantity :</th>
    <th>Price :</th>
    <th>Sales Price :</th>
    <th>ToTL P Price :</th>
    <th>ToTL S Price :</th>
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
                 
                 $ismailshahid1 = "SELECT * FROM `product` WHERE `p_name` = '$pname' AND `p_type` = '$ptype' AND `pmodel` = '$pmodel'";
                        $record4201=  mysql_query($ismailshahid1);
                        $row991=mysql_fetch_array($record4201);
  ?>
  
 <tr>
    <td><?php echo $row['product'];?></td>
    <td><?php echo $row['prd_type'];?></td>
    <td><?php echo $row['pmodel'];?></td>
    <td><?php echo $row991['pcode'];?></td>
    <td><?php echo $row['remarks'];?></td>
    <td><?php if( $pname=='Pistol' || $pname=='Rifle' || $pname=='Shortgun' ){?><a href="store.php?page=untitled2&product=<?php echo $pname;?>&type=<?php echo $ptype;?>&pmodel=<?php echo $pmodel;?>&tqty=<?php echo $quanty;?>"><?php echo $quanty;?></a><?php }else{ ?><?php echo $quanty; }?></td>
    <td><?php echo $price;?></td>
    <td><?php echo $sales_price;?></td>
    <td><?php if($quanty > 0){$somthing2 = $quanty*$price;echo $somthing2;$g_totalpurchase1 += $somthing2;}?> </td>
    <td><?php if($quanty > 0){$somthing3 = $quanty*$sales_price; echo $somthing3; $g_totalsale1 += $somthing3;}?> </td>
     
 </tr>
  <?php }?>
</table>
<table style="width: 428px;margin: 0 auto;" class="responstable">
    <tr>
        <td>QTY :</td>
        <td>Price :</td>
        <td>Sales Price :</td>
        <td>ToTL P Price :</td>
        <td>ToTL S Price :</td>
    </tr>
  <tr>
    <td><?php echo $gtotal;?></td>
    <td><?php echo $g_price;?></td>
    <td><?php echo $g_salesprice;}?></td>
    <td><?php echo $g_totalpurchase1;?></td>
    <td><?php echo $g_totalsale1;?></td>
  </tr>
</table>
			
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
				
				$query2=mysql_query("select product,prd_type,pmodel,price,remarks from `purchase` GROUP BY product,prd_type,pmodel ORDER BY `pmodel` ".$_GET['bymodel']."") or die(); 
				 
				 
						
				
?>
<div class="main">
    <h1>Stock Result</h1>
</div>
<table class="responstable">
    <tr id="sticky">
        <th>Product  Name :</th>
    	<th>Prdocut Type :</th>
        <th>
    		<?php if($_GET['bymodel']==""){?><a style="color:white;" href="store.php?page=stockresult&bymodel=asc">Prdocut Model</a><?php }?>
       		<?php if(isset($_GET['bymodel'])=="asc"){?><a style="color:white;" href="store.php?page=stockresult&bymodel=desc">Prdocut Model</a><?php }?>
    
   	</th>
                         <th width="60" scope="col">PRD code</th>
                         <th width="60" scope="col">Status</th>
          <th>Qty</th>
          <th>Price :</th>
          <th>Sales Price :</th>
          <th>ToTL P Price :</th>
          <th>ToTL S Price :</th>
    </tr>
 <?php 
 		
		$gtotal="";
		$g_price="";
		$g_salesprice="";
                $g_totalpurchase="";
                $g_totalsale="";
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
                        
                        $ismailshahid = "SELECT * FROM `product` WHERE `p_name` = '$proname' AND `p_type` = '$protype' AND `pmodel` = '$pmodel'";
                        $record420=  mysql_query($ismailshahid);
                        $row99=mysql_fetch_array($record420);
                        
 ?>
 
  <tr>
    <td><?php  echo $row2['product']?></td>
    <td><?php echo $row2['prd_type'];?></td>
    <td><?php echo $row2['pmodel'];?></td>
    <td><?php echo $row99['pcode'];?></td>
    <td><?php echo $row2['remarks'];?></td>
    <td><?php echo $quan?></td>
    <td><?php echo $price1;?></td>
    <td><?php echo $sale_price;?> </td>
    <td><?php if($quan > 0){$somthing = $quan*$price1;echo $somthing;$g_totalpurchase += $somthing;}?> </td>
     <td><?php if($quan > 0){$somthing1 = $quan*$sale_price; echo $somthing1; $g_totalsale += $somthing1;}?> </td>
  </tr>
  <?php }?>

</table>

   <div class="main"><h4 style="text-align: center">Total</h4></div>
   <table style="width: 459px;margin:0 auto;"class="responstable">
       
    <tr>
        <td>QTY :</td>
        <td>Price :</td>
        <td>Sales Price</td>
        <td>ToTL P Price</td>
        <td>ToTL S Price</td>
    </tr>
  <tr>
      
    <td><?php echo $gtotal;?></td>
    <td><?php echo $g_price;?></td>
    <td><?php echo $g_salesprice;}?></td>
    <td><?php echo $g_totalpurchase;?></td>
    <td><?php echo $g_totalsale;?></td>
  </tr>
</table>
   <br><br>
<script>
//var stickyOffset = $('#sticky').offset().top;
    $(window).scroll(function(){
  var sticky = $('#sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 300) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});


</script>
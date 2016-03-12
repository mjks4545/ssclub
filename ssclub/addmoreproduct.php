<?php
						// insert more sales 
			if(isset($_POST['submit']))
			{
				$sid=$_GET['sid'];
				$product=$_POST['product'];
				$p_type=$_POST['subproduct'];
				$p_model=$_POST['pmodel'];
				$weapon=$_POST['weapon'];
				$quantity=$_POST['quantity'];
				if(isset($_POST['rate'])){
                                    $rate=$_POST['rate'];
                                }else{
                                    $rate=$_POST['amount'];
                                }
				$total=$_POST['total'];
				$details=$_POST['details'];
				
				if($product!="" && $p_type!="" && $p_model!="")
				{
                                    if(strchr($weapon,'to')){
                                                    $quantity = 1;
                                                    list($first,$second)=explode('to', $weapon);
                                                    $first = str_replace(' ', '', $first);
                                                    $second = str_replace(' ', '', $second);
                                                    //echo $first;
                                                if(ctype_digit ( $first )){
                                                    
                                                    echo '5';
                                                    $third =  $second - $first;
                                                    //mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$first','$membership','$quantity','$amount','$amount','$details','$date')") or die(mysql_error());
                                                    ltrim($first);
                                                    $first = $first+1;
                                                    //$sid=mysql_insert_id();
                                                    for($i=0;$i<=$third;$i++){
                                                            echo "rate".$rate;
                                                            mysql_query("insert into `sale_bill2` values('','$product','$p_type','$p_model','$first','$quantity','$rate','$rate','$details','$sid')") or die(mysql_error());
                                                            $first = $first+1;
                                                        }
                                                    
                                                }else{
                                                    echo '1';
                                                    
                                                    
                                                    $secondvar= $second;
                                                    $firstvar = $first;
                                                    if(!is_int ( $first )){
                                                        echo '2';
                                                        preg_match_all('/([0-9]+|[a-zA-Z]+)/',$first,$matches);
                                                        $firstvar = end(end($matches));
                                                        
                                                    }
                                                    if(!is_int ($second)){
                                                        echo '3';
                                                        preg_match_all('/([0-9]+|[a-zA-Z]+)/',$second,$matches1);                                                
                                                        $secondvar =  end(end($matches1));  
                                                        
                                                    }
                                                    echo '4';
                                                    $third =  $secondvar - $firstvar;
                                                    //echo $third;
                                                    //die();
                                                    $current = current(current($matches));
                                                       
                                                        //mysql_query("insert into `sales` values ('','$cname','$nic','$mobile','$address','$Product','$subproduct','$pmodel','$LicenseNo','$first','$membership','$quantity','$amount','$amount','$details','$date')") or die(mysql_error());
                                                       
                                                       // $firstvar = $firstvar + 1;
                                                        //$sid=mysql_insert_id();
                                                       
                                                        for($i=0;$i<=$third;$i++){
                                                            $first = $current.$firstvar;
                                                            mysql_query("insert into `sale_bill2` values('','$product','$p_type','$p_model','$first','$quantity','$rate','$rate','$details','$sid')") or die(mysql_error());
                                                            $firstvar = $firstvar + 1;
                                                        }
                                                    
                                                } 
                                                    
                                                //die();
                                                    
                                                    $sales_id=$sid;
                                               header("Location:store.php?page=addmoreproduct&sid=$sales_id&msg=Record Insert Successfully");
                                               }elseif(strchr($weapon,',')){
                                                    list($first,$second)=explode(',', $weapon);
                                    
                                                    for($i = 1;$i<=2;$i++){
                                        
                                                    if($i == 1){
                                                        $third = $first;
                                                    }elseif($i == 2){
                                                        $third = $second;
                                                    }
                                        
                                        mysql_query("insert into `sale_bill2` values('','$product','$p_type','$p_model','$first','$quantity','$rate','$rate','$details','$sid')") or die(mysql_error());            
                                        }
                                        header("Location:store.php?page=addmoreproduct&sid=$sid&msg=Record Insert Successfully");
                                           
                                                }else{
                                                	mysql_query("insert into `sale_bill2` values('','$product','$p_type','$p_model','$weapon','$quantity','$rate','$total','$details','$sid')") or die(mysql_error());
                                                        header("Location:store.php?page=addmoreproduct&sid=$sid&msg=Record Insert Successfully");
                                            }
                                    	}
				
				
			}


if(isset($_GET['msg'])){
?>
<div id='center'>
  <div id='bottom'>
    <div id='triangle-line'>
      <div id='tri'></div>
    </div>
    <div id='nots'>Success Message</div>
    <div id='info'><?php echo $_GET['msg']; ?></div>
    <div id='feet'></div>
  </div>
</div>
<br><br><br><br>
<?php } ?>
<div class="main">
    <h1 style="width: 415px;">ADD MORE SALES</h1>
</div>
<form name="form1" method="post" action="">
<table class="responstable">
  
  <tr>
    <td>Product Name :</td>
    <td>
        <select name="product" id="product" onchange="getprodcut(this.value)">
            <option selected="selected"  value="">--Select Option--</option>
            <option value="Acessories">--Acessories--</option>
            <option value="Ammunition">--Ammunition--</option>
            <option value="Pistol">--Pistol--</option>
            <option value="Rifle">--Rifle--</option>
            <option value="Shortgun">--Shortgun--</option>
            <option value="Air Rifle">--Air Rifle--</option>
        </select>
    </td>
      <td>Product Type :</td>
      <td colspan="3"><div id="subcat"></div><div id="subofsubcat"></div></td>
    </tr>
    <tr>
        <td colspan="2">Prd Code</td>
        <td colspan="3" id="something"><input type="text" name="pcode" id="pcode" oninput=""></td>
    </tr>
    <tr>
      <th>Weapon Number</th>
      <th>Quantity</th>
      <th>Rate</th>
      <th>Total</th>
      <th>Details</th>
    </tr>
    <tr>
        <td><input style="" type="text" name="weapon" id="weapon" oninput="getWeapon(this.value)"/></td>
      <td><input type="text" name="quantity" id="quantity"  oninput="tot()" value="" required="required" /></td>
      <td id="something123"><input type="text" name="rate" id="amount"  oninput="tot()" value="" required></td>
      <td><input type="text" name="total" id="total" value="" required></td>
      <td><input type="text" name="details" id="details" value=""></td>
    </tr>
  </table>
    <div align="center" style="margin-top:50px;"><input id="myBtn" type="submit" name="submit" class="btn btn-large btn-primary" value="Save"><span style="margin-left:20px;"><a href="store.php?page=salesbill2&sid=<?php echo $_GET['sid'];?>"><input type="button"  class="btn btn-large btn-primary" value="Generate Bill" style="background-color:#666"></a></span></div>
</form>
<?php
		if(isset($_GET['sid']))
			{
				$s_id=$_GET['sid'];
				$qry=mysql_query("select * from `sale_bill2` where `s_id`='$s_id'") or die();
				
			
?>
<table class="responstable">
    <tr>
      <th>S.NO</th>
      <th>Product</th>
      <th>Product Type</th>
      <th>Product Model</th>
      <th>Quantity</th>
      <th>Weapon No</th>
      <th>Rate</th>
      <th>Total</th>
      <th>Action</th>
       <th>Action</th>
      
    </tr>
    <?php 
			$qry1=mysql_query("select * from `sales` where `Sid`='$s_id'") or die();
			$row1=mysql_fetch_array($qry1);
			
			
	?>
    <tr>
    <?php //print_r($row1); ?>
      <td><?php echo $i=1;?></td>
      <td><?php echo $row1['Product'];?></td>
      <td><?php echo $row1['SubProduct'];?></td>
      <td><?php echo $row1['pmodel'];?></td>
      <td><?php echo $row1['Quantity'];?></td>
      <td><?php echo $row1['weapon_no'];?></td>
      <td><?php echo $row1['Amount'];?></td>
      <td><?php echo $row1['total'];?></td>
      <td><a href="store.php?page=sales&s_id=<?php echo $row1['Sid'];?>" style="color:red;">Edit</a></td>
       <td><a href="delete.php?sid=<?php echo $row1['Sid'];?>&sales_id=<?php echo $_GET['sid']?>" style="color:red;">Delete</a></td>
    </tr>
    <?php
    		$i=2;
			$qunty="";
			$g_rate="";
			$g_total="";
			while($row=mysql_fetch_array($qry))
			{
				$qunty+=$row['qty'];
				$g_rate+=$row['rate'];
				$g_total+=$row['total'];	
	?>
    <tr>
    <?php //print_r($row); ?>
      <td><?php echo $i;?></td>
      <td><?php echo $row['product'];?></td>
      <td><?php echo $row['p_type'];?></td>
      <td><?php echo $row['p_model'];?></td>
      <td><?php echo $row['qty'];?></td>
      <td><?php echo $row['weapon_no'];?></td>
      <td><?php echo $row['rate'];?></td>
      <td><?php echo $row['total'];?></td>
       <td><a href="store.php?page=editmoreproduct&s_id=<?php echo $row['bill2_id'];?>&sid=<?php echo $_GET['sid']?>" style="color:red;">Edit</a></td>
       <td><a href="delete.php?s_id=<?php echo $row['bill2_id'];?>&sid=<?php echo $_GET['sid']?>" style="color:red;">Delete</a></td>
    </tr>
    <?php $i++;}}?>
    <tr>
        <td></td>
        <td></td>
         <td></td>
        <td></td>
      <th width="120" scope="col"><?php echo $qunty+$row1['Quantity'];?></th>
      <th width="125" scope="col"><?php echo $g_rate+$row1['Amount'];?></th>
      <th width="133" scope="col"><?php echo $g_total+$row1['total'];?></th>
      <td></td>
        <td></td>
    </tr>
  </table>
<script>
       $('#weapon').on('input',function(){
               
            $('#quantity').val('');
            $.ajax({
                type: "POST",
                url: 'quantity.php',
                data: $(this).serialize(),
                success: function(data1){
                //console.log(data1);
           
                $('#quantity').val(data1);
       },
        //dataType: 'json'
       });
            
            
        })
</script>

<?php 

      // get varible from gotopurchase page
  	$s_name="";
		$r_Name="";
		if(isset($_GET['name']))
		{
			$s_name=$_GET['name'];
			$qry=mysql_query("select * from `purchase` where `name`='$s_name' ORDER BY `p_id` DESC") or die();
			$row=mysql_fetch_array($qry);
			$r_Name=$row['name'];
			$plan=$row['plan'];
			$product=$row['product'];
      // print_r($row);
		} 
		// get id of last record when product is first submit 
		 if(isset($_GET['id']))
	   {
			$id=$_GET['id'];
			$qry1=mysql_query("select * from `purchase` where `p_id`='$id'") or die();
			$row1=mysql_fetch_array($qry1);
			$old_product=$row1['product'];
			$old_type=$row1['prd_type'];
			$old_model=$row1['pmodel'];
			
			
	   }
	   
	$cnic = '';
	   if(isset($_POST['submit']))
	   {
	    	 $product=$_POST['product'];
			 $prd_type=$_POST['subproduct'];
			 $pmodel=$_POST['pmodel'];
                      if(isset($_POST['weapon_no'])){   
                         $weapon_no=$_POST['weapon_no'];
                      }
                         $plan=$_POST['plan'];
			 $quantity=$_POST['quantity'];
			 $name=ltrim($_POST['name']);
	    	 if(isset($_POST['cnic'])){
                    $cnic=ltrim($_POST['cnic']);
                 }
			 $phone=ltrim($_POST['phone']);
       $remarks=ltrim($_POST['remarks']);
	    	 $address=$_POST['address'];
       		 $license_no=ltrim($_POST['license_no']);
	   		 $price=ltrim($_POST['price']);
			 $date=date("Y-m-d");
			 $sales_price=ltrim($_POST['sales_price']);
			 
			 if($product=="")
			 {
				$product=$old_product; 
			 }
			if($prd_type=="")
	   		 {
			  $prd_type=$old_type;	 
			 }
			 if($pmodel=="")
			 {
				$pmodel=$old_model;	 
			 }
			
                     if($name!="")
			{  
                         
                                if(strchr($weapon_no,'to')){
                                    $quantity = 1;
                                    list($first,$second)=explode('to', $weapon_no);
                                    $first = str_replace(' ', '', $first);
                                    $second = str_replace(' ', '', $second);
                                    if(ctype_digit ( $first )){
                                        $third = $second - $first;
                                    
                                        for($i = 0;$i<=$third;$i++){
                          
                                            mysql_query("INSERT INTO `purchase` VALUES ('','$product','$prd_type','$pmodel','$first','$plan','$quantity','$name','$cnic','$phone','$address','$license_no','$price','$sales_price','$date')");  
                                    
                                            $first = $first + 1;
                                        }
                                    }else{
                                        
                                        $secondvar= $second;
                                        $firstvar = $first;
                                        if(!is_int ( $first )){
                                            //echo '2';
                                            preg_match_all('/([0-9]+|[a-zA-Z]+)/',$first,$matches);
                                            $firstvar = end(end($matches));
                                                        
                                        }
                                        
                                         if(!is_int ($second)){
                                                        //echo '3';
                                            preg_match_all('/([0-9]+|[a-zA-Z]+)/',$second,$matches1);                                                
                                            $secondvar =  end(end($matches1));  
                                                        
                                        }
                                        $third =  $secondvar - $firstvar;
                                        $current = current(current($matches));
                                        for($i = 0;$i<=$third;$i++){
                                            $first = $current.$firstvar;
                                            mysql_query("INSERT INTO `purchase` VALUES ('','$product','$prd_type','$pmodel','$first','$plan','$quantity','$name','$cnic','$phone','$address','$license_no','$price','$sales_price','$date')");  
                                    
                                            $firstvar = $firstvar + 1;
                                        }
                                        
                                    }
                                    header("Location:store.php?page=purchase&name=$name&id=$id&msg=Record Submit Successfully");
                             }elseif(strchr($weapon_no,',')){
                                 list($first,$second)=explode(',', $weapon_no);
                                    
                                    for($i = 1;$i<=2;$i++){
                                        
                                        if($i == 1){
                                            $third = $first;
                                        }elseif($i == 2){
                                            $third = $second;
                                        }
                                        
                                        mysql_query("INSERT INTO `purchase` VALUES ('','$product','$prd_type','$pmodel','$third','$plan','$quantity','$name','$cnic','$phone','$address','$license_no','$price','$sales_price','$date')");  
                                    }
                                    header("Location:store.php?page=purchase&name=$name&id=$id&msg=Record Submit Successfully");
                             }else{
                                  mysql_query("INSERT INTO `purchase` VALUES ('','$product','$prd_type','$pmodel','$weapon_no','$plan','$quantity','$name','$cnic','$phone','$address','$license_no','$price','$sales_price','$date','$remarks')");
                              $id=mysql_insert_id();
                             header("Location:store.php?page=purchase&name=$name&id=$id&msg=Record Submit Successfully");	

                             }
                         
                        
			}
	  	
	   }
	 
?>


<?php if(isset($_GET['msg'])) { ?>
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
    <h1>Purchase</h1>
</div>

<form method="post" action="" name="form">
    <table class="responstable">
   		<tr>
        <td>Product</td>
        <td>
       <select name="product" id="product" onclick="getPurchase(this.value)">
           <option value="">--Select Option--</option>
           <option value="Acessories" <?php if(isset($_GET['name'],$_GET['id']) && $row['product']=='Acessories'){ echo 'selected="selected"';}?>>--Acessories--</option>
           <option value="Ammunition" <?php if(isset($_GET['name'],$_GET['id']) && $row['product']=='Ammunition'){ echo 'selected="selected"';}?>>--Ammunition--</option>
           <option value="Pistol"  <?php if(isset($_GET['name'],$_GET['id']) && $row['product']=='Pistol'){ echo 'selected="selected"';}?>>--Pistol--</option>
           <option value="Rifle" <?php if(isset($_GET['name'],$_GET['id']) && $row['product']=='Rifle'){ echo 'selected="selected"';}?>>--Rifle--</option>
           <option value="Shortgun" <?php if(isset($_GET['name'],$_GET['id']) && $row['product']=='Shortgun'){ echo 'selected="selected"';}?>>--Shortgun--</option>
           <option value="Air Rifle" <?php if(isset($_GET['name'],$_GET['id']) && $row['product']=='Air Rifle'){ echo 'selected="selected"';}?>>--Air Rifle--</option>
       </select>
     
        </tr>
        <tr>
        <td>Product TYPE & MODEL</td>
        <td><div id="subcat"><?php if(isset($_GET['name'],$_GET['id'])){ echo $row['prd_type']."&nbsp;&nbsp;&nbsp;/"; }?> &nbsp;&nbsp; <?php if(isset($_GET['name'],$_GET['id'])){ echo $row['pmodel'];}?></div><div id="subofsubcat"></div></td>
        </tr >
        <tr>
        <td>Prd Code</td>
        <td id="something"><input type="text" name="pcode" id="pcode" oninput="getpcode(this.value)"></td>
        </tr >
        <tr>
        <td>Weapon Number</td>
        <td><input type="text" name="weapon_no" id="weapon_no" value="<?php if(isset($_GET['name'])){ /*echo $row['weapone_no'];*/}?>" required/></td>
        </tr>
        <tr>
        <td>Remarks</td>
        <td><input type="text" name="remarks" id="remarks" required/></td>
        </tr>
        <tr>
        <td>Purchase From</td>
        <td><select name="plan" onchange="getValue()" id="purchasefrom">
        	<option value="" selected="selected">--SELECT OPTION--</option>
        	<option value="Dealer" <?php if(isset($_GET['name'] ) && $row['plan']=='Dealer'){ echo "selected='selected'";}?>>Dealer</option>
          <option valus="individual" <?php if(isset($_GET['name']) && $row['plan']!='Dealer'){ echo "selected='selected'";}?>><strong>Individual</option>
        </select></td>
        </tr>
        <tr>
          <td>Quantity</td>
          <td><input type="text" name="quantity" value="" required/></td>
        </tr>
        <tr>
        <td>Name</td>
        <td><input type="text" name="name" value="<?php if($s_name==$r_Name){ echo $r_Name;}else if(isset($_GET['name'])){ echo $_GET['name'];}?>" required/></td>
        </tr>
        <tr>
        <td>CNIC</td>
        <td><input type="text" name="cnic" id="cnic" value="<?php if(isset($_GET['name'])){ echo $row['cnic'];}?>" required/></td>
        </tr>
        <tr>
        <td>Phone NO</td>
        <td><input type="text" name="phone" id="phone" value="<?php if(isset($_GET['name'])  && isset($row['phone'])){ echo $row['phone'];}?>"/></td>
        </tr>
        <tr>
        <td>Address</td>
        <td><input type="text" name="address" value="<?php if(isset($_GET['name']) && isset($row['address'])){ echo $row['address'];}?>"/></td>
        </tr>
        <tr>
        <td>License No</td>
        <td><input type="text" name="license_no" id="license_no" value="<?php if(isset($_GET['name'])&& isset($row['license_no'])){ echo $row['license_no'];}?>"/>
        </tr>
        <tr>
        <td>Purchase Price</td>
        <td><input type="text" name="price" value="<?php if( isset($_GET['id']) ){echo $row1['price'];}?><?php if( isset($_GET['name']) && !isset($_GET['id']) ){echo $row['price'];}?>" required/></td>
      </tr>
        <tr>
          <td>Sales Price</td>
          <td><input type="text" name="sales_price" id="sales_price" value="<?php if( isset($_GET['id']) ){echo $row1['sales_price'];}?><?php if( isset($_GET['name']) && !isset($_GET['id']) ){echo $row['sales_price'];}?>" required/></td>
        </tr>
        <tr>
            <td colspan="2">
            <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save" id="submit">
        </td>
        </tr>
   </table>
</form>
</div>

<script>
        $('#pcode').on('input',function(){

		if($('#product').val() != 'Fire Arms'){
        		
		$("#weapon_no").prop('disabled', true);
        
        }else{
        	$("#weapon_no").prop('disabled', false);   
        }		

	});
        
       $('#weapon_no').on('input',function(){
               
            $('#quantity').val('');
            $.ajax({
                type: "POST",
                url: 'quantity.php',
                data: $(this).serialize(),
                success: function(data2){
                //console.log(data1);
           
                $('#quantity').val(data2);
       },
        //dataType: 'json'
       });
            
            
        })
</script>
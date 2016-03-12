<?php
					$ext_tax="";
					$sal_tax="";
					$grandtotal="";
					
					// get salesid
					$sid=$_GET['sid'];
										
					
					
					if(isset($_POST['submit']))
					 {
					$sid=$_GET['sid'];
					$rectification=$_POST['rectification'];
					
					
					// select sales total amount
					$qry2=mysql_query("select * from `sales` where `Sid`='$sid'") or die();
					$row3=mysql_fetch_array($qry2);
					$sales_total=$row3['total'];
					
					// select add more sales amount
					$sales_total2="";
					$qry3=mysql_query("select * from `sale_bill2` where `s_id`='$sid'") or die();
					while($row4=mysql_fetch_array($qry3))
					{
						 $sales_total2+=$row4['total'];
					}
					
					// add  total amount of sales product
					 $total_pay=$sales_total+$sales_total2;
					
					// query to fetch sales tax here
					$sql1="SELECT
    `tax_id`
    , `extras`
    , `sales_tax`
FROM
    `ssclub`.`settax`
ORDER BY `tax_id` DESC LIMIT 1";
					$qry1=mysql_query($sql1) or die();
					$row2=mysql_fetch_array($qry1);
					// fetch tax_id to store in sales_bill
					$tax_id=$row2[0];
					// fetch extra
					 $extras=$row2[1];
					// fetch sales tax
					 $sales_tax=$row2[2];
					
					// calculting extras tax
					  $ext_tax=$total_pay*$extras/100;
					 // add to total
						 $t_amount=$total_pay+$ext_tax;
					
					// calcuting sales tax
				  $sal_tax=$total_pay*$sales_tax/100;
					// add to total
					  $t_amount=$t_amount+$sal_tax;
					// round the amount  value
					  $t_amount=round($t_amount);
					// calculate grand total
				   
				   $grand_total=$t_amount+$rectification;
					
				mysql_query("insert into `salesbill` values('','$total_pay','$ext_tax','$sal_tax','$rectification','$grand_total','$sid','$tax_id')") or die();
					 
 }
?>
<style type="text/css">
#name{
float:left;	
margin-top:30px;
padding-left:40px;
}
#slug{
float:left;	
margin-top:100px;
padding-left:160px;
color:#000;
font-size:16px;
font-weight:bold;
}
#slug1{
float:right;
margin-top:10px;
padding-right:580px;
color:#000;
font-size:16px;
font-weight:bold;
}
#name p{
margin-top:20px;
font-size:40px;
padding-left:20px;
color:#06F;
font-family:Georgia, "Times New Roman", Times, serif;
}
#slogan p{
clear:both;
padding-left:40px;
font-size:20px;
color:#000;	
}
.address{
margin:0px auto;
margin-top:100px;
margin-right:100px;
}
.address p{
color:#06F;	
font-size:16px;
font-weight:bold;
text-align:center;
}
#logo{
float:right;
margin-top:-200px;
margin-right:120px;
padding-right:50px;
}
.customer{
clear:both;
padding-left:100px;
margin-top:20px;
color:#000;
font-size:16px;
}
.Nic{
float:right;
padding-right:150px;
margin-top:-20px;
color:#000;
font-size:16px;
}

#booth{
clear:both;
float:left;
margin-top:10px;
padding-left:255px;
color:#000;
}
#timeout{
float:right;
padding-right:565px;
margin-top:10px;
color:#000;	
}
#table{
	margin-top:20px;
	margin-right:145px;
	color:#000;
	font-size:18px;
	line-height:42px;
}
#bill{
clear:both;	
margin-right:180px;
margin-top:30px;
font-size:16px;
color:#000;
}
.info{
margin:0px auto;
margin-left:30px;
border:1px solid;
width:1100px;
}
table{
font-size:16px;
font-weight:bold;
color:#000;
line-height:40px;
}
</style>
<div id="name"><img src="img/ss arms.png" width="215" height="140"></div>
<div id="slug">Authorised Arms & Ammunition Dealer</div></br>
<div id="slug1">License No:1422 Form VI NO 10/V Form V</acronym></div>
<div id="slogan"><p>Deals in Arms & Ammunition</p></div>
<div id="logo"><img src="picture/ATT00001.png" width="215" height="140" /></div>
<div class="address"><p>Opposite Gulhaji Plaza University Road Peshawar  Ph: 091-5841695 Fax:091-5841762</p></div>
<div class="info">
<?php // fetch record form sales id tables
					$record=mysql_query("select * from `sales` where `Sid`='$sid'") or die(mysql_error());
					$fetch=mysql_fetch_array($record);
					$amount=$fetch['total'];
?>
  <table width="1098" height="133" border="0" align="center">
    <tr>
      <th width="149" height="29" scope="col">Name:</th>
      <th width="361" scope="col"><?php if(isset($sid)){echo $fetch['Cname'];}?></th>
      <th width="346" scope="col">NIC:</th>
      <th width="224" scope="col"><?php if(isset($sid)){ echo $fetch['NIC'];}?></th>
    </tr>
    <tr align="center">
      <td height="39">Mobile:</td>
      <td><?php if(isset($sid)){ echo $fetch['MobileNo'];}?></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:</td>
      <td><?php if(isset($sid)){ echo $fetch['Address'];}?></td>
    </tr>
    <tr align="center">
      <td height="27">License No:</td>
      <td><?php if(isset($sid)){ echo $fetch['LicenseNo'];}?></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weapon No:</td>
      <td><?php if(isset($sid)){ echo $fetch['weapon_no'];}?></td>
    </tr>
    <tr align="center">
      <td>Remarks</td>
      <td><?php if(isset($sid)){ echo $fetch['Details'];}?></td>
      <td>&nbsp;&nbsp;Date:</td>
      <td><?php if(isset($sid)){ echo $fetch['Date'];}?></td>
    </tr>
  </table>
</div>   
<?php
		$query1=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
		$row6=mysql_fetch_array($query1);
?>
  
<div id="bill" align="center"><strong>Bill NO: &nbsp;&nbsp;<?php echo $row6['sb_id'];?></strong></div>
    <form action="" method="post">
    <div id="table" align="center" >
<table width="1102" height="61" border="1">
 <tr>
<th width="105" scope="col">Qty</th>
<th width="396" scope="col">Particular</th>
<th width="161" scope="col">Rates</th>
<th width="412" scope="col">Amount</th>
</tr>
<tr>
<td height="30" align="center"><?php if(isset($sid)){ echo $fetch['Quantity'];}?></td>
<td align="center" nowrap="nowrap"><?php if(isset($sid)){ echo $fetch['SubProduct'];}?>&nbsp;/&nbsp;<?php if(isset($sid)){ echo $fetch['pmodel'];}?></td>
<td align="center"><?php if(isset($sid)){ echo $fetch['Amount'];}?></td>
<td align="center"><?php if(isset($sid)){ echo $fetch['total'];} ?></td>
</tr>
<?php
			$total=0;
			// fetch add more product sales record from table
			$query=mysql_query("select * from `sale_bill2` where `s_id`='$sid'") or die(mysql_error());
			while($record1=mysql_fetch_array($query))
			{
				$total+=$record1['total'];
				if($record1>0)
				{
	?>
    <tr>
<td height="30" align="center"><?php if(isset($sid)){ echo $record1['qty'];}?></td>
<td align="center" nowrap="nowrap"><?php if(isset($sid)){ echo $record1['p_type'];}?>&nbsp;/&nbsp;<?php if(isset($sid)){ echo $record1['p_model'];}?></td>
<td align="center"><?php if(isset($sid)){ echo $record1['rate'];}?></td>
<td align="center"><?php if(isset($sid)){ echo $record1['total'];} ?></td>
</tr>
<?php }}?>
</table>
    	
    </div>
    
    <table style="float:left;margin-top:50px;margin-left:60px;">
    <tr align="center">
    <td>Signature</td>
    <td>______________________</td>
   	</tr>
    </table>
    <table width="261" border="0" style="float:right;font-size:16px;margin-right:200px;margin-top:50px;color:#000">
     <?php
	
	  // fetch extras tax and sales tax from settax table
	  $sql="SELECT
    `tax_id`
    , `extras`
    , `sales_tax`
FROM
    `ssclub`.`settax`
ORDER BY `tax_id` DESC LIMIT 1";
					$qry=mysql_query($sql) or die();
					$row1=mysql_fetch_array($qry);
					// add first sales amount and more sales amount if done
					$total_payment=$amount+$total;
					$xtra_tax=$row1['extras'];
					$sale_tax=$row1['sales_tax'];
					// calcute exta tax
					 $x_tax=$total_payment*$xtra_tax/100;
					 // calculate sales tax
					 $sale_t=$total_payment*$sale_tax/100;
	  				// calculta total exta_tax+sales_tax+total_payment
					
					$grandtotal=round($total_payment+$x_tax+$sale_t);
	  ?>
      <tr>
        <th width="107" scope="row"><strong>Total:</strong></th>
        <td width="144"><?php if($sid){ echo $total_payment;}?></td>
      </tr>
      <tr>
        <th scope="row"><strong><?php echo $row1[1];?>% Extras:</strong></th>
        <td>&nbsp;<?php echo $x_tax;?></td>
      </tr>
      <tr>
        <th scope="row" nowrap="nowrap"><strong> <?php echo $row1[2];?>% Sales tax: </strong></th>
        <td>&nbsp;&nbsp;<?php echo $sale_t;?></td>
      </tr>
      <?php
      		// fetch rectification
			$query2=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
			$result=mysql_fetch_array($query2);
			$rect=$result['rectificaton'];
	  ?>
       <tr>
        <th scope="row"><strong>Rectification:</strong></th>
        <td><input type="text" name="rectification" id="rectification" onkeyup="showTotal()" value="<?php if(isset($_POST['submit'])) { echo $_POST['rectification'];}else if(!isset($_POST['submit'])){ echo $rect;}?>"/></td>
      </tr>
      <?php 
	  			$qry4=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die(mysql_error());
				$row5=mysql_fetch_array($qry4);
				$g_total=$row5['grandtotal'];
	  ?>
      <tr>
        <th scope="row"><strong>Grand Total:</strong></th>
        <td style="color:#000"><?php if($g_total!=""){ echo $g_total; }else{echo $grandtotal;}?></td>
      </tr>
    </table>
    <div align="center" style="margin-top:270px;margin-right:160px;" id="noPrint">
    <input name="submit" type="submit" class="btn btn-large btn-primary" id="submit" value="Save">
    <span style="padding-top:20px;">
    <input type="button" class="btn btn-large btn-primary" style="background-color:#666" onclick="window.print()" value="Print" />
    </span> </div>
	</form>
    
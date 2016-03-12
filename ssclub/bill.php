Thank you so much for your response and taking some time to review my email…

I would love to work with you on any project you assign me I am 100% interested in the project you want me to do..just send me complete details like what kind of website that is and how do want to build it, from my side consider your work done…

One thing else please don't discuss with as web developer that I am working for you because then they will create problems for me... 

I will await your response..

Have a pleasant day..

Junaid….


<?php 
		error_reporting(0);
		$grandtotal="";
?>
<?php
					/* INsertion into bill info table*/
				
            	if(isset($_POST['submit']))
					{
							$regid=$_GET['reg_id'];
							$detail=$_POST['details'];
							$particular=$_POST['particular'];
							
							$quantity1=$_POST['quantity'];
							$quantity2=$_POST['qty'];
							
							$rate=$_POST['rate'];
							$amount=$_POST['amount'];
							
							$price=$_POST['price'];
							$charges=$_POST['charges'];
							
							
							$recitifcation=$_POST['rectification'];
							
							$grandtotal=$charges+$amount+$recitifcation;
							
							
							// session store values
							
						 	$_SESSION['gtotal']=$grandtotal;
						 	
							$_SESSION['rectification']=$_POST['rectification'];
							$_SESSION['qty']=$_POST['qty'];
							$_SESSION['amount']=$_POST['amount'];
						 	$_SESSION['details']=$_POST['details'];
						 	$_SESSION['rate']=$_POST['rate'];
							$_SESSION['particular']=$_POST['particular'];
							
							if($quantity1!="")
							{
							mysql_query("insert into `billinfo` values('','$detail','$quantity1','$charges','$price','$recitifcation','$grandtotal','$regid')") or die(mysql_error());
							}
							$billnumber=mysql_insert_id();
							if($quantity2!="")
							{
							mysql_query("insert into `bill2` values('','$quantity2','$particular','$rate','$amount','$billnumber','$regid')") or die();
							}
							// logdetails tables insertion
							// set date time to local time 
							$offset = 5;
    						$timestamp = time() + ( $offset * 60 * 60 );
     						$time=gmstrftime("%b %d %Y %H:%M:%S", $timestamp) . "\n";
			 				$date=date('Y-m-d h:i A',strtotime($time));
							
							$uid=$_SESSION['u_id'];
							mysql_query("insert into `logs` values('','$date','$uid','Billinfo','$regid')") or die(mysql_error());
						
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
margin-top:-190px;
margin-right:100px;
padding-right:50px;
}
#date{
clear:both;
padding-left:300px;
margin-top:20px;
color:#000;
font-size:16px;
}
#timein{
float:right;
margin-top:-60px;
padding-right:500px;
color:#000;
font-size:16px;
}
#booth{
clear:both;
float:left;
margin-top:10px;
padding-left:300px;
color:#000;
font-size:16px;
}
#timeout{
float:right;
padding-right:490px;
margin-top:-15px;
color:#000;
font-size:16px;	
}
#table{
margin-top:30px;
margin-right:150px;
color:#000;
font-size:16px;
font-weight:bold;
}
#bill{
clear:both;	
margin-right:180px;
margin-top:10px;
font-size:18px;
color:#000;
}
.info{
margin:0px auto;
margin-left:50px;
border:1px solid;
width:1100px;
}
#table{
margin-top:20px;
margin-right:100px;
color:#000;
font-size:18px;
line-height:42px;
}
table{
font-size:16px;
font-weight:bold;
color:#000;
line-height:40px;
text-align:center;
}
</style>
<?php 
		$r_id=$_GET['reg_id'];
		$qery2=mysql_query("select * from `checkin` where `Reg_NO`='$r_id'") or die();
		$row1=mysql_fetch_array($qery2);
?>
<div id="name"><img src="img/ss arms.png" width="215" height="140"></div>
<div id="slug">Authorised Arms & Ammunition Dealer</div></br>
<div id="slug1">License No:1422 Form VI NO. 10/V Form V</acronym></div>
<div id="slogan"><p>Deals in Arms & Ammunition</p></div>
<div id="logo"><img src="picture/ATT00001.png" width="215" height="140" /></div>
<div class="address"><p>Opposite Gulhaji Plaza University Road Peshawar  Ph: 091-5841695 Fax:091-5841762</p></div>
<div class="info">
<table width="1098" height="133" border="0" align="center">
    <tr>
      <th width="149" height="29" scope="col">Name:</th>
      <th width="361" scope="col"><?php if(isset($_GET['reg_id'])){ echo strtoupper($row1['Name']);}?></th>
      <th width="346" scope="col">Father Name</th>
      <th width="224" scope="col"><?php if(isset($_GET['reg_id'])){echo $row1['fname'];}?></th>
    </tr>
    <tr align="center">
      <td height="39">Date:</td>
      <td><?php if(isset($_GET['reg_id'])) { echo $row1['ArrivalDate'];}?></td>
      <td>Time In:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><?php if(isset($_GET['reg_id'])){ echo $row1['ArrivalTime'];}?></td>
    </tr>
    <tr align="center">
      <td height="27">Booth NO</td>
      <td><?php if(isset($_GET['reg_id'])){ echo $row1['BoothNo'];}?></td>
      <td height="27">Time Out:</td>
      <td><?php if(isset($_GET['reg_id'])){ echo $row1['TimeOut'];}?></td>
    </tr>
  </table>
</div>
    <?php 
			$query=mysql_query("select * from `billinfo` ORDER BY  BillNo DESC") or die(mysql_error());
			$row=mysql_fetch_array($query);
	?>
<div id="bill" align="center"><strong>Bill NO: &nbsp;&nbsp;<?php echo $row['BillNo'];?> </strong></div>
<form action="" method="post">
<div id="table" align="center" >
<table width="1112" border="1">
   <tr>
    <th width="177" scope="col">Qty</th>
     <th width="247" scope="col">Particular</th>
     <th width="329" scope="col">Rates</th>
     <th width="331" scope="col">Amount</th>
     </tr>
<tr>
      <td align="center"><input type="hidden" value="1" name="quantity">1</td>
       <td align="center" nowrap="nowrap" style="font-weight:bold;"><input type="hidden" value="Booth Charges" name="details">Booth Charges</td>
       <td align="center"><?php if(isset($_GET['reg_id'])){echo $row1['RangeCharge'];}?><input type="hidden" value="<?php if(isset($_GET['reg_id'])){echo $row1['RangeCharge'];}?>" name="charges" style="font-weight:bold;"></td>
       <td align="center"><input name="price" type="text" id="charges" value="<?php if(isset($_GET['reg_id'])){echo $row1['RangeCharge'];} ?>" style="font-weight:bold;"></td>
</tr>
<tr>
		 <td align="center"><input name="qty" type="text" id="qty" size="20" oninput="calculate()" value="<?php if(isset($_POST['submit'])) { echo $_POST['qty'];} ?>" style="font-weight:bold;"/></td>
          <td align="center" nowrap="nowrap"><input type="text" name="particular" id="particular"  value="<?php if(isset($_POST['submit'])) {echo $_POST['particular'];}?>" style="font-weight:bold;"/></td>
          <td align="center"><input type="text" name="rate" id="rate" oninput="calculate()" value="<?php if(isset($_POST['submit'])) {  echo  $_POST['rate']; }?>" style="font-weight:bold;"/></td>
          <td align="center"><input type="text" name="amount" id="amount" value="<?php if(isset($_POST['submit'])) {  echo $_POST['amount'];}?>" style="font-weight:bold;"/></td>
</tr>
</table>
</div>
   <table style="float:left;margin-top:50px;margin-left:60px;">
   <tr align="center">
   <td>Signature</td>
   <td>______________________</td>
   </tr>
   </table>
   <table width="287" border="0" style="float:right;font-size:16px;margin-right:200px;margin-top:50px;color:#000;">
   <tr>
   <th width="92" scope="row"><strong>Rectification</strong></th>
   <td width="185"><input type="text" name="rectification" id="rectification" value="<?php if(isset($_POST['submit'])) {  echo $_POST['rectification']; }?>" style="font-weight:bold;"/></td>
      </tr>
      <tr>
        <th scope="row"><strong>Grand Total</strong></th>
        <td style="color:#000"><strong><?php if(isset($_GET['reg_id'])){echo $grandtotal;}?></strong></td>
      </tr>
    </table>
    <div align="center" style="margin-top:200px;margin-right:160px;" id="noPrint">
    <input name="submit" type="submit" class="btn btn-large btn-primary" id="submit" value="Save">
    <span style="padding-top:20px;">
    <input type="button" class="btn btn-large btn-primary" style="background-color:#666" onclick="window.print()" value="Print" />
    </span> </div>
	</form>
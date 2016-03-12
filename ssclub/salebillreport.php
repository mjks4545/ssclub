<?php
				$sid="";
				
				if(isset($_GET['id']))
				{
					$id=$_GET['id'];
					$query=mysql_query("select * from `sales` where `Sid`='$id'") or die();	
					$row=mysql_fetch_array($query);
					$sid=$row['Sid'];
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
padding-left:150px;
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
margin-left:30px;
border:1px solid;
width:1100px;
padding-top: 50px;
padding-bottom: 50px;
}
#table{
margin-top:20px;
margin-right:148px;
color:#000;
font-size:18px;
line-height:42px;
}
table{
font-size:16px;
font-weight:bold;
color:#000;
line-height:40px;
}
#cname{
float:right;
color:#000;
font-size:16px;
margin-right: 200px;
margin-top: -20px;
}

#mobile{
float:right;
color:#000;
font-size:16px;
margin-right:205px;
margin-top:-20px;	
}
</style>
<div id="name"><img src="img/ss arms.png" width="215" height="140"></div>
<div id="slug">Authorised Arms & Ammunition Dealer</div></br>
<div id="slug1">License No:1422 Form VI NO 10/V Form V</acronym></div>
<div id="slogan"><p>Deals in Arms & Ammunition</p></div>
<div id="logo"><img src="picture/ATT00001.png" width="215" height="140" /></div>
<div class="address"><p>Opposite Gulhaji Plaza University Road Peshawar  Ph: 091-5841695 Fax:091-5841762</p></div>
<div class="info">
    <div id="date"><b>Name :&nbsp;&nbsp;<?php if(isset($_GET['id'])) { echo strtoupper($row['Cname']);}?></b></div>
	<div id="cname" style="margin-right:200px"><b>Date :&nbsp;&nbsp;<?php if(isset($_GET['id'])) { echo $row['Date'];;}?></b></div>
    <div id="date"><b>NIC :&nbsp;&nbsp;<?php if(isset($_GET['id'])) { echo $row['NIC'];}?></b></div>
    <div id="cname"><b>Mobile  NO:&nbsp;&nbsp;<?php if(isset($_GET['id'])) { echo $row['MobileNo'];;}?></b></div>
     <div id="date"><b>Address :&nbsp;&nbsp;<?php if(isset($_GET['id']) && is_string($row['Address'])) {  echo mb_strimwidth($row['Address'],0,25,"");  ?></b></br>
     <span><span style="font-weight:bold"><?php   $str=strlen($row['Address']); if($str>25){echo mb_strimwidth($row['Address'],25,$str,"....");}}else { $row['Address'];}?></span></div>
      <div id="cname" style="margin-top:-30px;"><b>License No:&nbsp;&nbsp;<?php if(isset($_GET['id'])) { echo $row['LicenseNo'];;}?></b></div>
    </div>


	<?php
    		// bill nauber fetch
			$qry2=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
			$row4=mysql_fetch_array($qry2);
			
	
	?>
    <div id="bill" align="center"><strong>Bill NO: &nbsp;&nbsp;<?php echo $row4['sb_id'];?></strong></div>
    
    <div id="table" align="center" >
    		
              <table width="1109" border="1">
                <tr>
                  <th width="166" scope="col">Qty</th>
                  <th width="318" scope="col">Particular</th>
                  <th width="318" scope="col">Weapon No</th>
                  <th width="301" scope="col">Rates</th>
                  <th width="296" scope="col">Amount</th>
                </tr>
                <tr>
                  <td align="center"> <?php if(isset($_GET['id'])) { echo $row['Quantity']; }?></td>
                  <td align="center" nowrap="nowrap"><?php if(isset($_GET['id'])) { echo $row['SubProduct'];}?>&nbsp;/&nbsp;<?php if(isset($sid)){ echo $row['pmodel'];}?></td>
                  <td align="center"><?php echo $row['weapon_no']; ?></td>
                  <td align="center"><?php if(isset($_GET['id'])){echo $row['Amount'];} ?></td>
                  <td align="center"><?php if(isset($_GET['id'])) { echo $row['total'];}?> </td>
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
<td align="center" nowrap="nowrap"><?php if(isset($sid)){ echo $record1['p_type'];}?>&nbsp;/&nbsp;<?php if(isset($sid)){ echo $record1['p_model'];}?>/<?php if(isset($_GET['id']) &&  $record1['product']=='Fire Arms'){ echo  $record1['weapon_no'];}?></td>
<td align="center"><?php echo $record1['weapon_no']; ?></td>
<td align="center"><?php if(isset($sid)){ echo $record1['rate'];}?></td>
<td align="center"><?php if(isset($sid)){ echo $record1['total'];} ?></td>
</tr>
<?php }}?>
                </table>
    		
    </div>
    
    <table width="200" border="0" style="float:right;font-size:14px;margin-right:400px;margin-top:10px;color:#000">
    	  <?php
		  
		  		$qry1=mysql_query("select * from `salesbill` where `s_id`='$sid'") or die();
				$row3=mysql_fetch_array($qry1);
				// to fetch set tax from set_tax tables
				$taxid=$row3['tax_id'];
				$qry3=mysql_query("select * from `settax` where `tax_id`='$taxid'") or die();
				$row5=mysql_fetch_array($qry3);
          		
		  ?>
          <tr>
        <th scope="row"><strong>Total :</strong></th>
        <td><?php if(isset($id)) { echo $row3['total'];}?></td>
      </tr>
       <tr>
        <th scope="row"><strong><?php echo $row5['extras'];?>% Extras :</strong></th>
        <td><?php if(isset($id)) { echo $row3['extras'];}?></td>
      </tr>
       <tr>
        <th scope="row"><strong><?php echo $row5['sales_tax'];?>% Sales Tax :</strong></th>
        <td><?php if(isset($id)) { echo $row3['sales_tax'];}?></td>
      </tr>
         <tr>
        <th scope="row"><strong>Rectification :</strong></th>
        <td><?php if(isset($id)) { echo $row3['rectificaton'];}?></td>
      </tr>
      <tr>
        <th scope="row"><strong>Grand Total</strong></th>
        <td style="color:#000"><strong><?php echo  $row3['grandtotal']; ?></strong></td>
      </tr>
    </table>
    <div align="center" style="margin-top:230px;margin-right:160px;margin-bottom:20px" id="noPrint">
   
    <span style="padding-top:20px;">
    <input type="button" class="btn btn-large btn-primary" style="background-color:#666" onclick="window.print()" value="Print" />
    </span> </div>
	
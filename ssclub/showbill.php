<?php
			if(isset($_GET['id']))
			{
				 $id=$_GET['id'];
				 $query1=mysql_query("select * from `checkin` where `Reg_NO`='$id'") or die(); 
				 $row1=mysql_fetch_array($query1);
				
				 // fetch record from billinfo
				 $query=mysql_query("select * from `billinfo` where `Reg_NO`='$id'") or die();	
				 $row=mysql_fetch_array($query);
				 
				 
				 // fetch record from bill2
				 $query2=mysql_query("select * from `bill2` where `Reg_id`='$id'") or die();
				 $row2=mysql_fetch_array($query2);
				 
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
}
</style>

	
<div id="name"><img src="img/ss arms.png" width="215" height="140"></div>
<div id="slug">Authorised Arms & Ammunition Dealer</div></br>
<div id="slug1">License No:1422 Form VI NO 10/V Form V</acronym></div>

<div id="slogan"><p>Deals in Arms & Ammunition</p></div>
<div id="logo"><img src="picture/ATT00001.png" width="215" height="140" /></div>
<div class="address"><p>Opposite Gulhaji Plaza University Road Peshawar  Ph: 091-5841695 Fax:091-5841762</p></div>
  <div class="info">
<table width="1098" height="133" border="0" align="center">
    <tr>
      <th width="149" height="29" scope="col">Name:</th>
      <th width="361" scope="col"> <?php if(isset($_GET['id'])) { echo $row1['Name'];}?></th>
      <th width="346" scope="col">Father Name:</th>
      <th width="224" scope="col"><?php if(isset($_GET['id'])) {echo $row1['fname'];}?></th>
    </tr>
    <tr align="center">
      <td height="39">Date:</td>
      <td><?php if(isset($_GET['id'])) { echo $row1['ArrivalDate'];}?></td>
      <td>Time In:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><?php if(isset($_GET['id'])) {echo $row1['ArrivalTime'];}?></td>
    </tr>
    <tr align="center">
     <td height="27">&nbsp;&nbsp;Booth NO:</td>
      <td><?php if(isset($_GET['id'])) { echo $row1['BoothNo'];}?></td>
      <td height="27">Time Out:</td>
      <td><?php if(isset($_GET['id'])) { echo $row1['TimeOut'];} ?></td>
      </tr>
  </table>
</div>
    <div id="bill" align="center"><strong>Bill NO: &nbsp;&nbsp;<?php if(isset($_GET['id'])) { echo $row['BillNo'];}?> </strong></div>
<div id="table" align="center" >
    		
              <table width="1105" border="1">
                <tr>
                  <th width="127" scope="col">Qty</th>
                  <th width="279" scope="col">Particular</th>
                  <th width="275" scope="col">Rates</th>
                  <th width="396" scope="col">Amount</th>
                </tr>
                <tr>
                  <td align="center"><?php if(isset($_GET['id'])) { echo $row['Quantity'];}?></td>
                  <td align="center" nowrap="nowrap"><strong>Booth Charges</strong></td>
                  <td align="center"><?php if(isset($_GET['id'])) { echo $row['Rates'];}?></td>
                  <td align="center"><?php if(isset($_GET['id'])) { echo $row['Amount'];}?></td>
                </tr>
                <tr>
				
    		  
                  <td align="center"><?php if(isset($_GET['id'])){ echo $row2['qty'];}?></td>
                  <td align="center" nowrap="nowrap"><?php if(isset($_GET['id'])){ echo $row2['particalar'];}?></td>
                  <td align="center"><?php if(isset($_GET['id'])){ echo $row2['rates'];}?></td>
                  <td align="center"><?php if(isset($_GET['id'])){ echo $row2['amount'];}?></td>
                </tr>
          
               </table>
    		
    </div>
    
    <table width="200" border="0" style="float:right;font-size:14px;margin-right:400px;margin-top:10px;color:#000">
      <tr>
        <th scope="row"><strong>Rectification</strong></th>
        <td><?php if(isset($_GET['id'])) {echo $row['rectification'];}?></td>
      </tr>
      <tr>
        <th scope="row"><strong>Grand Total</strong></th>
        <td style="color:#000"><strong><?php if(isset($_GET['id'])) { echo $row['Grandtotal'];}?></strong></td>
      </tr>
    </table>
    <div align="center" style="margin-top:200px;margin-right:160px;" id="noPrint"><span style="padding-top:20px;">
    <input type="button" class="btn btn-large btn-primary" style="background-color:#666" onclick="window.print()" value="Print" />
    </span> </div>
	
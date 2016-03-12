<?php 
		$salestax="";
		$recitifcation="";
		$grnadtotal="";
?>
<?php
					/* Insertion Into TotalCharges Tables */
						
						if(isset($_POST['insert']) && isset($_GET['regid']) && isset($_GET['charges']))
						{
							$regid=$_GET['regid'];
							$charges=$_GET['charges'];
							$salestax=$_POST['salestax'];
							$recitifcation=$_POST['rectification'];
							
							
							$grnadtotal=$charges+$salestax-$recitifcation;
							
							if($regid!="" && $grnadtotal!="")
							{
								
								mysql_query("insert into `totalcharges` values('','$grnadtotal','$regid')") or die();
								
								// logdetails tables insertion
								$uid=$_SESSION['u_id'];
								mysql_query("insert into `logdetails` values('','Add record','totalcharges','$regid','$uid')") or die(mysql_error());
							}
							
							
					}
?>


<?php
					/* INsertion into bill info table*/
				
            	if(isset($_POST['submit'])&& isset($_GET['regid']))
					{
						$regid=$_GET['regid'];
							$detail=$_POST['details'];
							$quantity=$_POST['quantity'];
							
						if($detail!="" && $quantity!="")
						{
							mysql_query("insert into `billinfo` values('','$detail','$quantity','$regid')") or die(mysql_error());
							
							// logdetails tables insertion
							
							$uid=$_SESSION['u_id'];
							mysql_query("insert into `logdetails` values('','Add record','billinfo','$regid','$uid')") or die(mysql_error());
						}
								
						
				}
			
			
			?>
<div align="center" style="color:#000;">
<div align="center"><strong><h4>Bill</h4></strong></div>
  <div>
    <table width="740" border=""1 align="center" style="color:#000;font-size:16px;">
      <tr style="border:1px solid #999" align="center">
        <td width="126" height="30"><strong>Name:</strong></td>
        <td colspan="2"><?php if(isset($_GET['name'])){ echo $_GET['name'];}?></td>
        <td width="129"><strong>No of Persons:</strong></td>
        <td width="233"><?php if(isset($_GET['persons'])){ echo $_GET['persons'];}?></td>
      </tr>
      <tr  style="border:1px solid #999"  align="center">
        <td height="33"><strong>Profession:</strong></td>
        <td colspan="2"><?php if(isset($_GET['profession'])){ echo $_GET['profession'];}?></td>
        <td><strong>Reg No:</strong></td>
        <td><?php if(isset($_GET['regid'])){echo $_GET['regid'];}?></td>
      </tr>
      <tr  style="border:1px solid #999"  align="center">
        <td height="40"><strong>Address:</strong></td>
        <td colspan="2"><?php if(isset($_GET['address'])){echo $_GET['address'];}?></td>
        <td><strong>B.No:</strong></td>
        <td><?php if(isset($_GET['boothno'])){echo $_GET['boothno'];}?></td>
      </tr>
      <tr  style="border:1px solid #999"  align="center">
        <td height="40"><strong>MemeberShip:</strong></td>
        <td colspan="2"><?php if(isset($_GET['member'])){echo $_GET['member'];}?></td>
        <td><strong>Card NO</strong></td>
        <td><?php if(isset($_GET['card'])){echo $_GET['card'];}?></td>
      </tr>
      <tr  style="border:1px solid #999"  align="center">
        <td height="38"><strong>Date of Arrival:</strong></td>
        <td colspan="2"><?php if(isset($_GET['arrivaldate'])){echo $_GET['arrivaldate'];}?></td>
        <td><strong>TimeIn:</strong></td>
        <td><?php if(isset($_GET['arrivaltime'])){ echo $_GET['arrivaltime'];}?></td>
      </tr>
      <tr  style="border:1px solid #999"  align="center">
        <td height="34"><strong>TimeOut:</strong></td>
        <td colspan="2"><?php if(isset($_GET['otime'])){echo $_GET['otime'];}?></td>
        <td><strong>Charges:</strong></td>
        <td><?php if(isset($_GET['charges'])){echo $_GET['charges'];}?></td>
        
      </tr>
      <tr  style="border:1px solid #999"  align="center">
        <td height="37"><strong>NO of Fire</strong></td>
        <td colspan="2"><?php if(isset($_GET['fire'])) { echo $_GET['fire'];}?></td>
        <td><strong>Remarks:</strong></td>
        <td><?php if(isset($_GET['remarks'])){ echo $_GET['remarks'];}?></td>
      </tr>
    </table>
</div>
  	
    <div style="margin:20px;" id="noPrint">
    <form action="" method="post">
   	  <table width="766" border="1" align="center" style="border:1px solid #999;">
    	  <tr>
    	    <th width="219" scope="col">Details</th>
    	    <th width="260" scope="col">Qunatity</th>
    	    <th width="265" scope="col">Action</th>
  	    </tr>
    	  <tr>
    	    <td><input type="text" name="details" id="details" /></td>
    	    <td><input type="text" name="quantity" id="quantity" /></td>
    	    <td align="center"><input type="submit" name="submit" id="submit" value="Add Details" /></td>
  	    </tr>
  	  </table>
    </form>
    </div>
  	<?php 
			//  selection from bill info table
			if(isset($_GET['regid']))
			{
			$regid=$_GET['regid'];
			$query=mysql_query("select * from `billinfo` where `Reg_NO`='$regid'") or die();
			
	?>
  	<div>
	  <table width="355" border="1" align="center">
    		  <tr>
    		    <th width="80" scope="col">S.NO</th>
    		    <th width="64" scope="col">Details</th>
    		    <th width="100" scope="col">Quantity</th>
    		   
  		    </tr>
            <?php  
					$i=1;
					while($row=mysql_fetch_array($query))
					{
			?>
    		  <tr>
    		    <td align="center"><?php echo $i;?></td>
    		    <td align="center"><?php echo $row['Details'];?></td>
    		    <td align="center"><?php echo $row['Quantity'];?></td>
    		   
  		    </tr>
            <?php $i++;}}?>
	  </table>
  	</div>
    
    
    
  
    <div  align="center" style="margin-top:20px;color:#000">
      <form id="form1" name="form1" method="post" action="">
        <table width="200" border="0" style="margin-left:230px;font-size:16px;">
          <tr>
            <th scope="row"><strong>Total</strong></th>
            <td><?php if(isset($_GET['charges'])) {echo $_GET['charges'];}?></td>
          </tr>
          <tr>
            <th scope="row" nowrap="nowrap"><strong>16% Sales Tax</strong></th>
            <td><input type="text" name="salestax" id="salestax" value="<?php echo $salestax;?>"/></td>
          </tr>
          <tr>
            <th scope="row"><strong>Rectification</strong></th>
            <td><input type="text" name="rectification" id="rectification" value="<?php echo $recitifcation;?>"/></td>
          </tr>
          <tr>
            <th scope="row"><strong>Grand Total</strong></th>
            <td><?php echo $grnadtotal;?></td>
          </tr>
          </table>
          <div align="center" style="padding-top:20px;" id="noPrint">
          <input type="submit" name="insert" class="btn btn-large btn-primary" value="Save"> 
          <input type="button" class="btn btn-large btn-primary" style="background-color:#666" onclick="window.print()" value="Print">
          </div>
      </form>
    </div>

  
</div>
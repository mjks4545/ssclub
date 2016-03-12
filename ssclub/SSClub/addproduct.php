<?php
			if(isset($_POST['submit']))
			{
				$pname=ltrim($_POST['pname']);
				$ptype=ltrim($_POST['ptype']);
				$pmodel=ltrim($_POST['pmodel']);
                                $pcode = ltrim($_POST['pcode']);
				
				if($pname!="" && $ptype!="")
				{
				mysql_query("insert into `product` values('','$pname','$ptype','$pmodel','$pcode')") or die();
				header("Location:store.php?page=addproduct&msg=Record Submited");
				}
				
			}

?>
<div align="center" style="color:#03F"><strong><?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?></strong></div>
<div align="center" style="color:#000;font-size:24px;margin:20px;margin-left:170px;">ADD PRODUCT <span style="margin-left:100px;">
<?php if($_SESSION['Role']=='administrator'){?><a href="store.php?page=allproduct"><input type="button" name="submit" class="btn btn-large btn-primary" value="Delete Product"></a><?php }?></span></div>
<form name="form1" method="post" action="">
  <table width="553" border="1" align="center" style="color:#000;font-size:16px">
    <tr>
      <th width="223" height="42" scope="row">Product Name</th>
      <td width="314" align="center"><select name="pname" id="pname" required>
      <option selected="selected" value="">--Select Option--</option>
      <option value="Acessories">--Acessories--</option>
      <option value="Fire Arms">--Fire Arms--</option>
      <option value="Ammunition">--Ammunition--</option>
      <option value="Air Rifle">--Air Rifle--</option>
      </select></td>
    </tr>
    <tr>
      <th height="51" scope="row">Product Type</th>
      <td align="center"><input type="text" name="ptype" id="ptype" required></td>
    </tr>
    <tr>
      <th height="51" scope="row">Product Model</th>
      <td align="center"><input type="text" name="pmodel" id="pmodel" required></td>
    </tr>
     <tr>
      <th height="51" scope="row">Enter code</th>
      <td align="center"><input type="text" name="pcode" id="pcode" required></td>
    </tr>
    <tr>
      <th height="68" colspan="2" scope="row"> <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save"> </th>
    </tr>
  </table>
</form>

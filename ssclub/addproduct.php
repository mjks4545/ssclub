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
<div class="main">
    <h1 style="width:364px;">ADD PRODUCT </h1>
</div>
<div align="center" style="color:#000;font-size:24px;margin:20px;margin-left:170px;"><span style="margin-left:100px;">
<?php if($_SESSION['Role']=='administrator'){?><a href="store.php?page=allproduct"><input type="button" name="submit" class="btn btn-large btn-primary" value="Delete Product"></a><?php }?></span></div>
<form name="form1" method="post" action="">
    <table class="responstable">
    <tr>
      <td>Product Name</td>
      <td><select name="pname" id="pname" required>
      <option selected="selected"  value="">--Select Option--</option>
        <option value="Acessories">Acessories</option>
        <option value="Ammunition">Ammunition</option>
         <option value="Pistol">Pistol</option>
         <option value="Rifle">Rifle</option>
         <option value="Shortgun">Shortgun</option>
         <option value="Air Rifle">Air Rifle</option>
      </select></td>
    </tr>
    <tr>
      <td>Product Type</td>
      <td><input type="text" name="ptype" id="ptype" required></td>
    </tr>
    <tr>
      <td>Product Model</td>
      <td><input type="text" name="pmodel" id="pmodel" required></td>
    </tr>
     <tr>
      <td>Enter code</td>
      <td><input type="text" name="pcode" id="pcode" required><br><span style="color: red;margin-left: 28px;" id="pcodecheck"></span></td>
    </tr>
    <tr>
        <td colspan="2"> <input type="submit" name="submit" class="btn btn-large btn-primary" value="Save"> </td>
    </tr>
  </table>
</form>
<script>

    $('#pcode').on('input',function(){
        
      if($('#pcode').val() != ''){  
        $('#pcodecheck').html('');
        $.ajax({
        type: "POST",
        url: 'somefileforchecking.php',
        data: $(this).serialize(),
        success: function(data1){
           //console.log(data1);
           if(data1 == 'Product code already exists'){
               $('#pcodecheck').html(data1);
           };
           //alert(data1);
       },
        //dataType: 'json'
       });
        }
    });

</script>
<?php
			if(isset($_POST['submit']))
			{
					$name=ltrim($_POST['name']);
					
					header("Location:store.php?page=purchase&name=$name");
			}

?>
<div class="main">
    <h1 style="width: 393px">
        INPUT PURCHASE
    </h1>
</div>
<form name="form1" method="post" action="" style="color:#000">
    <table class="responstable">
    <tr>
      <th>FROM</th>
    </tr>
    <tr>
        <td><input style="width: 592px;" type="text" name="name" id="name" autofocus="autofocus"></td>
    </tr>
    <tr>
      <td><input type="submit" name="submit" class="btn btn-large btn-primary" value="Search"></td>
    </tr>
  </table>
</form>

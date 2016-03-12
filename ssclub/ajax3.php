<?php require_once('function.php'); 
	  error_reporting(0);

          $product = $_GET['id1'];
          $ptype = $_GET['id2'];
          $pmodel = $_GET['id3'];
          
          $qry123 = mysql_query("SELECT `pcode` FROM `product` WHERE `p_type`='$ptype' AND `p_name`='$product' AND `pmodel`='$pmodel'");	
	  $recod = mysql_fetch_array($qry123);
          if($qry123){
              if($recod != 0 && $recod != ''){
                  $record = $recod['pcode'];
                  echo "<input type='text' value='$record' id='pcode' onfocus=priceget(this.value) autofocus='autofocus' />";
                  
              }else{
                  echo 'no code found';
              }
          }else{
              echo 'failed';
          }
          
          
          
          
          ?>


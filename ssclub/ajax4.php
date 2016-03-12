<?php require_once('function.php'); 
	  
            $id = $_POST['pcode'];
            $qry111=mysql_query("select * from `product` where `pcode`='$id'");
            
            if($qry111){
                $row111=mysql_fetch_array($qry111);
            }
            
            $product = $row111['p_name'];
            $ptype = $row111['p_type'];
            $pmodel = $row111['pmodel'];
            
            $qry=mysql_query("select price,sales_price from purchase where `product`='$product' AND `prd_type`='$ptype' AND `pmodel`='$pmodel' ORDER BY `p_id` DESC");
            if($qry){
                
                $row=mysql_fetch_array($qry);
                
            }
            
            echo $row[1];
            
            return;
          
          ?>


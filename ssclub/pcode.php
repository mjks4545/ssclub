<?php


$id = $_POST['pcode'];
if(!empty($id)){
require_once('function.php'); 

    
    $qry11=mysql_query("select * from `product` where `pcode`='$id'");
    
    if($qry11){
        $row11=mysql_fetch_array($qry11);
if(empty($row11)){
    echo '<p class="text-center">No record found</p>';
    die();
}  
echo json_encode($row11);
return;
}}
/*
//print_r($row11);
        ?>
<select name="product" id="product">
            <option value="<?php echo $row11['p_name']; ?>"><?php echo $row11['p_name']; ?></option>
        </select>
 <select name="subproduct" id="subproduct">
            <option value="<?php echo $row11['p_type']; ?>"><?php echo $row11['p_type']; ?></option>
        </select>
 <select name="pmodel" id="pmodel">
            <option value="<?php echo $row11['pmodel']; ?>"><?php echo $row11['pmodel']; ?></option>
        </select>

          <?php 
       
    }else{
        echo 'failed';
    }

}

*/
?>

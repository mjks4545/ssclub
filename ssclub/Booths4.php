i<style>
.icon-btn{
background:#000;
}





</style>

	<?php 
        $count=0;
        $done['16']=16;
	
					$q3=mysql_query("SELECT BoothNO,Reg_NO,TimeOut FROM checkin WHERE TimeOut=''");
					
		
	?>
	
<div align="center" style="font-weight:bolder;padding-top:20px;padding-bottom:20px;color:#000;"><u>BOOTHS</u></div>
<div style=" margin-left: 10%">
    

<div class=row-fluid>
    
   
<?php 
while ($row=mysql_fetch_assoc($q3)){
 
	//echo '<div class="square-state">';
		$done[$row['BoothNO']]=$row['BoothNO'];

		//print_r($row);
		//print_r($done);
								
								if($row['TimeOut']!==''){
								echo '<span class="badge badge-success" style="width:5%" ><a class="icon-btn" href="#" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a></td>';	
								
                                                                
                                                                
                                                                }else{
									echo '<span class="badge badge-important" style="width:10%;padding: 10px;margin: 3%"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
									 $count++;
                                                                        if($count>=5)							{
                                                                            echo '</div><div class=row-fluid>';
                                                                            $count=0;
                                                                        }else 
                                                                        {
                                                                           // echo '</div>';
                                                                            //echo $count++;
                                                                          //echo '<div>';  
                                                                        }
                                                                            
}
//echo $count++;
}
 //echo '</div>';  
$q2=mysql_query("SELECT BoothNO,Reg_NO,TimeOut FROM checkin WHERE TimeOut!='' ORDER BY Reg_NO");
while ($row=mysql_fetch_assoc($q2)){
    
        
								if (in_array($row['BoothNO'], $done))                       {
                                                                
                                                                }else{
                                                                    $done[$row['BoothNO']]= $row['BoothNO'];
                                                                
								if(($row['TimeOut']!=='')){
								echo '<span class="badge badge-success" style="width:10%;padding: 10px;margin: 3%" ><a class="icon-btn" href="" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
								 $count++;
                                                                if($count>=5)							{
                                                                            echo '</div><div class=row-fluid>';
                                                                            $count=0;
                                                                        }
                                                                
                                                                }else{
									echo '<span class="badge badge-important" style="width:5%"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
								//echo $count++;
                                                                        if($count>5)							{
                                                                            echo '</div>';
                                                                            $count=0;
                                                                        }
									
									
}  
}

}
$i=1;
while ($i<16){
    //print_r( $done);
    if (in_array($i, $done))                       {
       // echo $done;                                                       
                                                                }else{
    echo '<span class="badge badge-important" style="width:10%;padding: 10px;margin: 3%"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $i . '" ><i class="icon-group">' . $i . '</i>' . $i . '</span></a>';	
							 $count++;
                                                                        if($count>=5)							{
                                                                            echo '</div><div class=row-fluid>';
                                                                            $count=0;
                                                                        }else{
                                                                            
                                                                        }
    
    
}
$i++;
}
?>

</div>



								
				               
                           
                  

<!-----End of boxes------>


 
                            <!-- END RECENT ORDERS PORTLET-->
                        
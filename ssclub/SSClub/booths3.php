<style>
.icon-btn{
background:#000;
}
</style>
	<?php 
        $count=0;
	
					$q3=mysql_query("SELECT BoothNO,Reg_NO,TimeOut FROM checkin WHERE TimeOut=''");
					
		
	?>
	
<div align="center" style="font-weight:bolder;padding-top:20px;padding-bottom:20px;color:#000;"><u>BOOTHS</u></div>
<div class="row-fluid">
<?php 
while ($row=mysql_fetch_assoc($q3)){
 
	echo '
          <div class="square-state">';
		$done[$row['BoothNO']]=$row['BoothNO'];

		//print_r($row);
		//print_r($done);
								
								if($row['TimeOut']!==''){
								echo '<span class="badge badge-success" style="width:70px" ><a class="icon-btn" href="#" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
								
                                                                
                                                                
                                                                }else{
									echo '<span class="badge badge-important" style="width:70px"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
									$count++;
                                                                        if($count>=5)							{
                                                                            echo '</div></div>';
                                                                            $count=1;
                                                                        }else 
                                                                        {
                                                                          //echo '<div>';  
                                                                        }
                                                                            
}
echo $count++;
}
// echo '</div></div>';  
$q2=mysql_query("SELECT BoothNO,Reg_NO,TimeOut FROM checkin WHERE TimeOut!='' ORder BY Reg_NO");
while ($row=mysql_fetch_assoc($q2)){
    
        
								if (in_array($row['BoothNO'], $done))                       {
                                                                
                                                                }else{
                                                                    $done[$row['BoothNO']]= $row['BoothNO'];
                                                                
								if(($row['TimeOut']!=='')){
								echo '<span class="badge badge-success" style="width:70px" ><a class="icon-btn" href="" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
								echo $count++;
                                                                if($count>=5)							{
                                                                            echo '</div></div>';
                                                                            $count=1;
                                                                        }
                                                                
                                                                }else{
									echo '<span class="badge badge-important" style="width:70px"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
								if($count>=5)							{
                                                                            echo '</div></div>';
                                                                            $count=1;
                                                                        }
									
									
}  
}

}

								?>
				               
                           
                  

<!-----End of boxes------>


 
                            <!-- END RECENT ORDERS PORTLET-->
                        
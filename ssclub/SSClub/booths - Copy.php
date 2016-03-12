<style>
.icon-btn{
background:#000;
}

</style>

	<?php 
        $booths='';
        $count=0;
        $done['16']=16;
	
					$q3=mysql_query("SELECT BoothNO,Reg_NO,TimeOut FROM checkin WHERE TimeOut=''");
					
		
	?>
	
<div align="center" style="font-weight:bolder;padding-top:30px;padding-bottom:20px;color:#000;"><H3>BOOTHS</H3></div>
<div style=" margin-left: 10%">
    

<div class=row-fluid>
    
   
<?php 
while ($row=mysql_fetch_assoc($q3)){
 
	//echo '<div class="square-state">';
		

		//print_r($row);
		//print_r($done);
								
								if($row['TimeOut']!==''){
								$booths[$row['BoothNO']] = '<span class="badge badge-success" style="width:5%" ><a class="icon-btn" href="#" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';	
								$done[$row['BoothNO']]=$row['BoothNO'];
                                                                
                                                                
                                                                }else{
									$booths[$row['BoothNO']] = '<span class="badge badge-important" style="width:10%;padding: 10px;margin: 3%"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i></span></a>';	
								 $count++;
                                                                        if($count>=5)							{
                                                                            //$booths[$row['BoothNO']].= '</div><div class=row-fluid>';
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
								$booths[$row['BoothNO']]= '<span class="badge badge-success" style="width:10%;padding: 10px;margin: 3%" ><a class="icon-btn" href="" ><i class="icon-group">' . $row['BoothNO'] . '</i></span></a>';	
							 $count++;
                                                                if($count>=5)							{
                                                                            //$booths[$row['BoothNO']].= '</div><div class=row-fluid>';
                                                                            $count=0;
                                                                        }
                                                                
                                                                }else{
									echo '<span class="badge badge-important" style="width:5%"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i>' . $row['BoothNO'] . '</span></a>';	
								//echo $count++;
                                                                        if($count>5)							{
                                                                            echo '</div>';
                                                                            $count=0;
                                                                        }
									
									
}  
}

}
$i=0;
while ($i<16){
    
    //print_r( $done);
    if(isset($done[$i])){
                       if($i==5)							{
                                                                            $booths[$i].= '</div><div class=row-fluid>';
                                                                            ///$i=0;
                                                                        }elseif($i==10){
                                                                             $booths[$i].= '</div><div class=row-fluid>';
                                                                        
                                                                         }elseif($i==15){
                                                                             $booths[$i].= '</div>';
                                                                        }                               
                                                                }else{
   $booths[$i]= '<span class="badge badge-important" style="width:10%;padding: 10px;margin: 3%"><a class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $i . '" ><i class="icon-group">' . $i . '</i></span></a>';	
									 
                                                                        if($i==5)							{
                                                                            $booths[$i].= '</div><div class=row-fluid>';
                                                                            ///$i=0;
                                                                        }elseif($i==10){
                                                                             $booths[$i].= '</div><div class=row-fluid>';
                                                                        
                                                                         }elseif($i==15){
                                                                             $booths[$i].= '</div>';
                                                                        }
    
    
}
$i++;
}
$j=1;
//print_r($booths) ;
while ($j<16){
    echo $booths[$j];
    $j++;
}
?>
  
</div>

    

								
				               
                           
                  

<!-----End of boxes------>


 
                            <!-- END RECENT ORDERS PORTLET-->
                        
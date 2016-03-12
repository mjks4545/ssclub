<style>
.icon-btn{
background:#000;
}
.badge-important {
    background-color: #fffdfe;
    background-image:-moz-linear-gradient(center top , #ddd, #fffdfe);
}
.badge-important:hover {
    background-color: #fffdfe;
    background-image:-moz-linear-gradient(center top , #ddd, #fffdfe);
}
.badge-success {
    background-color: #3235ff !important;
    background-image: -webkit-linear-gradient(top,#1488c8,#1488c8);
}
.badge-success:hover {
    background-color: #3235ff;
    background-image:-moz-linear-gradient(center top , #2980B9, #2980B9);
}
/* icon buttons */
.icon-btn  {
    width:110px;
    padding: 10px 10px 10px 10px;
    font-size: 10px;
background-color:  #DDD !important;
    background-image:-moz-linear-gradient(center top , #ddd, #fffdfe);
    -webkit-box-shadow: 0 0px 5px #ddd !important;
    -moz-box-shadow: 0 0px 5px #ddd!important;
    box-shadow: 0 0px 5px #ddd !important;
    display:block !important;
    color: #646464 !important;
    text-align: center;
    cursor: pointer;
    position: relative;
    -webkit-transition: all 0.3s ease !important;
    -moz-transition: all 0.3s ease !important;
    -ms-transition: all 0.3s ease !important;
    -o-transition: all 0.3s ease !important;
    transition: all 0.3s ease !important;
    border-radius:5px;
}
.icon-btn:hover {

    background-color:  #DDD !important;
    /*background-image:-moz-linear-gradient(center top , #ddd, #fffdfe) !important;*/
    text-decoration: none !important;
    box-shadow: none !important;
    color: #444 !important;
    -webkit-transition: all 0.2s ease !important;
    -moz-transition: all 0.2s ease !important;
    -ms-transition: all 0.2s ease !important;
    -o-transition: all 0.2s ease !important;
    transition: all 0.2s ease !important;
    box-shadow:0px 0px 0px #fff , 0 0 1px rgba(0, 0, 0, .6) inset !important;
}
#btn-success{
	background-color:#3235ff !important;
    background-image:-moz-linear-gradient(center top , #2980B9, #2980B9) !important;
    text-decoration: none !important;
    box-shadow: none !important;
    color: #444 !important;
    -webkit-transition: all 0.3s ease !important;
    -moz-transition: all 0.3s ease !important;
    -ms-transition: all 0.3s ease !important;
    -o-transition: all 0.3s ease !important;
    transition: all 0.3s ease !important;
    box-shadow:0px 0px 0px #fff , 0 0 1px rgba(0, 0, 0, .6) inset !important;

}
#btn-success:hover{
    background-image:-moz-linear-gradient(center top , #2980B9, #2980B9);
    text-decoration: none !important;
    box-shadow: none !important;
    color: #444 !important;
    -webkit-transition: all 0.3s ease !important;
    -moz-transition: all 0.3s ease !important;
    -ms-transition: all 0.3s ease !important;
    -o-transition: all 0.3s ease !important;
    transition: all 0.3s ease !important;
    box-shadow:0px 0px 0px #fff , 0 0 1px rgba(0, 0, 0, .6) inset !important;

}
.icon-btn i {
    font-size: 23px;
    color: #80151a !important;
    margin: 10%;
}
</style>

	<?php 
        $booths='';
        $count=0;
        $done['16']=16;
	
					$q3=mysql_query("SELECT BoothNO,Reg_NO,TimeOut FROM checkin WHERE TimeOut='' ORDER BY Reg_NO DESC");
					
		
	?>
	
<div align="center" style="font-weight:bolder;padding-top:0px;padding-bottom:20px;color:#898989;"><H4>BOOTHS</H4></div>
<div style=" margin-left: 10%" align="center">

<div class=row-fluid>  
<?php 
while ($row=mysql_fetch_assoc($q3)){
 
	//echo '<div class="square-state">';
		

		//print_r($row);
		//print_r($done);
		
										
								if($row['TimeOut']!=''){
								$booths[$row['BoothNO']] = '<span class="badge badge-important" style="width:5%;" ><a class="icon-btn" style=" background-image:-moz-linear-gradient(center top , #ddd, #fffdfe);" href="#" ><i class="icon-group">' . $row['BoothNO'] . '</i><div>' . $row['BoothNO'] . '</div></span></a>';
								
                                                                
                                                                
                                                                }else{
									$booths[$row['BoothNO']] = '<span class="badge badge-success" style="padding:7px;margin: 3%"><a id="btn-success" style="-moz-linear-gradient(center top , #2980B9, #2980B9)" class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i></span></a>';
								 $count++;
                                                                        
                                                                            
}
$done[$row['BoothNO']]=$row['Reg_NO'];
}
 //echo '</div>';  
$q2=mysql_query("SELECT BoothNO,Reg_NO,TimeOut FROM checkin WHERE TimeOut!='' ORDER BY Reg_NO DESC");
while ($row=mysql_fetch_assoc($q2)){
    //print_r($done);
    //echo $done['BoothNO']. '<br>   ';
        if(isset($done[$row['BoothNO']])){
            
            if($done[$row['BoothNO']]>$row['BoothNO']){
                
        }
								//if (in_array($row['BoothNO'], $done))                       {
                                                                
                                                                }else{
                                                                    $done[$row['BoothNO']]= $row['Reg_NO'];
                                                                
								if(($row['TimeOut']!='')){
								$booths[$row['BoothNO']]= '<span class="badge badge-important" style="width:13%;padding:3px;margin-bottom:50px;margin-left:20px;" ><a  class="icon-btn" style=" background-image:-moz-linear-gradient(center top , #ddd, #fffdfe);" href="" ><i class="icon-group">' . $row['BoothNO'] . '</i></span></a>';
							 $count++;
                                                                if($count>=5)							{
                                                                            //$booths[$row['BoothNO']].= '</div><div class=row-fluid>';
                                                                            $count=0;
                                                                        }
                                                                
                                                                }else{
									echo '<span class="badge badge-success" style="width:13%"><a id="btn-success" style="-moz-linear-gradient(center top , #2980B9, #2980B9)" class="icon-btn" href="http://localhost/SSClub/index.php?page=booth_res&B_No=' . $row['BoothNO'] . '" ><i class="icon-group">' . $row['BoothNO'] . '</i>' . $row['BoothNO'] . '</span></a>';
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
                                                                        
                                                                         }                             
                                                                }else{
   $booths[$i]= '<span class="badge badge-important" style="width:13%;padding:3px;margin-bottom:50px;margin-left:20px;"><a class="icon-btn" href="#" ><i class="icon-group">' . $i . '</i></span></a>';	
									 
                                                                        if($i==5)							{
                                                                            $booths[$i].= '</div><div class=row-fluid>';
                                                                            ///$i=0;
                                                                        }elseif($i==10){
                                                                             $booths[$i].= '</div><div class=row-fluid>';
                                                                        
                                                                         }
    
    
}
$i++;
}
$j=1;
//print_r($booths) ;
while ($j<16){
    echo  $booths[$j];
    $j++;
}
?>
  
</div>

    

								
				               
                           
                  

<!-----End of boxes------>


 
                            <!-- END RECENT ORDERS PORTLET-->
                        
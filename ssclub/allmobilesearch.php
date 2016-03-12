<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $query=mysql_query("SELECT DISTINCT `Name`,`TelephoneNo` FROM `checkin`") or die(mysql_error());
    $query1=mysql_query("SELECT DISTINCT `pname`,`pcell` FROM `persondetails`") or die(mysql_error());
    $query2=mysql_query("SELECT DISTINCT `pname2`,`pcell2`,`pname3`,`pcell3` FROM `persondetails2`") or die(mysql_error());
    ?>
<table class="responstable">
    <tr>
        <th>
            Name :
        </th>
        <th>
            Phone :
        </th>
    </tr>
<?php
    while ( $row=  mysql_fetch_array($query) ){
        echo '<tr>';
        echo '<td>'.$row['Name'].'</td>';
        echo '<td>'.$row['TelephoneNo'].'</td>';
        echo '</tr>';
    }
    while ( $row=  mysql_fetch_array($query1) ){
        echo '<tr>';
        echo '<td>'.$row['pname'].'</td>';
        echo '<td>'.$row['pcell'].'</td>';
        echo '</tr>';
        
    }
    while ( $row=  mysql_fetch_array($query2) ){
        echo '<tr>';
        echo '<td>'.$row['pname2'].'</td>';
        echo '<td>'.$row['pcell2'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$row['pname3'].'</td>';
        echo '<td>'.$row['pcell3'].'</td>';
        echo '</tr>';
        
    }
?>
    
</table>
<?php


    $query=mysql_query("SELECT * FROM `membership` WHERE `Membership` = 'Gold' order by `Name` ASC") or die(mysql_error());
    $query1=mysql_query("SELECT * FROM `membership` WHERE `Membership` = 'Silver' order by `Name` ASC") or die(mysql_error());
    $query2=mysql_query("SELECT * FROM `membership` WHERE `Membership` = 'Platinum' order by `Name` ASC") or die(mysql_error());
    ?>
<table class="responstable">
    <tr>
        <th>
            Name :
        </th>
        <th>
            Phone :
        </th>
        <th>
            MemberShip :
        </th>
    </tr>
<?php
    while ( $row=  mysql_fetch_array($query1) ){
        echo '<tr>';
        echo '<td>'.$row['Name'].'</td>';
        echo '<td>'.$row['Mobile'].'</td>';
        echo '<td>'.$row['Membership'].'</td>';
        echo '</tr>';
    }
    while ( $row=  mysql_fetch_array($query) ){
        echo '<tr>';
        echo '<td>'.$row['Name'].'</td>';
        echo '<td>'.$row['Mobile'].'</td>';
        echo '<td>'.$row['Membership'].'</td>';
        echo '</tr>';
        
    }
    while ( $row=  mysql_fetch_array($query2) ){
        echo '<tr>';
        echo '<td>'.$row['Name'].'</td>';
        echo '<td>'.$row['Mobile'].'</td>';
        echo '<td>'.$row['Membership'].'</td>';
        echo '</tr>';
    }
?>
    
</table>
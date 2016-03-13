<?php

$id = $_GET['nic'];
mysql_query("UPDATE `membership` SET `Membership_status` = 'Canceled' , `Reason` = '' WHERE `Cnic` = $id");
header("Location:index.php?page=memberresult&name=&nic=&cardno=&membership=Silver&mobile=&license=");


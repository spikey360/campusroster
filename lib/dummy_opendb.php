<?php
$server='localhost';
$user='your_db_username'; //put your db username here
$pass='your_db_username'; //put your db password here
$db='campusroster';

$conn=mysql_connect($server,$user,$pass) or die ('Could not connect to db');
mysql_select_db($db) or die ('Could not select db');
?>

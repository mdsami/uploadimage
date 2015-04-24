<?php
$mysql_hostname='localhost';
$mysql_user='root';
$mysql_password='';
$mysql_database='imageupload';

//........connect to localhost.........//

$con=mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die('Could not connect to mysql');
//........connect to database.........//
mysql_select_db($mysql_database,$con) or die('Could not connect database');

session_start();
date_default_timezone_set('Asia/Dhaka');
?>

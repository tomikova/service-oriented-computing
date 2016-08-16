<?php
include "connect_to_mysql.php";
$username = preg_replace('#[^A-Za-z0-9_]#i', '', $_GET['username']); 
$sql = mysql_query("SELECT username FROM users WHERE username = '$username' LIMIT 1");
$count = mysql_num_rows($sql);
echo "$count";
?>
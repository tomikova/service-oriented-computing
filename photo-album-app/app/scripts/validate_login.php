<?php
include "connect_to_mysql.php";
$username = preg_replace('#[^A-Za-z0-9_]#i', '', $_GET['username']); 
$password = preg_replace('#[^A-Za-z0-9_]#i', '', $_GET['password']);
$sql = mysql_query("SELECT username FROM users WHERE username = '$username' AND password = '$password' LIMIT 1");
$count = mysql_num_rows($sql);
echo $count;
?>
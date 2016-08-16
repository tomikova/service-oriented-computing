<?php
include "connect_to_mysql.php";
$email = preg_replace('#[^A-Za-z0-9_\@\.]#i', '', $_GET['email']);
$sql = mysql_query("SELECT id FROM users WHERE email = '$email' LIMIT 1");
$count = mysql_num_rows($sql);
echo "$count";
?>
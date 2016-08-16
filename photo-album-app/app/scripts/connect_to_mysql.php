<?php
//povezivanje na mysql bazu
$db_hostname = "localhost";
$db_database = "photoalbum";
$db_username = "tomislav";
$db_password = "manchester";
mysql_connect("$db_hostname", "$db_username", "$db_password") or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db("$db_database") or die("baza nije pronadjena");
$connection = mysqli_connect("$db_hostname", "$db_username", "$db_password", "$db_database");
mysql_set_charset("utf8");
mysqli_set_charset($connection, "utf8");
?>
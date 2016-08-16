<?php
$password1 = $_GET['password1'];
$password2 = preg_replace('#[^A-Za-z0-9_]#i', '', $_GET['password2']);  
if ($password1==$password2) { echo 0; }
else { echo 1; }
?>
<?php
//prikazivanje grešaka, povezivanje na bazu, login/logout
//error_reporting(E_ALL);
//ini_set('display_errors','1');
//include "../app/scripts/connect_to_mysql.php";
include_once "../app/scripts/login_logout.php";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Korisnici</title>
<link rel="stylesheet" href="http://localhost/PhotoAlbum/app/storage/style/style.css" type="text/css" media="screen"/>
</head>
<body>
<div align="center" id="Wrapper">

 <?php include_once("../app/views/header.php");?>  
 
 <div id="Content">
 <br/>
 <div align="left" style="margin-left:50px;">
    <h2>Korisnici</h2>
 </div>
 <table width="500" border="0">
	   <tr>
		<th></th>
		<th>Korisničko ime</th>
	    <th>ID</th>
		<th></th>
		</tr>
		<tr>
	    <td colspan="4"><div style="border-bottom:#000 1px solid"></div></td>
		</tr>
 @foreach($users as $user)
		<tr>
		<td align="center">
		<img src="http://localhost/PhotoAlbum/app/storage/style/user_icon.png" width="35" height="35"/>
		</td>
		<td align="center">{{$user->username}}</td>
	    <td align="center">{{$user->id}}</td>
		<td align="center">{{HTML::linkRoute('user_photos', '->Slike', array($user->id))}}</td></tr>
		<tr><td colspan="4"><div style="border-bottom:#000 1px solid"></div></td></tr>
 @endforeach
 </table>
 <br/><br/>
 </div>
 
 <?php include_once("../app/views/footer.php");?> 
 
</div>
</body>
</html>
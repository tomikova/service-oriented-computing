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
<title>PhotoAlbum homepage</title>
<link rel="stylesheet" href="../app/storage/style/style.css" type="text/css" media="screen"/>
</head>

<body>
<div align="center" id="Wrapper">
    <?php include_once("../app/views/header.php");?> 
    <div id="Content">
	</br>
	</br>
	<table width="500" border="0">
	<tr>
	<td align="center" width="250">
	<a href="users">
	<img src="http://localhost/PhotoAlbum/app/storage/style/users.png" width="150" height="150"/>
	</a>
	</td>
	<td align="center">
	<a href="photos">
	<img src="http://localhost/PhotoAlbum/app/storage/style/pictures.png" width="170" height="170"/>
	</a>
	</td>
	</tr>
	<tr>
	<td align="center" width="250">
	<a href="users">
	Korisnici
	</a>
	</td>
	<td align="center">
	<a href="photos">
	Fotografije
	</a>
	</td>
	</tr>
	@if(isset($_SESSION["user"]))
		     <tr>
		     <td colspan="2" align="center">
			 <a href="users/{{$_SESSION["userId"]}}/photos">
	         <img src="http://localhost/PhotoAlbum/app/storage/style/personal.png" width="150" height="150"/>
	         </a>
			 </td> 
			 </tr>
			 <tr>
			 <td colspan="2" align="center">
			 <a href="users/{{$_SESSION["userId"]}}/photos">
	         Moje fotografije
	         </a>
			 </td> 
			 </tr>
	@endif
	</table>
	</br>
    </div>
    <?php include_once("../app/views/footer.php");?> 
</div>
</body>
</html>
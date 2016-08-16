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

<script type="text/javascript" src="http://localhost/PhotoAlbum/app/scripts/prototype.js"></script>
<script type="text/javascript" src="http://localhost/PhotoAlbum/app/scripts/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="http://localhost/PhotoAlbum/app/scripts/lightbox.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photos</title>
<link rel="stylesheet" href="http://localhost/PhotoAlbum/app/storage/style/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="http://localhost/PhotoAlbum/app/storage/style/lightbox.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="Wrapper">
    <?php include_once("../app/views/header.php");?> 
    <div id="Content">
	</br>
	</br>
	<table width="640" border="0">
	@if($count > 0)
		@foreach($photos as $photo)
			<tr>
			<td align="center" width="300">
			<a href="http://localhost/PhotoAlbum/app/storage/images/{{$photo->id}}/{{$photo->picNo}}.jpg" rel="lightbox">
			<img src="http://localhost/PhotoAlbum/app/storage/images/{{$photo->id}}/{{$photo->picNo}}.jpg" width="150" height="150" border="1"/>
			<a>
			</td>
			<td align="left" width="300">
			<strong>Naziv: </strong>{{$photo->name}}</br>
			<strong>Datum: </strong>{{$photo->date}}</br>
			<strong>Opis: </strong>{{$photo->description}}</br>
			<strong>Postavio: </strong>{{ DB::table('users')->where('id', '=', $photo->id)->first()->username }}</br>
			@if($photo->id == $_SESSION["userId"])
			<span style="display: inline;">
			{{Form::open(array('url'=>"http://localhost/PhotoAlbum/public/users/$photo->id/$photo->picNo/edit", 'method'=>'get','style'=>'display: inline;'))}}
			{{Form::submit('Edit')}}
			{{Form::close()}}
			{{Form::open(array('url'=>"http://localhost/PhotoAlbum/public/users/$photo->id/$photo->picNo/delete", 'method'=>'delete', 'style'=>'display: inline;'))}}
			{{Form::hidden('picNo',$photo->picNo)}}
			{{Form::submit('Delete')}}
			{{Form::close()}}
			</span>
			@endif
			</td>
			</tr>
		@endforeach
	@else
		<br/><img src="http://localhost/PhotoAlbum/app/storage/style/NoPhotoAvailable.jpg"/>
	@endif
	</table>
	</br>
    </div>
    <?php include_once("../app/views/footer.php");?> 
</div>
</body>
</html>
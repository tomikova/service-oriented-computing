<?php
//odjava korisnika
if (!isset($_SESSION)) 
{
  session_start();
}

$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != ""))
{
    $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) && ($_GET['doLogout']=="true"))
{
    $_SESSION["userId"] = NULL;
    $_SESSION["user"] = NULL;
    $_SESSION["userPassword"] = NULL;
    $_SESSION["id"] = NULL;
    $_SESSION["admin"] = NULL;
    $_SESSION["password"] = NULL;	
    unset($_SESSION["userId"]);
    unset($_SESSION["user"]);
    unset($_SESSION["userPassword"]);
    unset($_SESSION["id"]);
    unset($_SESSION["admin"]);
    unset($_SESSION["password"]);
    $logoutGoTo = "http://localhost/PhotoAlbum/public";
    if ($logoutGoTo) 
    {
        header("Location: $logoutGoTo");
        exit();
    }
}
?>

<?php
if (isset($_SESSION["user"]))
{
	$name = $_SESSION["user"];
	$user_ID = $_SESSION["userId"];
	$displayLink = '<strong><a href="'.$logoutAction.'">Odjava</a></strong>';
	$displayOptions = '<strong><a href="http://localhost/PhotoAlbum/public/upload">Upload</a></strong>';
}
else
{
	$displayLink = '<strong><a href="http://localhost/PhotoAlbum/public/login">Prijava</a></strong>';
	$displayOptions = '<strong><a href="http://localhost/PhotoAlbum/public/registration">Registracija</a></strong>';
	$name = "Guest";
}
?>

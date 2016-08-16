<?php
//prikazivanje grešaka, povezivanje na bazu, login/logout
//error_reporting(E_ALL);
//ini_set('display_errors','1');
//include "../app/scripts/connect_to_mysql.php";
include_once "../app/scripts/login_logout.php";
?>

<?php
//ako je korisnik već prijavljen- preusmjeravanje
if (isset($_SESSION["user"]))
{
	header("location: /public");
	exit();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prijava</title>
<link rel="stylesheet" href="../app/storage/style/style.css" type="text/css" media="screen"/>

<!-- javascript validacija-->
<script type="text/javascript" language="javascript">
function checkUser(username, password, fun)
{
  
    var url = "http://localhost/PhotoAlbum/app/scripts/validate_login.php";
    url = url + "?username=" + username;
    url = url + "&password=" + password;

    var xmlhttp;
  
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
     else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
			fun.call(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET",url,false);
    xmlhttp.send();
	
}

function Validate( ) 
{ 
    var isValid = true;
    if ( document.UserLogInForm.username.value == "" ) 
	{ 
	    alert ( "Upišite korisničko ime" ); 
	    isValid = false;
		document.UserLogInForm.username.focus();
    } 
	else if ( document.UserLogInForm.password.value == "" ) 
	{ 
         alert ( "Upišite lozinku" ); 
         isValid = false;
		 document.UserLogInForm.password.focus();
    }
	else
	{
		var userExists;
		checkUser(document.UserLogInForm.username.value, document.UserLogInForm.password.value, function() {userExists= this;} );		
	    if (userExists == 0)
        {
             alert ( "Neispravno korisničko ime ili lozinka" );
		     isValid = false;
        }
	}
	return isValid;
}
</script>

</head>

<body>
<div align="center" id="Wrapper">

 <?php include_once("../app/views/header.php");?> 
 
 <div id="Content">
    <br/>   
      <h2>Prijava</h2>
      <form id="UserLogInForm" name="UserLogInForm" method="post" action="login">
        Korisničko ime:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Lozinka:<br />
          <input name="password" type="password" id="password" size="40" />
       <br /><br />  
         <input type="submit" name="button" id="button" value="Log In" onclick="javascript:return Validate();" />    
      </form>
      <p><img src="../app/storage/style/login.png" width="200" height="200" alt="login" /> </p>
    <br />
  <br />
 </div>
 
<?php include_once("../app/views/footer.php");?> 
 
</div>
</body>
</html>
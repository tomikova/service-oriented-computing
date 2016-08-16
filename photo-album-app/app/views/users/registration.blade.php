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
<title>Registracija</title>
<link rel="stylesheet" href="../app/storage/style/style.css" type="text/css" media="screen"/>

<!-- javascript validacija-->
<script type="text/javascript" language="javascript">
function checkUser(page, what, value, fun)
{
    var url = page;
	url = url + "?" + what + "=" + value;
  
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
	var regex = new RegExp("[^A-Za-z0-9_]");
	var regexEmail = new RegExp("^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$");
    if ( document.RegistrationForm.email.value == "" ) 
	{ 
	    alert ( "Upišite email" ); 
	    isValid = false;
		document.RegistrationForm.email.focus();
    }
	else if (!regexEmail.test(document.RegistrationForm.email.value))
	{
		alert ( "Upišite ispravnu email adresu" );
		isValid = false;
		document.RegistrationForm.email.focus();
	}
	else if ( document.RegistrationForm.username.value == "" ) 
	{ 
         alert ( "Upišite korisničko ime" ); 
         isValid = false;
		 document.RegistrationForm.username.focus();
    }
	else if (regex.test(document.RegistrationForm.username.value))
	{
		alert ( "Korisničko ime smije sadržavati samo slova, brojke i podvlaku" );
		isValid = false;
		document.RegistrationForm.username.focus()
	}
	else if ( document.RegistrationForm.username.value.length < 6 ) 
	{ 
         alert ( "Korisničko ime mora sadržavati najmanje 6 znakova" ); 
         isValid = false;
		 document.RegistrationForm.username.focus();
    }
	else if ( document.RegistrationForm.password.value == "" ) 
	{ 
         alert ( "Upišite lozinku" ); 
         isValid = false;
		 document.RegistrationForm.password.focus();
    }
	else if (regex.test(document.RegistrationForm.password.value))
	{
		alert ( "Lozinka smije sadržavati samo slova, brojke i podvlaku" );
		isValid = false;
		document.RegistrationForm.password.focus();
	}
	else if ( document.RegistrationForm.password.value.length < 6 ) 
	{ 
         alert ( "Lozinka mora sadržavati najmanje 6 znakova" ); 
         isValid = false;
		 document.RegistrationForm.password.focus();
    } 
	else
	{
		var emailExists;
		checkUser("http://localhost/PhotoAlbum/app/scripts/validate_email.php", "email",  document.RegistrationForm.email.value, function() {emailExists= this;} );		
		
		var userExists;
		checkUser("http://localhost/PhotoAlbum/app/scripts/validate_username.php", "username", document.RegistrationForm.username.value, function() {userExists= this;} );	
		
		if (emailExists == 1)
        {
             alert ( "Upisani email već postoji u sustavu" );
		     isValid = false;
			 document.RegistrationForm.email.focus();
        }	
		
		
	    else if (userExists == 1)
        {
             alert ( "Korisničko ime je zauzeto" );
		     isValid = false;
			 document.RegistrationForm.username.focus();
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
      <h2>Registracija</h2>
      <form id="RegistrationForm" name="RegistrationForm" method="post" action="users/create">
        Email:<br />
          <input name="email" type="text" id="email" size="40" />
        <br /><br />
        Korisničko ime:<br />
          <input name="username" type="text" id="username" size="40" />
        <br /><br />
        Lozinka:<br />
          <input name="password" type="password" id="password" size="40" />
       <br /><br />  
          <input type="submit" name="button" id="button" value="Registracija" onclick="javascript:return Validate();" />    
      </form>
    <p><img src="../app/storage/style/new_user.png" width="175" height="175" alt="new_user" /></p>
    <br />
    <br />
 </div>
 
<?php include_once("../app/views/footer.php");?> 
 
</div>
</body>
</html>
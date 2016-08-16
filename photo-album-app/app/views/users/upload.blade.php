<?php
//prikazivanje grešaka, povezivanje na bazu, login/logout
//error_reporting(E_ALL);
//ini_set('display_errors','1');
//include "../app/scripts/connect_to_mysql.php";
include_once "../app/scripts/login_logout.php";
?>

<?php
if (!isset($_SESSION["user"]))
{
	header("location: login");
	exit();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload slike</title>
<link rel="stylesheet" href="../app/storage/style/style.css" type="text/css" media="screen"/>
</head>

<body>
<div align="center" id="Wrapper">
 <?php include_once("../app/views/header.php");?>
 <div id="Content">
  <p>&nbsp;</p>
  <div align="center">
  <h2>Upload slike  </h2>
  <form action="upload" enctype="multipart/form-data" name="NewPictureForm" id="NewPictureForm" method="post">
      <table width="600" border="0" cellspacing="0" cellpadding="6">
	      <tr align="right">
              <td>Slika:</td>
              <td align="left">
                  <label>
                      <input type="file" name="fileField" id="fileField" />
                  </label>
              </td>
          </tr>
          <tr align="right">
              <td width="37%">Naziv:</td>
              <td width="63%" align="left">
                  <label>
                      <input name="picName" type="text" id="picName" size="50" /> 
                  </label>
              </td>
          </tr>
          <tr align="right">
              <td>Opis:</td>
              <td align="left">
                  <label>
                      <textarea name="details" id="details" cols="39" rows="5"></textarea>
                  </label>
              </td>
          </tr>
		  <tr>
          <td height="40" colspan="2" align="center">
              <label>
                  <input type="submit" name="button" id="button" value="Upload"/>
              </label>
          </td>
      </tr>
      </table>
  </form>
  </br>
  </br>
  </div> 
 </div>
 <?php include_once("../app/views/footer.php");?>
</div>
</body>
</html>
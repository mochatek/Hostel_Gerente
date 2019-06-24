<?php
session_start();
if(isset($_SESSION["lid"]))
{
	if($_SESSION["role"]=="student")
	{
		$lid=$_SESSION["lid"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
	#sub
{
	background:#030;
	width:15%;
	height:30px;
	font:bold 14px Tahoma;
	text-align:center;
	border-radius:3px;
	}
	#col
	{
		height:20px;
		text-indent:10px;
		border-radius:5px;
		border:none;
		border-style:groove;
		width:140px;
		font:14px Tahoma;
		background:white;
	}
p#cmnt
{
	color:#F00;
}
#menus
{
	background:#336;
	width:15%;
	height:30px;
	border-radius:12px;
	font:bold 16px Tahoma;
	border:5px ridge #FFF;
	
	}
	#edit
	{
		height:30px;
		text-indent:10px;
		border-radius:4px;
		border:none;
		border-style:groove;
		width:140px;
		font:25px Tahoma;
		
	}
	.roundedge
{
-moz-border-radius: 5px;
 border-radius:5px
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Theme One</title>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'/>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
  <div class="logo-menu-container">
    <div class="logo">HOSTEL GERENTE</div>
    <div class="menu">
      <ul>
        <li><a href="stud_profile.php"  style="font:bold 16px tahoma">PROFILE</a></li>
        <li><a href="swap_room.php" style="font:bold 16px tahoma">ROOM</a></li>
        <li><a href="pay_mess.php" style="font:bold 16px tahoma">BILLS</a></li>
        <li><a href="contact.php" style="font:bold 16px tahoma" class="active">CONTACT</a></li>
          <li><a href="logout.php" style="font:bold 16px tahoma">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <div class="page">
    <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
    <div class="clear"></div>
         <table width="100%" align="center" cellpadding="5" bgcolor="#FFCC99">
      <tr align="center" ><td id="col"><a href="stud_profile.php"><img src="images/profile.png" width="80" height="80"><br><p align="center">PROFILE</p></a></td>
      <td id="col"><a href="swap_room.php" ><img src="images/rooms.png" width="80" height="80"><br><p align="center">ROOM</p></a></td>
      <td id="col"><a href="pay_mess.php" ><img src="images/bill.png" width="80" height="80"><br><p align="center">BILLS</p></a></td>
            <td id="col"><a href="contact.php" ><img src="images/inbox.png" width="80" height="80"><br><p align="center">CONTACT</p></a></td>
      <td id="col"><a href="logout.php" ><img src="images/logout.png" width="80" height="80"><br><p align="center">LOGOUT</p></a></td>
      </tr></table>
      <br>
       <div style="float:left;width:25%;border:2px solid"><table width="98%" align="center"  style="margin:2px" >
      <tr><td id="sub" style="background:#6C6"><a href="contact.php" style="color:black; ">CONTACT</a></td></tr>
      <tr><td id="sub" ><a href="stud_inbox.php" style="color:white">INBOX</a></td></tr>  
 
      </table>  
    </div>
 <div style="width:70%;float:right;border:2px solid" >
<form id="form1" method="post" action="sendmail.php" ><br>
  <table width="600" align="center" cellpadding="15" cellspacing="0"  style="margin-left:4%;border-collapse:collapse;border:1px solid black">
  <tr bgcolor="#7A8282" height="40px"><td width="243" align="center" style="color:white; font:16px Tahoma"><b>SUBJECT</b></td><td width="284"><select class="roundedge" name="sub" style=" width:190px; height:25px; float:left; color:#333; font:12px Tahoma; text-align:center; font-weight:bold; width:195px">
    <option style="color:#7A8282; font:12px Tahoma; text-align:center; font-weight:bold;" value="COMPLAINT">COMPLAINT</option>
       <option style="color:#7A8282; font:12px Tahoma; text-align:center; font-weight:bold;" value="SUGGESTION">SUGGESTION</option>
          <option style="color:#7A8282; font:12px Tahoma; text-align:center; font-weight:bold;" value="ENQUIRY">ENQUIRY</option>
            <option style="color:#7A8282; font:12px Tahoma; text-align:center; font-weight:bold;" value="ENQUIRY">REQUEST</option>
</select></td></tr>
             <tr><th height="154" colspan="2" align="center"><br><textarea class="roundedge" name="msg" style="text-indent:30px;padding:10px; width:370px;height:150px; color:#0066ff; font:bold 14px cambria;" placeholder=" Type your message."></textarea></th></tr>
             <tr><td><br></td></tr>
             <tr bgcolor="#CCCCCC" height="40px"><td align="center" colspan="100%"><input type="submit" name="send" value="SEND"   style=" -moz-border-radius: 12px;
 border-radius: 12px; background-color:#158ece; color:#FFF; border:1px solid #697779; width:100px; height:30px"></td></tr></table><br><br>
   </form>
</div>
<br>
<br>
  </div>
</div>
<div class="footer-wrapper">
  <div class="footer-top"></div>
  <div class="footer-center">
    <div class="footer-content-left">
      <h1>In tempor aliquam purus eu sagittis</h1>
      <h2>Sed ultrices tristique magna non accumsan massa vel libero posuere sagitt nisi</h2>
      <p>Aenean sit amet leo elit, nec ornare felis. Fusce laoreet sapien id ipsum pharetra varius. Integer a turpis tortor. Aliquam ac dignissim nibh. Mauris at posuere felis. Proin egestas, dolor ut imperdiet porta, velit lorem luctus massa, a pharetra felis lorem a nulla. </p>
      <p>Vivamus vel augue et nibh accumsan tempus nec sed metus. Nam porta massa non sapien congue lobortis. Nam pulvinar suscipit tellus id vestibulum. </p>
    </div>
    <div class="footer-content-right">
      <h1>Nullam eleme</h1>
      <h2>Nam fermentum ornare dui</h2>
      <p>Proin egestas, dolor ut imperdiet porta, velit lorem luctus massa, a pharetra felis lorem a nulla  ivam.</p>
      <h3>Email: info@untitled.com</h3>
      <h3>Phone: (800) 555-0000</h3>
    </div>
  </div>
  <div class="footer-bottom"></div>
</div>
<div class="clear"></div>
<div class="copyrights">Copyright (c) Untitled. Design by wwww.alltemplateneeds.com . Photos by photorack.net
  <div class="copyrights-bottom"></div>
</div>


</body>
</html>
<?php
	}
}
else
{
	header("location:login.php");
}
?>
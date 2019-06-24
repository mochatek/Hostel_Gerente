<?php
session_start();
if(isset($_SESSION["lid"]))
{
	if($_SESSION["role"]=="admin")
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
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
	.edit
	{
		height:20px;
		text-indent:10px;
		border-radius:5px;
		border:none;
		border-style:groove;
		width:180px;
		font:14px Tahoma;
	}
.tbl tr:nth-child(odd) {
background-color:#e6e6ff;
}
tr td {
    border: 1px solid #006;
    border-radius:18px;
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
        <li><a href="newreg_action.php"  style="font:bold 16px tahoma" >REQUEST</a></li>
        <li><a href="admin_search.php" style="font:bold 16px tahoma">SEARCH</a></li>
        <li><a href="rooms.php" style="font:bold 16px tahoma">ROOMS</a></li>
        <li><a href="mess_fees.php" style="font:bold 16px tahoma" >BILLS</a></li>
        <li><a href="inbox.php" style="font:bold 16px tahoma" class="active">INBOX</a></li>
          <li><a href="logout.php" style="font:bold 16px tahoma">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div class="searchform-container">
    <div class="searchform-content"></div>
  </div>
  <div class="clear"></div>
  <div class="page">
    <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
    <div class="clear"></div>
   <div><br>
     <table width="100%" align="center" cellpadding="5" >
      <tr align="center" ><td id="col"><a href="newreg_action.php"><img src="images/req.png" width="80" height="80"><br><p align="center">REQUESTS</p></a></td>
       <td id="col"><a href="admin_search.php"><img src="images/search.png" width="80" height="80"><br><p align="center">SEARCH</p></a></td>
      <td id="col"><a href="rooms.php" ><img src="images/rooms.png" width="80" height="80"><br><p align="center">ROOMS</p></a></td>
      <td id="col"><a href="mess_fees.php" ><img src="images/bill.png" width="80" height="80"><br><p align="center">BILLS</p></a></td>
      <td id="col"><a href="inbox.php" ><img src="images/inbox.png" width="80" height="80"><br><p align="center">INBOX</p></a></td>
      <td id="col"><a href="logout.php" ><img src="images/logout.png" width="80" height="80"><br><p align="center">LOGOUT</p></a></td>
      </tr></table>
      <br>
 <div style="border:3px ridge black;width:100%">
  <br>
      <?php
	  $lid=$_SESSION["lid"];
  include ("query.php");
  $ob=new query();
  $rs=$ob->readmail($lid);
  if(mysqli_num_rows($rs)<1)
  {
	  ?>
  <form>
      <table  width="90%" align="center" cellpadding="10" cellspacing="15"    style="margin-left:5%;">
	<tr><td  align="center" style="color:red; font:bold 18px Tahoma;"><b>INBOX IS EMPTY !</b></td></tr> </table></form>
  <?php
  }
  else
  {
  while($r=mysqli_fetch_array($rs))
  {
  ?>
   <form  method="post" action="admin_replyprocess.php" >
  <table  class="tbl" width="90%" align="center" cellpadding="10" cellspacing="15" bgcolor="#f2f2f2"  style="margin-left:5%">
  <tr><td  style="color:#006; font:bold 18px Tahoma;padding:10px"><span style="float:right; color:red; font:bold 10px Tahoma;"><?php echo $r[1];?></span>
  <p><u><?php echo $r[5];?></u><br><br><details><summary ><img src="images/user2.png" width="16" height="15" style="vertical-align: middle;"/><span style="vertical-align: middle; color:#666666; font:bold 14px Tahoma;">&nbsp;&nbsp;<?php echo $ob->getname($r[2])?></span></summary><hr><p style="margin-left:10%;margin-right:10%"><span style="text-align:justify; color:#000; font:bold 16px cambria;"><?php echo $r[4];?></span></p><hr><table width="80%" align="center" border="0" style="background-color:transparent;">
<tr><th><textarea name="reply" id="reply" placeholder="Reply" style="color:#666; font: 14px cambria;TEXT-INDENT:20PX;width:100%;border-radius:6px;height:30px"></textarea></th><th><input type="submit" value="REPLY" style="height:30px;width:80%;border-radius:6px; background-color:#F96;color:white; font-weight:bold" ></th></tr></table></td></tr></table><br> 
    <input type="hidden" name="from" value="<?php echo $r[2];?>">                            
    </form>
  <?php
  }
  }
  ?>
<br>
</div>
    </div>
  </div>
</div>
<div class="footer-wrapper">
  <div class="footer-top"></div>
  <div class="footer-center">
<div class="footer-content-left">
      <h1>MARIAN COLLEGE , KUTTIKKANAM</h1>
      <h2>Making Complete....</h2>
      <p>  Marian College is an educational institution in Kuttikkanam(Idukki), Kerala, India. It offers graduate and postgraduate courses. The Catholic Diocese of Kanjirapally established Marian College Kuttikkanam in 1995 to provide the student community with education in information technology, commerce, social work and management. </p>
      <p>Marian College Kuttikkanam is accredited with 'A' Grade by NAAC. The college is declared as the College with Potential for Excellence (CPE) by UGC. Marian college is affiliated to MG University Kottayam.</p>
      
    </div>
    


    <div class="footer-content-right">
      <h1>MARIAN BOY'S HOSTEL</h1>
      <h2>Kuttikkanam P.O</h2>
      <p>Peermade, Idukki District</p>
      <p>Kerala, India</p>
      <h3>Email: marianhostel@mcka.org</h3>
      <h3>Phone: 04869-232203, 232654</h3>
    </div>
  </div>
  <div class="footer-bottom"></div>
</div>
<div class="clear"></div>
<div class="copyrights">Copyright &copy; MochaTV.com
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
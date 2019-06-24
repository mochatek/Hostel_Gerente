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
        <li><a href="pay_mess.php" style="font:bold 16px tahoma" class="active">BILLS</a></li>
        <li><a href="contact.php" style="font:bold 16px tahoma" >CONTACT</a></li>
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
      <tr><td id="sub" style="background:#6C6"><a href="pay_mess.php" style="color:black; ">MESS FEES</a></td></tr>
      <tr><td id="sub" ><a href="pay_rent.php" style="color:white">HOSTEL RENT</a></td></tr>  
 
      </table>  
    </div>
 <div style="width:70%;float:right;border:2px solid" >
<form method="post" action="messpay_process.php"> 
<table align="center" width="100%" cellspacing="2" cellpadding="5">
<?php
include ("query.php");
$dt=date("d-m-Y");
$m=date("m",strtotime($dt));
$y=date("Y",strtotime($dt));
$ob=new query();
$rs=$ob->messfees($m,$y);
$rw=mysqli_num_rows($rs);
if($rw>0)
{
$r=mysqli_fetch_array($rs);
?>
<tr><th colspan="3" bgcolor="#000000" align="center" style="color:#CCCCCC">MESS FEES</th></tr>
<tr><th align="center">Mess fees for this Month is</th></tr>
<?php
$rs=$ob->getpaydate($lid,$r[0]);
if(mysqli_num_rows($rs)<1)
{
?>
<tr><th align="center" style="font:bold 30px Tahoma;color:red; background:#FFCC99; border:2px ridge red">&#x20B9;.<?php echo $r[2] ;?></th></tr>
<tr><th align="center"><input type="submit" name="pay" value="PAY NOW" style="background:#09F;color:white;border:2px solid blue;width:100%;height:25px;font: bold 16px Tahoma"></th></tr>
<?php	
}
else
{
$p=mysqli_fetch_array($rs);	
?>
<tr ><th align="center" style="font:bold 30px Tahoma;color:green; background:#9F9; border:2px ridge green">&#x20B9;.<?php echo $r[2] ;?></th></tr>
<tr><th align="center" style="color:green" style="font: bold 16px Tahoma">Paid on <?php echo date("d-M-Y",strtotime($p[3]));?></th></tr>
<?php
}
}
else
{
	echo "<tr><th align='center' style='font:bold 20px Tahoma;color:red; background:#FFCC99; padding:10px; border:3px ridge red'>Mess fees for this Month hasn't been added !</th></tr>";
}
?>
</table>
<input type="hidden" name="fid" value="<?php echo $r[0] ;?>">
</form>
</div>
<br>

<br>
 <div style="width:70%;float:right;border:2px solid;margin-top:50px;">
<table align="center" cellpadding="5" width="100%" bgcolor="white" border="1" style="border:1px outset">
<tr><th colspan="3" bgcolor="#000000" style="color:white" align="center">PAYMENT HISTORY</th></tr>
<tr bgcolor="#999999" style="color:black"><th width="33%" align="center">MONTH-YEAR</th><th width="33%" align="center">AMOUNT</th><th align="center">STATUS</th></tr>
<?php
$rs=$ob->messhistory($lid);
$rw=mysqli_num_rows($rs);
if($rw>0)
{
while($r=mysqli_fetch_array($rs))
{
?>
<tr ><th style="text-indent:50px;color:#333"><?php echo date("M",strtotime($r[1]))." - ".date("Y",strtotime($r[1]));?></th><th align="center" style="color:#333"><?php echo $r[2] ;?></th>
<th style="text-indent:50px"><?php 
if($r[3]==1)
{
echo "<span style='color:green'>PAID</span>";
}
else
{
echo "<span style='color:red'>DUE</span>&nbsp;&nbsp;&nbsp;&nbsp;<a style='background:#09F;color:white;border:1px solid blue;font:10px Tahoma;padding:2px;border-radius:4px' href='messpay_process.php?fid=$r[0]'>PAY NOW</a>";	
}
?></th></tr>
<?php
}
}
else
{
	echo "<tr><th colspan='3'>NO RECORDS !</th></tr>";
}
?>
</table><br>
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
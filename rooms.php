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
#link
{
	color:#FFFFFF;
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
        <li><a href="rooms.php" style="font:bold 16px tahoma" class="active">ROOMS</a></li>
        <li><a href="mess_fees.php" style="font:bold 16px tahoma" >BILLS</a></li>
        <li><a href="inbox.php" style="font:bold 16px tahoma" >INBOX</a></li>
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
   <form action="" method="POST" style="border:3px ridge black">
   <div style="width:90%;margin:5%">
<?php
include ("query.php");
$ob=new query();
	 for($i=1;$i<=3;$i++)
	 {
		 if($i==1)
		 echo "<br><table bgcolor='#333333' width='100%' style='color:white;'  align='center' cellpadding='16%' cellspacing='10'><tr><th align='center' bgcolor='#CC0000' colspan='100%'>SINGLE ROOMS</th></tr>";
		  else if($i==2)
		 echo "<br><table bgcolor='#666666' width='100%' style='color:white'  align='center' cellpadding='16%' cellspacing='10'><tr><th  align='center' bgcolor='#930' colspan='100%'>DOUBLE ROOMS</th></tr>";
		  else if($i==3)
		 echo "<br><table bgcolor='#ccccc' width='100%' style='color:white'  align='center' cellpadding='16%' cellspacing='10'><tr><th  align='center' bgcolor='#903' colspan='100%'>THRIPLE ROOMS</th></tr>";
     $res=$ob->allrooms($i);
	 $rw=mysqli_num_rows($res);
 $count=1;
echo "<tr>";
     while($r=mysqli_fetch_array($res))
	 {  //maximum of 9 rooms to be shown in a row 
		if($count<=9)
		 {	if($r[3]!=NULL)
		 {
		 
		 	 echo "<td align='center'><a href='view_student.php?sid=$r[3]' id='link'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room2.png' ><p><p align='center'>$r[0]</p></a></td>";
		 }
		 else
			 echo "<td align='center'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room.png' ><p><p align='center'>$r[0]</p></td>";
			 $count=$count+1;
		 }
		 else
		 {
		 $count=1;
		 echo "</tr>";
		 if($r[3]!=NULL)
		 {
			 $lid=$ob->sid($r[3]);
		 	 echo "<tr><td align='center'><a href='view_student.php?lid=$lid' id='link'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room2.png' ><p><p align='center'>$r[0]</p></a></td>";
		 }
		 else
		 echo "<tr><td align='center'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room.png' ><p><p align='center'>$r[0]</p></td>";
		 }
	 }
	

 echo "</tr></table><br>";
	 }
	 ?>
</div>
    </form>
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
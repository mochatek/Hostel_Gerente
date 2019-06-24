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
        <li><a href="admin_search.php" style="font:bold 16px tahoma" class="active">SEARCH</a></li>
        <li><a href="rooms.php" style="font:bold 16px tahoma" >ROOMS</a></li>
        <li><a href="mess_fees.php" style="font:bold 16px tahoma" >BILLS</a></li>
        <li><a href="inbox.php" style="font:bold 16px tahoma" >INBOX</a></li>
          <li><a href="logout.php" style="font:bold 16px tahoma">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <div class="page">
    <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
    <div class="clear"></div><br>
     <table width="100%" align="center" cellpadding="5" >
      <tr align="center" ><td id="col"><a href="newreg_action.php"><img src="images/req.png" width="80" height="80"><br><p align="center">REQUESTS</p></a></td>
       <td id="col"><a href="admin_search.php"><img src="images/search.png" width="80" height="80"><br><p align="center">SEARCH</p></a></td>
      <td id="col"><a href="rooms.php" ><img src="images/rooms.png" width="80" height="80"><br><p align="center">ROOMS</p></a></td>
      <td id="col"><a href="mess_fees.php" ><img src="images/bill.png" width="80" height="80"><br><p align="center">BILLS</p></a></td>
      <td id="col"><a href="inbox.php" ><img src="images/inbox.png" width="80" height="80"><br><p align="center">INBOX</p></a></td>
       <td id="col"><a href="logout.php" ><img src="images/logout.png" width="80" height="80"><br><p align="center">LOGOUT</p></a></td>
      </tr></table>
      <br>
    <div style="width:50%;float:left">
      <br><br>
      <form style="border:2px ridge black">
      <br>
      <?php
$sid=$_GET["sid"];
include ("query.php");
$ob=new query();
$lid=$ob->sid($sid);
$res=$ob->dispstudent($lid);
$r=mysqli_fetch_array($res);
?>
<table width="80%" align="center"  style=" margin-left: auto;margin-right: auto;" >
<tr><th colspan="2" align='left'><img style="max-width:100%;max-height:100%;border:3px double black;object-fit:contain" width="172" height="172" src="images/<?php echo $r[21];?>" /></th></tr>
<tr><td colspan="2"><br><td></tr>
<tr><th>NAME</th><th style="text-transform:uppercase; color:red"><?php echo $r[1];?></th></tr>
    <tr><th width="50%">NICKNAME</th><td width="20%"><?php echo $r[2];?></td></tr>  
    <tr><th>DOJ</th><td><?php echo $r[22];?></td></tr>  
    <tr><th>DOB</th><td><?php echo $r[4];?></td></tr>  
    <tr><th>ROOM</th><td><?php echo $r[23];?></td></tr>  
    <tr><th>COURSE</th><td><?php echo $r[5];?></td></tr> 
    <tr><th>BLOOD</th><td><?php echo $r[6];?></td></tr>  
    <tr><th>AADHAR NO</th><td><?php echo $r[7];?></td></tr>   
    <tr><th>PHONE</th><td><?php echo $r[8];?></td></tr>
    <tr><th>EMAIL</th><td><?php echo $r[9];?></td></tr>
    <tr><th align="left" style="font:bold 14px Tahoma; color:blue"><u><br>CONTACT</u></th></tr>     
    <tr><th>GUARDIAN</th><td><?php echo $r[10];?></td></tr> 
    <tr><th>PHONE</th><td><?php echo $r[11];?></td>
    <tr><th>PIN-CODE</th><td><?php echo $r[20];?></td></tr> 
    <tr><th >FATHER</th><td width="20%"><?php echo $r[12];?></td></tr>
    <tr><th>PHONE</th><td><?php echo $r[13];?></td></tr>
    <tr><th>MOTHER</th><td><?php echo $r[14];?></td></tr>
    <tr><th>PHONE</th><td><?php echo $r[15];?></td></tr> 
    <tr><th align="left" style="font:bold 14px Tahoma; color:blue"><u><br>ADDRESS</u></th></tr>  
    <tr><th>HOUSE</th> <td><?php echo $r[16];?></td></tr>  
    <tr><th>PLACE</th><td><?php echo $r[17];?></td></tr>  
    <tr><th>POST-OFFICE</th><td><?php echo $r[18];?></td></tr>
    <tr><th>DISTRICT</th><td><?php echo $r[19];?></td></tr>  
    </table><br>
    </form>
  </div>
  <div style="width:40%;margin-right:5%;float:right">
    <br><br>
   <p style="background:#39F;color:white;font:bold 18px Tahoma" align="center">MESS FEES</p> 
  <form style="border:2px ridge black">
<?php
 $res=$ob->messdet($sid);
if(mysqli_num_rows($res)>0)
{
	echo "<table align='center' width='95%' style='margin-left:2.5%;margin-top:20px ;'>
	<tr bgcolor='#000000' style='color:white' height='25px'><th align='center'>MONTH</th><th  align='center'>AMOUNT</th><th  align='center'>STATUS</th></tr>";
	while($r=mysqli_fetch_array($res))
	{

		if($r[2]==NULL)
		{
		echo "<tr bgcolor='white' height='25px' ><td style='text-indent:20px'>".date('M',strtotime($r[0]))." - ".date('Y',strtotime($r[0]))."</td><td style='text-indent:20px'>$r[1]</td><td  align='center' style='color:red'>NOT PAID&nbsp;&nbsp;&nbsp;<a href='notify.php?sid=$sid&d=".date('M',strtotime($r[0]))." - ".date('Y',strtotime($r[0]))."&f=0' style='color:red;font:bold 10px Tahoma; padding:1px;background:#FFCC99; border:2px ridge red'>NOTIFY</a></td></tr>";
		}
		else
		{
		
	echo "<tr bgcolor='white' height='25px'><td style='text-indent:20px'>$r[0]</td><td style='text-indent:20px'>$r[1]</td><td  align='center' style='color:green'>PAID on $r[2]</td></tr>";
		}
	}
	echo "</table><br>";
}
else
{
	echo "<p align='center' style='color:red;'>NO MESS HISTORY</p>";
}
?>
</form>
 <br><br>
   <p style="background:#39F;color:white;font:bold 18px Tahoma" align="center">HOSTEL RENT</p> 
  <form style="border:2px ridge black">
<?php
 $res=$ob->rentdet($sid);
if(mysqli_num_rows($res)>0)
{
	echo "<table align='center' width='95%' style='margin-left:2.5%;margin-top:20px ;'>
	<tr bgcolor='#000000' style='color:white' height='25px'><th align='center'>YEAR</th><th  align='center'>AMOUNT</th><th  align='center'>STATUS</th></tr>";
	while($r=mysqli_fetch_array($res))
	{

		if($r[2]==NULL)
		{
		echo "<tr bgcolor='white' height='25px' ><td style='text-indent:20px'>".date('Y',strtotime($r[0]))."</td><td style='text-indent:20px'>$r[1]</td><td  align='center' style='color:red'>NOT PAID&nbsp;&nbsp;&nbsp;<a href='notify.php?sid=$sid&d=".date('Y',strtotime($r[0]))."&f=1' style='color:red;font:bold 10px Tahoma; padding:1px;background:#FFCC99; border:2px ridge red'>NOTIFY</a></td></tr>";
		}
		else
		{
		
	echo "<tr bgcolor='white' height='25px'><td style='text-indent:20px'>$r[0]</td><td style='text-indent:20px'>$r[1]</td><td  align='center' style='color:green'>PAID on $r[2]</td></tr>";
		}
	}
	echo "</table><br>";
}
else
{
	echo "<p align='center' style='color:red;'>NO RENT HISTORY</p>";
}
?>
</form>
 <br><br>
   <p style="background:#39F;color:white;font:bold 18px Tahoma" align="center">COMMENTS</p> 
  <form style="border:2px ridge black" method="post" action="cmnt_process.php">
  <input type="hidden" name="sid" value="<?php echo $sid;?>">
<?php
 $res=$ob->getcmnt($sid);
if(mysqli_num_rows($res)>0)
{
	echo "<table align='center' width='95%' style='margin-left:2.5%;margin-top:20px ;'>";
	while($r=mysqli_fetch_array($res))
	{

		if($r[3]==1)
		{
		echo "<tr bgcolor='white' height='25px' ><td align='center' width='20px'><img src='images/pros.png' width='15px' height='15px'></td><td style='text-indent:20px'>$r[2]</td><td width='8%' align='center'><a href='dltcmnt.php?cid=$r[0]&sid=$sid'>X</a></td></tr>";
		}
		else
		{
		
		echo "<tr bgcolor='white' height='25px' ><td  align='center'><img src='images/cons.png' width='15px' height='15px'></td><td style='text-indent:20px'>$r[2]</td><td width='8%' align='center'><a href='dltcmnt.php?cid=$r[0]&sid=$sid'>X</a></td></tr>";
		}
	}
	echo "</table>";
}
else
{
	echo "<p align='center' style='color:red;'>NO COMMENTS</p>";
}
?>
<details><summary align="center" style="color:black;font:bold 13px Tahoma;padding:8px">ADD COMMENT</summary>
<table align="center" width="95%" style="margin-left:2.5%;margin-top:20px ;">
<tr><td width="70%"><textarea name="cmnt" placeholder="Enter comments.." style="height:80px;width:95%; padding:5px"></textarea></td>
<td align="center"><input type="radio" name="flag" value="1"/>&nbsp;<span style="color:green">POSITIVE</span><br><br>
<input type="radio" name="flag" value="0" />&nbsp;<span style="color:red">NEGATIVE</span></td></tr></table><br>
<input type="submit" name="submit" value="SUBMIT" style="width:100%;background:#F60;color:black;font:bold 16px Tahoma;border:ridge;border-radius:5px">
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
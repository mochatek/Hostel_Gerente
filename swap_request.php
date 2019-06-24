<?php
session_start();
if(isset($_SESSION["lid"]))
{
	if($_SESSION["role"]=="student")
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
p#cmnt
{
	color:#F00;
}
</style>
<script language="javascript" type="text/javascript">
function passdata(row){
	
    var hr = new XMLHttpRequest();
    var url = "swap_det_disp_process.php";
	var id=row.id;
	var vars="rid="+id;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("results").innerHTML = return_data;
	    }
    }
    hr.send(vars); 
}
</script>
<style>
	#col
	{
		height:20px;
		text-indent:10px;
		border-radius:5px;
		border:none;
		border-style:groove;
		width:140px;
		font:bold 14px Tahoma;
		background:#CCCCCC;
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
	#sub
{
	background:#030;
	width:15%;
	height:30px;
	font:bold 14px Tahoma;
	text-align:center;
	border-radius:3px;
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
        <li><a href="swap_room.php" style="font:bold 16px tahoma" class="active">ROOM</a></li>
        <li><a href="pay_mess.php" style="font:bold 16px tahoma" >BILLS</a></li>
        <li><a href="contact.php" style="font:bold 16px tahoma" >CONTACT</a></li>
          <li><a href="logout.php" style="font:bold 16px tahoma">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <div class="page">
    <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
    <div class="clear"></div><br>
    <table width="100%" align="center" cellpadding="5">
      <tr align="center"><td id="col" ><a href="stud_profile.php" style="color:black"><img src="images/profile.png" width="80" height="80"><br><p align="center">PROFILE</p></a></td>
      <td id="col"><a href="swap_room.php" style="color:black"><img src="images/rooms.png" width="80" height="80"><br><p align="center">ROOM</p></a></td>
      <td id="col"><a href="pay_mess.php" style="color:black"><img src="images/bill.png" width="80" height="80"><br><p align="center">BILLS</p></a></td>
            <td id="col"><a href="contact.php" ><img src="images/inbox.png" width="80" height="80"><br><p align="center">CONTACT</p></a></td>
      <td id="col"><a href="logout.php" style="color:black"><img src="images/logout.png" width="80" height="80"><br><p align="center">LOGOUT</p></a></td>
      </tr></table><br>
      <div style="float:left;width:25%;border:2px solid"><table width="98%" align="center"  style="margin:2px" >
      <tr><td id="sub" ><a href="swap_room.php" style="color:white; ">SWAP ROOMS</a></td></tr>
      <tr><td id="sub" style="background:#6C6"><a href="swap_request.php" style="color:black">SWAP REQUESTS</a></td></tr>  
      <tr><td id="sub"><a href="vacate.php" style="color:white">VACATE ROOM</a></td></tr>  
      </table><br>     
    </div>
 <div style="width:70%;float:right;border:2px solid" >
 <table align="center" width="100%" cellspacing="0" cellpadding="5">
 <tr><th colspan="3" bgcolor="#000000" align="center" style="color:#CCCCCC">ROOM SWAP REQUESTS</th></tr>
<?php
$lid=$_SESSION["lid"];
include ("query.php");
$ob=new query();
$rs=$ob->showrequests($lid);
$rw=mysqli_num_rows($rs);
if($rw>0)
{
	while($r=mysqli_fetch_array($rs))
{
	?>
    <tr id="<?php echo substr($r[2],0,strlen($r[2])-1);?>" onclick="passdata(this)" bgcolor="#FFFFFF"><th  width="50%" align="center"><p style="text-transform:uppercase"><?php echo $r[1];?></p></th>
    <th  width="20%"><img src="images/request.png" width="35" height="35"></th>
<th width="30%"><p><img src="images/room.png" hieght="30" width="30"></p><p><?php echo $r[2];?></p></th></tr>
    <?php
	
}
}
else
{
	?>
    <tr bgcolor="#FFFFFF"><th colspan="3" align="center" style="color:red;padding:10px">NO NEW REQUESTS !</th></tr>
    <?php
}
?>
</table>
</div>

 <div style="width:70%;float:right;border:2px solid" id="results">

 </div>
 <div style="width:70%;float:right;border:2px solid;margin-top:50px;">
<table align="center" cellpadding="5" width="100%" bgcolor="white" border="1" style="border:1px outset">
<tr><th colspan="3" bgcolor="#000000" style="color:white" align="center">SWAP HISTORY</th></tr>
<tr bgcolor="#999999" style="color:black"><th width="33%" align="center">DATE</th><th width="33%" align="center">TO</th><th align="center">STATUS</th></tr>
<?php
$rs=$ob->swaphistory($lid);
$rw=mysqli_num_rows($rs);
if($rw>0)
{
while($r=mysqli_fetch_array($rs))
{
?>
<tr ><th style="text-indent:50px;color:#333"><?php echo date("d/M/Y",strtotime($r[2]));?></th><th align="center" style="color:#333"><p align="center"><img src="images/room2.png" height="40px" width="40px"></p><p align="center"><?php echo $r[3] ;?></p></th>
<th  align="center"><?php 
if($r[4]==0)
{
echo "<span style='color:black'>PENDING</span>";
}
else if($r[4]==1)
{
echo "<span style='color:blue'>ACCEPTED BY ROOM OWNER</span>";	
}
else if($r[4]==2)
{
echo "<span style='color:green'>APPROVED BY ADMIN</span>";	
}
else if($r[4]==1)
{
echo "<span style='color:red'>REJECTED</span>";	
}
?></th></tr>
<?php
}
}
else
{
	echo "<tr><th colspan='3' align='center' style='color:red'>NO SWAP HISTORY !</th></tr>";
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
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
<script language="javascript" type="text/javascript">
function passdata(rid,rm){
    var hr = new XMLHttpRequest();
    var url = "room_display_process.php";
	var vars="rid="+rid+"&rm="+rm;
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
function room(el)
{
	var room=document.getElementById("rm").value;
	if(room==0)
	{
		el.src="images/room2.png";
		document.getElementById("rm").value=el.id;
	}
	else
	{
		document.getElementById(room).src="images/room.png";
		el.src="images/room2.png";
		document.getElementById("rm").value=el.id;
	}
	
	passdata(document.getElementById("rm").value,document.getElementById("rid").value);
	window.location.href="#r";
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
        <li><a href="swap_room.php" style="font:bold 16px tahoma"  class="active">ROOM</a></li>
        <li><a href="pay_mess.php" style="font:bold 16px tahoma">BILLS</a></li>
        <li><a href="contact.php" style="font:bold 16px tahoma" >CONTACT</a></li>
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
   <br>
 
     <table width="100%" align="center" cellpadding="5" >
      <tr align="center" ><td id="col"><a href="stud_profile.php"><img src="images/profile.png" width="80" height="80"><br><p align="center">PROFILE</p></a></td>
      <td id="col"><a href="swap_room.php" ><img src="images/rooms.png" width="80" height="80"><br><p align="center">ROOM</p></a></td>
      <td id="col"><a href="pay_mess.php" ><img src="images/bill.png" width="80" height="80"><br><p align="center">BILLS</p></a></td>
            <td id="col"><a href="contact.php" ><img src="images/inbox.png" width="80" height="80"><br><p align="center">CONTACT</p></a></td>
      <td id="col"><a href="logout.php" ><img src="images/logout.png" width="80" height="80"><br><p align="center">LOGOUT</p></a></td>
      </tr></table><br>
      <div style="float:left;width:25%;border:2px solid"><table width="98%" align="center"  style="margin:2px" >
      <tr><td id="sub" style="background:#6C6"><a href="swap_room.php" style="color:black; ">SWAP ROOMS</a></td></tr>
      <tr><td id="sub"><a href="swap_request.php" style="color:white">SWAP REQUESTS</a></td></tr>  
      <tr><td id="sub"><a href="vacate.php" style="color:white">VACATE ROOM</a></td></tr>  
      </table></div><div style="width:70%;float:right;">
   <form  style="border:2px solid">
   <input type="hidden" id="rm" name="rm" value="0">
<?php
include ("query.php");
$ob=new query();
 for($i=1;$i<=3;$i++)
	 {
		 if($i==1)
		 echo "<br><table bgcolor='#333333' width='98%' style='color:white;margin-left:1%; '  align='center' cellpadding='16%' cellspacing='10'><tr><th align='center' bgcolor='#CC0000' colspan='100%'>SINGLE ROOMS</th></tr>";
		  else if($i==2)
		 echo "<br><table bgcolor='#666666' width='98%' style='color:white;margin-left:1%;  align='center' cellpadding='16%' cellspacing='10'><tr><th  align='center' bgcolor='#930' colspan='100%'>DOUBLE ROOMS</th></tr>";
		  else if($i==3)
		 echo "<br><table bgcolor='#ccccc' width='98%' style='color:white;margin-left:1%;  align='center' cellpadding='16%' cellspacing='10'><tr><th  align='center' bgcolor='#903' colspan='100%'>THRIPLE ROOMS</th></tr>";
     $res=$ob->viewrooms($i);
	 $rw=mysqli_num_rows($res);
 $count=1;
echo "<tr>";
     while($r=mysqli_fetch_array($res))
	 {  //maximum of 9 rooms to be shown in a row 
		if($count<=9)
		 {	
			 echo "<td align='center'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room.png' onclick='room(this)'><p><p align='center'>$r[0]</p></td>";
			 $count=$count+1;
		 }
		 else
		 {
		 $count=1;
		 echo "</tr>";
		
		 echo "<tr><td align='center'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room.png' onclick='room(this)'><p><p align='center'>$r[0]</p></td>";
		 }
	 }
	

 echo "</tr></table><br>";
	 }
	 ?>
     <table width="100%" align="center"><tr><td width="100%">
     <a name="r"> <div id="results" style="width:100%" align="center"></div>
    </a></td></tr></table><br>
    </form>
    <?php
    $room=$ob->getrid($_SESSION["lid"]);
   echo "<input type='hidden' id='rid' name='rid' value='$room'>";
   ?>
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
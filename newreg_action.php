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
<script language="javascript" type="text/javascript">
function passdata(row){
	
    var hr = new XMLHttpRequest();
    var url = "stud_det_disp_process.php";
	var id=row.id;
	var vars="lid="+id;
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
        <li><a href="newreg_action.php"  style="font:bold 16px tahoma" class="active">REQUEST</a></li>
        <li><a href="admin_search.php" style="font:bold 16px tahoma">SEARCH</a></li>
        <li><a href="rooms.php" style="font:bold 16px tahoma">ROOMS</a></li>
        <li><a href="mess_fees.php" style="font:bold 16px tahoma" >BILLS</a></li>
        <li><a href="inbox.php" style="font:bold 16px tahoma" >INBOX</a></li>
          <li><a href="logout.php" style="font:bold 16px tahoma">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <div class="page">
    <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
    <div class="clear"></div>
         <table width="100%" align="center" cellpadding="5" >
      <tr align="center" ><td id="col"><a href="newreg_action.php"><img src="images/req.png" width="80" height="80"><br><p align="center">REQUESTS</p></a></td>
       <td id="col"><a href="admin_search.php"><img src="images/search.png" width="80" height="80"><br><p align="center">SEARCH</p></a></td>
      <td id="col"><a href="rooms.php" ><img src="images/rooms.png" width="80" height="80"><br><p align="center">ROOMS</p></a></td>
      <td id="col"><a href="mess_fees.php" ><img src="images/bill.png" width="80" height="80"><br><p align="center">BILLS</p></a></td>
      <td id="col"><a href="inbox.php" ><img src="images/inbox.png" width="80" height="80"><br><p align="center">INBOX</p></a></td>
       <td id="col"><a href="logout.php" ><img src="images/logout.png" width="80" height="80"><br><p align="center">LOGOUT</p></a></td>
      </tr></table>
      <br>
       <div style="float:left;width:25%;border:2px solid"><table width="98%" align="center"  style="margin:2px" >
      <tr><td id="sub" style="background:#6C6"><a href="newreg_action.php" style="color:black; ">ADMISSION APPLICATIONS</a></td></tr>
      <tr><td id="sub" ><a href="swap_action.php" style="color:white">ROOMSWAP APPLICATIONS</a></td></tr>  
      <tr><td id="sub"><a href="vacate_action.php" style="color:white">VACATE APPLICATIONS</a></td></tr>  
      </table><br>     
    </div>
 <div style="width:70%;float:right;border:2px solid" >
 <table align="center" width="100%" cellspacing="0" cellpadding="5">
 <tr><th colspan="3" bgcolor="#000000" align="center" style="color:#CCCCCC">NEW REGISTRATIONS</th></tr>
<?php
include ("query.php");
$ob=new query();
$rs=$ob->newregisters();
$rw=mysqli_num_rows($rs);
if($rw>0)
{
	while($r=mysqli_fetch_array($rs))
{
	?>
    <tr id="<?php echo $r[0];?>" onclick="passdata(this)"><th  width="70%" style="text-indent:20px"><p style="text-transform:uppercase"><?php echo $r[1];?></p><p>[&nbsp;<?php echo $r[2];?>&nbsp;]</p></th>
    <th  width="20%"><img src="images/arrow.png" width="20" height="20"></th>
<th width="20%"><p><img src="images/room.png" hieght="30" width="30"></p><p><?php echo $r[3];?></p></th></tr>
    <?php
}
}
else
{
	?>
    <tr><th colspan="3" align="center" style="color:red;padding:10px">NO NEW APPLICATIONS !</th></tr>
    <?php
}
?>

</table>
</div>
<br>

<br>
 <div style="width:70%;float:right;border:2px solid" id="results">

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
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
<script language="javascript" type="text/javascript">
window.onload = function() {
  passdata();
};
function passdata(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "messfees_search.php";
    var d = document.getElementById("date").value;
	var c=document.getElementById("course").value;
	var s=document.getElementById("student").value;
	var vars="d="+d+"&c="+c+"&s="+s;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("results").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
}
</script>
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
        <li><a href="newreg_action.php"  style="font:bold 16px tahoma">REQUEST</a></li>
        <li><a href="admin_search.php" style="font:bold 16px tahoma">SEARCH</a></li>
        <li><a href="rooms.php" style="font:bold 16px tahoma">ROOMS</a></li>
        <li><a href="mess_fees.php" style="font:bold 16px tahoma" class="active">BILLS</a></li>
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
      <tr><td id="sub" style="background:#6C6"><a href="mess_fees.php" style="color:black; ">MESS FEES</a></td></tr>
      <tr><td id="sub" ><a href="hostel_rent.php" style="color:white">HOSTEL RENT</a></td></tr>  
 
      </table>  
    </div>
 <div style="width:70%;float:right;border:2px solid" >
<form method="post" action="messfee_add_process.php"> 
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
<tr><th align="center" style="font:bold 30px Tahoma;color:red; background:#FFCC99; border:2px ridge red">&#x20B9;.<?php echo $r[2] ;?></th></tr>
<tr><th align="center">updated on <?php echo date("d-M-Y",strtotime($r[1]));?></th></tr>
<?php	
}
else
{
?>
<tr><th colspan="3" bgcolor="#000000" align="center" style="color:#CCCCCC" colspan="2">ADD MESS FEE FOR THIS MONTH</th></tr>
<tr><th colspan="2"><br></th><tr>
<tr><th align="right" width="60%"><span style="font:bold 25px Tahoma;color:black">&#x20B9;</span>&nbsp;<input type="text" name="amount" id="edit"></th>
<th align="left"><input type="submit" name="add" value="ADD" style="background:green; border-radius:2px; margin:5px;height:25px; width:50px;border:outset; font:bold 13px Tahoma white;color:white"></th></tr>	
<tr><th colspan="2"><br></th><tr>
<?php
}
?>

</table>
</form>
</div>
<br>

<br>
 <div style="width:70%;float:right;border:2px solid;margin-top:50px">
<table align="center" cellspacing="5">
<tr><th align="center"><select  name="date"  id="date" style="width:200px" onchange="passdata()">
    <?php
    $rs=$ob->getmessdate();
  while($r=mysqli_fetch_array($rs))
  {
	  $m=date("M",strtotime($r[1]));
	  $y=date("Y",strtotime($r[1]));
	  echo "<option value='$r[0]'>$m $y</option>";
  }
  ?>
 </select></th>
 <th ><select  name="course" id="course" style="width:200px" onchange="passdata()">
<option value="0" selected="selected">ALL</option>
    <?php
    $rs=$ob->getcourse();
  while($r=mysqli_fetch_array($rs))
  {
	  echo "<option value='$r[0]'>$r[0]</option>";
  }
  ?>
 </select></th>
 <th><select  name="student" id="student" style="width:200px" onchange="passdata()">
      <option value="1" >PAID</option>
        <option value="0" selected="selected">DUE</option>
 </select></th></tr>
</table>
<div id="results">
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
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

</style>
<script language="javascript" type="text/javascript">
window.onload = function() {
  passdata();
};
function passdata(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "search_process1.php";
    var str = document.getElementById("str").value;
	var filter=document.getElementById("filter").value;
	var vars="str="+str+"&filter="+filter;
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
        <li><a href="rooms.php" style="font:bold 16px tahoma">ROOMS</a></li>
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
 <div style="border:3px ridge black;width:100%">
   <table align="center" width="500" style="margin-left:20%" CELLSPACING="15">
   <tr><th WIDTH="30%" align="left"><input type="text" name="str" id="str" style="width:100%"></th>
<th width="15%" align="left"><input type="SUBMIT" value="SEARCH" name="search" onclick="passdata()" style="width:100%" ></th>
<th width="15%" align="left"><select name="filter" id="filter" style="width:100%" onchange="passdata()">
<option value="0" selected="selected">ALL</option>
<option value="1">NAME</option>
<option value="2">COURSE</option>
<option value="3">ROOM</option>
<option value="4">DISTRICT</option>
</select>
</th></tr></table>

   <div id="results">
   
   </div>
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
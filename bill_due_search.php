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
function passdata(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "bill_search_process.php";
	var filter=document.getElementById("filter").value;
	var vars="filter="+filter;
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
    <div class="logo">Untitled</div>
    <div class="menu">
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Solutions</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Blog</a></li>
        <li class="nobg"><a href="#">Contact</a></li>
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
 
   <table align="center" width="500" style="margin-left:20%" CELLSPACING="15">
   <tr><th WIDTH="33%" >&nbsp;</th>
<th width="34%" align="center"><select name="filter" id="filter" style="width:100%" onchange="passdata()">
  <option value="0" selected="selected">ALL</option>
  <option value="1">NAME</option>
  <option value="2">COURSE</option>
  <option value="3">ROOM</option>
  <option value="4">DISTRICT</option>
</select></th>
<th WIDTH="33%" >&nbsp;</th>
 <tr><th colspan="3" align="center">
   <div id="results"> 
   </div>
 </th> </tr> </table>
    </div>
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

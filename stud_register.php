<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
var loadFile=function(event)
{
	var output=document.getElementById('output');
	output.src=URL.createObjectURL(event.target.files[0]);

};
function book(el)
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
          <li><a href="login.php"  style="font:bold 16px tahoma">HOME</a></li>
        <li><a href="stud_register.php" style="font:bold 16px tahoma" class="active">REGISTER</a></li>
        <li><a href="#" style="font:bold 16px tahoma">ABOUT</a></li>
        <li><a href="#" style="font:bold 16px tahoma">NEWS</a></li>
        <li><a href="#" style="font:bold 16px tahoma">CONTACT</a></li>
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
   <form action="stud_register_process.php" method="POST" enctype="multipart/form-data">
   <table width="100%" align="center" cellpadding="10" cellspacing="10" style=" margin-left: auto;margin-right: auto;" >
  
    <tr><th>NAME</th><td ><input type="text" name="sname"></td>
   <th rowspan="7" colspan="2"><p align="center"><img style="max-width:100%;max-height:100%;border:3px double black;object-fit:contain" width="172" height="172" id=   "output"/></p><p align="center"><br><input type="file" name="photo" id="photo" accept="image/*" onchange="loadFile(event)" ></p></th>
   <th>FATHER</th><td><input type="text" name="fname"></td></tr>
    <tr><th>NICKNAME</th><td><input type="text" name="nname"></td>
    <th>PHONE</th><td><input type="text" name="fphone"></td></tr>
    <tr><th>AGE</th><td><input type="text" name="age" ></td>
    <th>MOTHER</th><td><input type="text" name="mname"></td></tr>
    <tr><th>DOB</th><td><input type="date" name="dob" style="width:170px" ></td>
    <th>PHONE</th><td><input type="text" name="mphone"></td></tr>   
    <tr><th>COURSE</th><td><select  name="course"  style="width:175px">
    <option value="0" >-- SELECT COURSE --</option>
    <?php
	    include ("query.php");
  $ob=new query();
    $rs=$ob->getcourse();
  while($c=mysqli_fetch_array($rs))
  {
	  echo "<option value='$c[0]'>$c[0]</option>";
  }
  ?>
            </select>
    </td></tr> 
    <tr><th>BLOOD</th><td><select name="blood" style="width:175px">
              <option value="0" >-- BLOOD GROUP --</option>
  
  <?php
  $rs=$ob->getblood();
  while($b=mysqli_fetch_array($rs))
  {
	  echo "<option value='$b[0]'>$b[0]</option>";
  }
  ?>
            </select></td><td></td>
    <th colspan="2" >ADDRESS</th></tr>
    <tr><th>AADHAR NO</th><td><input type="text" name="adrno"></td>
      <th>HOUSE</th>
      <td><input type="text" name="house" /></td>
    </tr>
    <tr><th>PHONE</th><td><input type="text" name="sphone"></td><td></td><td></td>
      <th>PLACE</th>
      <td><input type="text" name="place" /></td>
    </tr>
    <tr><th>EMAIL</th><td><input type="email" name="email"></td>
      <th >USERNAME</th>
      <td><input type="text" name="uname" /></td>
      <th>POST-OFFICE</th>
      <td><input type="text" name="po" /></td>
    </tr> 
    <tr><th>GUARDIAN</th><td><input type="text" name="gname"></td>
      <th>PASSWORD</th>
      <td><input type="password" name="pswd" /></td>
      <th>DISTRICT</th>
      <td>  <select name="dist" id="dist" style="width:175px">
              <option value="0">-- SELECT DISTRICT --</option>
                  <?php
  $rs=$ob->getdistrict();
  while($r=mysqli_fetch_array($rs))
  {
  ?>
  <option value="<?php echo $r[1];?>"><?php echo $r[1];?></option>
  <?php } ?>
            </select></td>
    </tr> 
        <tr><th>PHONE</th><td><input type="text" name="gphone"></td><td></td><td></td>
        <th>PIN-CODE</th><td><input type="text" name="pin"></td></tr> 
    <input type="hidden" id="rm" name="rm" value="0">
    </table>
    
    </div>
    
    <p align="center">SELECT ROOM</p>
    <div>
    <table width="600" align="center" cellpadding="10" cellspacing="10" style=" margin-left: auto;margin-right: auto;">
     <?php
	 for($i=1;$i<=3;$i++)
	 {
		 if($i==1)
		 echo "<tr><th><details><summary>SINGLE ROOMS</summary><table width='100%' align='center' cellpadding='16%' cellspacing='10' style='margin-left: auto;margin-right: auto;'>";
		  else if($i==2)
		 echo "<tr><th><details><summary>DOUBLE ROOMS</summary><table width='100%' align='center' cellpadding='16%'  cellspacing='10' style='margin-left: auto;margin-right: auto;'>";
		  else if($i==3)
		 echo "<tr><th><details><summary>THRIPLE ROOMS</summary><table width='100%' align='center' cellpadding='16%' cellspacing='10' style='margin-left: auto;margin-right: auto;'>";
     $res=$ob->freerooms($i);
	 $rw=mysqli_num_rows($res);
if ($rw<1)
{
echo "<tr><td align='center' style='color:red; font:14px Tahoma'>NO FREE ROOMS AVAILABLE !</td></tr>";
}
else
{ $count=1;
echo "<tr>";
     while($r=mysqli_fetch_array($res))
	 {  //maximum of 6 rooms to be shown in a row 
		if($count<=5)
		 {
			 echo "<td align='center'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room.png' onclick='book(this)'><p><p align='center'>$r[0]</p></td>";
			 $count=$count+1;
		 }
		 else
		 {
		 $count=1;
		 echo "</tr>";
		 echo "<tr><td align='center'><p><img name='$r[0]' id='$r[0]' height='50' width='50' src='images/room.png' onclick='book(this)'><p><p align='center'>$r[0]</p></td>";
		 }
	 }
}
echo "</table></details></th></tr>";
	 }
	 ?>
     <tr><th colspan="3"><input type="submit" value="SUBMIT" name="submit" ></th></tr>
    </table> 
    
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

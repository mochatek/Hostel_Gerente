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
<script>
var loadFile=function(event)
{
	var output=document.getElementById('output');
	output.src=URL.createObjectURL(event.target.files[0]);
      
};
function enable()
{
	var elmnts=document.getElementsByClassName('edit');
	for(var i=0;i<elmnts.length;i++)
	{
		elmnts[i].removeAttribute('readonly');
		}
		document.getElementById("photo").style.display="inline";
		var elmnts2=document.getElementsByClassName('edit2');
	for(var i=0;i<elmnts2.length;i++)
	{
		elmnts2[i].disabled=false;
		}
		

}
function disable()
{
	var elmnts=document.getElementsByClassName('edit');
	for(var i=0;i<elmnts.length;i++)
	{
		elmnts[i].setAttribute('readonly','readonly');
		}
		var elmnts2=document.getElementsByClassName('edit2');
	for(var i=0;i<elmnts2.length;i++)
	{
		elmnts2[i].disabled=true;
		}
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
	.edit
	{
		height:20px;
		text-indent:10px;
		border-radius:5px;
		border:none;
		border-style:groove;
		width:200px;
		font:14px Tahoma;
	}
	.edit2
	{
		height:30px;
		text-indent:10px;
		border-radius:5px;
		border:none;
		border-style:groove;
		width:200px;
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
        <li><a href="stud_profile.php"  style="font:bold 16px tahoma" class="active">PROFILE</a></li>
        <li><a href="swap_room.php" style="font:bold 16px tahoma">ROOM</a></li>
        <li><a href="pay_mess.php" style="font:bold 16px tahoma" >BILLS</a></li>
        <li><a href="contact.php" style="font:bold 16px tahoma" >CONTACT</a></li>
          <li><a href="logout.php" style="font:bold 16px tahoma">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
  <div class="page">
    <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
    <div class="clear"></div>
    <div><br>
 <table width="100%" align="center" cellpadding="5" >
      <tr align="center" ><td id="col"><a href="stud_profile.php"><img src="images/profile.png" width="80" height="80"><br><p align="center">PROFILE</p></a></td>
      <td id="col"><a href="swap_room.php" ><img src="images/rooms.png" width="80" height="80"><br><p align="center">ROOM</p></a></td>
      <td id="col"><a href="pay_mess.php" ><img src="images/bill.png" width="80" height="80"><br><p align="center">BILLS</p></a></td>
            <td id="col"><a href="contact.php" ><img src="images/inbox.png" width="80" height="80"><br><p align="center">CONTACT</p></a></td>
      <td id="col"><a href="logout.php" ><img src="images/logout.png" width="80" height="80"><br><p align="center">LOGOUT</p></a></td>
      </tr></table><br>
      <?php
	  include ("query.php");
	  $ob=new query();
	  $res=$ob->dispstudent($_SESSION["lid"]);
	  $r=mysqli_fetch_array($res);
	  ?>
      <form  method="post" action="stud_update_process.php" enctype="multipart/form-data" style="border:3px solid black"><br>
<table width="80%" align="center"  style=" margin-left: auto;margin-right: auto;" cellspacing="5">
<tr><th colspan="5" align='center'><p><img style="max-width:100%;max-height:100%;border:3px double black;object-fit:contain" width="172" height="172" src="images/<?php echo $r[21];?>" id="output"/></p><p><input type="file" name="photo" id="photo" accept="image/*" onchange="loadFile(event)" style="display:none" value="<?php echo $r[21];?>" ></p></th></tr>
<tr><th colspan="5">&nbsp;</th></tr>
    <tr><th width="20%">NAME</th><td width="20%"><input id="txt" type="text"  name="sname" value="<?php echo $r[1];?>" class="edit" readonly="readonly"></td>
    <th>&nbsp;</th><th width="20%">FATHER</th><td width="20%"><input type="text" name="fname" value="<?php echo $r[12];?>" class="edit" readonly="readonly"></td></tr>
    <tr><th>NICKNAME</th><td><input type="text" name="nname" value="<?php echo $r[2];?>" class="edit" readonly="readonly"></td>
    <th>&nbsp;</th> <th>PHONE</th><td><input type="text" name="fphone" value="<?php echo $r[13];?>" class="edit" readonly="readonly"></td></tr>
    <tr><th>AGE</th><td><input type="text" name="age" value="<?php echo $r[3];?>" class="edit" readonly="readonly"></td>
     <th>&nbsp;</th><th>MOTHER</th><td><input type="text" name="mname" value="<?php echo $r[14];?>" class="edit" readonly="readonly"></td></tr>
    <tr><th>DOB</th><td><input type="text" name="dob" value="<?php echo $r[4];?>" class="edit" readonly="readonly"></td>
     <th>&nbsp;</th><th>PHONE</th><td><input type="text" name="mphone" value="<?php echo $r[15];?>" class="edit" readonly="readonly"></td></tr>   
    <tr><th>COURSE</th><td><select name="course"   class="edit2" disabled="disabled">
      
       <?php
	$cs=$ob->getcourse();
	while($c=mysqli_fetch_array($cs))
	{
		if($r[5]==$c[0])
		echo "<option value='$c[0]' selected='selected'>$c[0]</option>";
		else
		echo "<option value='$c[0]'>$c[0]</option>";
	}
	?></select>
    
    
    </td></tr> 
    <tr><th>BLOOD</th><td><select name="blood"   class="edit2" disabled="disabled">
      
       <?php
	$bs=$ob->getblood();
	while($b=mysqli_fetch_array($bs))
	{
		if($r[6]==$b[0])
		echo "<option value='$b[0]' selected='selected'>$b[0]</option>";
		else
		echo "<option value='$b[0]'>$b[0]</option>";
	}
	?></select>
    
    </td><td></td>
    <th colspan="2" align="left" style="color:blue"><u>ADDRESS</u></th></tr>
    <tr><th>AADHAR NO</th><td><input type="text" name="adrno" value="<?php echo $r[7];?>" class="edit" readonly="readonly"></td> <th>&nbsp;</th>
      <th>HOUSE</th>
      <td><input type="text" name="house" value="<?php echo $r[16];?>" class="edit" readonly="readonly"/></td>
    </tr>
    <tr><th>PHONE</th><td><input type="text" name="sphone" value="<?php echo $r[8];?>" class="edit" readonly="readonly"></td>
       <th>&nbsp;</th><th>PLACE</th>
      <td><input type="text" name="place" value="<?php echo $r[17];?>" class="edit" readonly="readonly"/></td>
    </tr>
    <tr><th>EMAIL</th><td><input type="email" name="email" value="<?php echo $r[9];?>" class="edit" readonly="readonly"></td>
      <th >&nbsp;</th>
    
      <th>POST-OFFICE</th>
      <td><input type="text" name="po" value="<?php echo $r[18];?>" class="edit" readonly="readonly"/></td>
    </tr> 
    <tr><th>GUARDIAN</th><td><input type="text" name="gname" value="<?php echo $r[10];?>" class="edit" readonly="readonly" ></td>
      <th>&nbsp;</th>
 
      <th>DISTRICT</th>
      <td><select name="dist"  class="edit2" disabled="disabled" >
      
       <?php
	$ds=$ob->getdistrict();
	while($d=mysqli_fetch_array($ds))
	{
		if($r[19]==$d[1])
		echo "<option value='$d[1]' selected='selected'>$d[1]</option>";
		else
		echo "<option value='$d[1]'>$d[1]</option>";
	}
	?></select>
      <!--<input type="text" name="dist" value="<?php //echo $r[19];?>" class="edit" readonly="readonly">-->
      </td>
    </tr> 
        <tr><th>PHONE</th><td><input type="text" name="gphone" value="<?php echo $r[11];?>" class="edit" readonly="readonly"></td><td></td>
        <th>PIN-CODE</th><td><input type="text" name="pin" value="<?php echo $r[20];?>" class="edit" readonly="readonly"></td></tr> 
        <tr><td colspan="5"><br></td></tr>
 <tr><th colspan="2" align="right"><input type="button" name="edit" value="EDIT" onclick="enable()" style="width:100%;height:25px; background:#F60;border-radius:6px;font:bold 14px Tahoma"></th><th></th><th colspan="2" align="left"><input type="submit" name="update" value="UPDATE" onclick="disable()"  style="width:100%;height:25px; background:#3C3;border-radius:6px; font:bold 14px Tahoma"></th></tr>
    </table>
    <br>
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

<?php
include ("query.php");
$ob=new query();
$sname=$_POST["sname"];
$nname=$_POST["nname"];
$age=$_POST["age"];
$dob=$_POST["dob"];
$course=$_POST["course"];
$blood=$_POST["blood"];
$adrno=$_POST["adrno"];
$sphone=$_POST["sphone"];
$email=$_POST["email"];
$gname=$_POST["gname"];
$gphone=$_POST["gphone"];
$fname=$_POST["fname"];
$fphone=$_POST["fphone"];
$mname=$_POST["mname"];
$mphone=$_POST["mphone"];
$house=$_POST["house"];
$place=$_POST["place"];
$po=$_POST["po"];
$dist=$_POST["dist"];
$pin=$_POST["pin"];
$uname=$_POST["uname"];
$pswd=$_POST["pswd"];
$doj=date("d-m-Y");
$room=$_POST["rm"];
$photo=$_FILES["photo"]["name"];
$role="student";
$status="0";
$res=$ob->studregister($sname,$nname,$age,$dob,$course,$blood,$adrno,$sphone,$email,$gname,$gphone,$fname,$fphone,$mname,$mphone,$house,$place,$po,$dist,$pin,$photo,$doj,$room,$status,$uname,$pswd,$role);
//upload photo to xampp images folder
copy($_FILES["photo"]["tmp_name"],"images/".$photo);
if($res>0)
{
	header("location:login.php");
}
?>
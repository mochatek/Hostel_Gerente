<?php
echo $sid=$_GET["sid"];
$d=$_GET["d"];
$f=$_GET["f"];
$date=date("d/m/Y");
if($f==0)
{
	$sub="MESS DUES";
	$msg="Your Mess fees for ".$d." is due.Kindly pay ASAP to avoid further actions.";
}
else if($f==1)
{
	$sub="RENT DUES";
	$msg="Your Hostel rent for ".$d." is due.Kindly pay ASAP to avoid further actions.";
}
include("query.php");
$ob=new query();
$lid=$ob->sid($sid);
$res=$ob->sendmail($date,16,$lid,$msg,$sub);
header("location:view_student.php?sid=$sid");
?>
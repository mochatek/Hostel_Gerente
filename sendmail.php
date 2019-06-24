<?php
session_start();
$from=$_SESSION["lid"];
$msg=$_POST["msg"];
$date=date("d/m/Y");
$sub=$_POST["sub"];
$to=16;
include ("query.php");
$ob=new query();
$rs=$ob->sendmail($date,$from,$to,$msg,$sub);
if($rs>0)
{
	header("location:stud_profile.php");
}
?>
<?php
session_start();
$lid=$_SESSION["lid"];
if(isset($_GET["fid"]))
{
	$fid=$_GET["fid"];
}
else
{
$fid=$_POST["fid"];
}
$date=date("Y-m-d");
include ("query.php");
$ob=new query();
$rs=$ob->messpay($date,$fid,$lid);
if($rs>0)
{
	header("location:pay_mess.php");
}
?>
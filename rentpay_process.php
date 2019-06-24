<?php
session_start();
$lid=$_SESSION["lid"];
if(isset($_GET["rid"]))
{
	$rid=$_GET["rid"];
}
else
{
$rid=$_POST["rid"];
}
$date=date("Y-m-d");
include ("query.php");
$ob=new query();
$rs=$ob->rentpay($date,$rid,$lid);
if($rs>0)
{
	header("location:pay_rent.php");
}
?>
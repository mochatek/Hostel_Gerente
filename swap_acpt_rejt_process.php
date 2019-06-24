<?php
session_start();
if(isset($_POST["accept"]))
{
	$status=1;
}
else if(isset($_POST["reject"]))
{
	$status=3;
}
include ("query.php");
$lid=$_SESSION["lid"];
$ob=new query();
$res=$ob->swapstatus($lid,$status);
if($res>0)
{
	header("location:swap_request.php");
}


?>
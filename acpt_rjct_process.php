<?php
$status=0;
if(isset($_POST["approve"]))
{
	$status=1;
}
else if(isset($_POST["reject"]))
{
	$status=2;
}
include ("query.php");
$lid=$_POST["lid"];
$ob=new query();
$res=$ob->studstatus($lid,$status);
if($res>0)
{
	header("location:newreg_action.php");
}


?>
<?php
$sid=$_POST["sid"];
$cmnt=$_POST["cmnt"];
$flag=$_POST["flag"];
include ("query.php");
$ob=new query();
$rs=$ob->addcmnt($sid,$cmnt,$flag);
if($rs>0)
{
	header("location:view_student.php?sid=$sid");
}
?>
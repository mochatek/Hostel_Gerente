<?php
$cid=$_GET["cid"];
$sid=$_GET["sid"];
include ("query.php");
$ob=new query();
$rs=$ob->dltcmnt($cid);
if($rs>0)
{
	header("location:view_student.php?sid=$sid");
}
?>
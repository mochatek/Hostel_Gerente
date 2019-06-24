<?php
session_start();
$uname=$_POST["uname"];
$pswd=$_POST["pswd"];
$role=$_POST["role"];
include("query.php");
$ob=new query();
$rs=$ob->login($uname,$pswd,$role);
if(mysqli_num_rows($rs)>0)
{	$r=mysqli_fetch_array($rs);
	$_SESSION["lid"]=$r[0];
	$_SESSION["role"]=$role;
	if($role=="student")
	header ("location:stud_profile.php");
	elseif($role=="admin")
	header ("location:newreg_action.php");	
}
else
{
		header ("location:login.php");

}
?>
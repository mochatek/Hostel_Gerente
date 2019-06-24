<?php
$from=16;
$to=$_POST["from"];
$date=date("d/m/Y");
$msg=$_POST["reply"];
$sub="REPLY";
include ("query.php");
$ob=new query();
$res=$ob->sendmail($date,$from,$to,$msg,$sub);
header("location:inbox.php");
?>
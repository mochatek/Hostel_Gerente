<?php
$amount=$_POST["amount"];
$date=date("Y-m-d");
include ("query.php");
$ob=new query();
$rs=$ob->addmessfees($date,$amount);
header("location:mess_fees.php");

?>
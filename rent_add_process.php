<?php
$amount=$_POST["amount"];
$date=date("Y-m-d");
include ("query.php");
$ob=new query();
$rs=$ob->addrent($date,$amount);
header("location:hostel_rent.php");

?>
<?php
session_start();
$lid=$_SESSION["lid"];
$rid=$_GET["rid"];
$date=date('d-m-Y');
include("query.php");
$ob=new query();
$res=$ob->swaprequest($lid,$date,$rid);
header("location:swap_room.php");
?>
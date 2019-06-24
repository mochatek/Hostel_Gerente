<?php
session_start();
if(isset($_SESSION["lid"]))
{
unset($_SESSION["lid"]);
header("location:login.php");
}
?>
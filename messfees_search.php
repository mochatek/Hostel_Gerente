<?php
 $d=$_POST["d"];
 $c=$_POST["c"];
 $s=$_POST["s"];
include("query.php");
$ob=new query();
 $res=$ob->messfeesearch($d,$c,$s);
if(mysqli_num_rows($res)>0)
{
	echo "<table align='center' width='95%' style='margin-left:2.5%;margin-top:20px ;'>
	<tr bgcolor='#000000' style='color:white'><th align='center'>STUDENT</th><th  align='center'>STATUS</th></tr>";
	while($r=mysqli_fetch_array($res))
	{
		if($r[1]==NULL)
		{
		echo "<tr bgcolor='white' ><td style='text-indent:50px'>$r[0]</td><td  align='center' style='color:red'>NOT PAID&nbsp;&nbsp;&nbsp;<a href='view_student.php?sid=$r[2]' style='color:red;font:bold 10px Tahoma; padding:1px;background:#FFCC99; border:2px ridge red'>NOTIFY</a></td></tr>";
		}
		else
		{
		
		echo "<tr bgcolor='white' ><td style='text-indent:50px'>$r[0]</td><td  align='center' style='color:green'>PAID on $r[1]</td></tr>";
		}
	}
	echo "</table><br>";
}
else
{
	echo "<p align='center' style='color:red;'>NO RESULTS</p>";
}
?>
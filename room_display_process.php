<?php
$rid=$_POST["rid"];
$rm=$_POST["rm"];
include ("query.php");
$ob=new query();
$res1=$ob->getrooms($rid);
$n=mysqli_num_rows($res1);
echo "<table align='center' cellspacing='20'><tr><th colspan='100%' style='font: bold 18px Tahoma;color:black'>ROOM MATES</th></tr><tr>";
while($r1=mysqli_fetch_array($res1))
{
	echo "<td width='30%/$n' align='center' bgcolor='#FFFFFF' style='border:1px solid black'><p align='center' style='background:red;color:white'>$r1[0]</p><p><table width='100%' align='center' cellspacing='5'>";
	$res2=$ob->roomdetails($r1[3]);
	if(mysqli_num_rows($res2)>0)
	{
		$r2=mysqli_fetch_array($res2);
			echo "<tr><td  colspan='2' width='100%' align='center'><img src='images/$r2[0]' style='max-width:100%;max-height:100%;object-fit:contain' width='100' height='100'></td></tr>";
			echo "<tr><td align='right' width='10%'><img src='images/user.png' height='10' width='10'></td><td>$r2[1]</td></tr>";
			echo "<tr><td align='right'><img src='images/course.png' height='10' width='10'></td><td>$r2[2]</td></tr>";
			echo "<tr><td align='right'><img src='images/phone.png' height='8' width='8'></td><td>$r2[3]</td></tr>";
			echo "<tr><td align='right'><img src='images/mail.png' height='10' width='10'></td><td>$r2[4]</td></tr>";
			if($r1[0]!=$rm)
			echo "<tr><td align='center' colspan='2'style='background:green'><a href='room_swap_process.php?rid=$r1[0]' style='color:white'>REQUEST</a></td></tr>";	
		
	}
	else
	{
echo "<tr><td  colspan='2' width='100%' align='center'><img src='images/room.png' style='max-width:100%;max-height:100%;object-fit:contain' width='100' height='100'></td></tr>";
			echo "<tr><td colspan='2'>&nbsp;</td></tr>";
			echo "<tr><td colspan='2'  align='center'>EMPTY ROOM</td></tr>";
			echo "<tr><td colspan='2' >&nbsp;</td></tr>";
			echo "<tr><td colspan='2' >&nbsp;</td></tr>"; 
			echo "<tr><td align='center' colspan='2' style='background:green'><a href='room_swap_process.php?rid=$r1[0]' style='color:white'>REQUEST</a></td></tr>";	

	}
	echo "</table></p></td>";
}
echo "</tr></table>";
?>

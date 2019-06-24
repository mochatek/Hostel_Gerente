
<?php
$lid=$_POST["lid"];
include ("query.php");
$ob=new query();
$res=$ob->dispstudent($lid);
$r=mysqli_fetch_array($res);
echo "<form action='acpt_rjct_process.php' method='POST'><br>";
echo "<table width='100%' style='margin-left:auto; margin-right:auto; border-collapse:collapse;' cellspacing='0' cellpadding='0'>";

echo "<tr><td rowspan='5' width='200' align='center'><img src='images/$r[21]' style='max-width:100%;max-height:100%;border:3px;object-fit:contain' width='150' height='150'></td>";

echo "<td width='25'><img src='images/dob1.png' height='20' width='20'></td><td >&nbsp;&nbsp;&nbsp;&nbsp;$r[4]</td>";
echo "<td width='25'><img src='images/addr.png' height='25' width='25'></td><td rowspan='2'>$r[16]</p><p>$r[17]&nbsp;,&nbsp;$r[18]&nbsp;(P.O)</p><p>$r[19]&nbsp;,&nbsp;PIN :&nbsp;$r[20]</p></td></tr>";


echo "<tr><td ><img src='images/blood.png' height='25' width='25'></td><td >&nbsp;&nbsp;&nbsp;&nbsp;$r[6]</td></tr> ";
echo "<tr><td ><img src='images/aadhar1.png' height='25' width='25'></td><td>&nbsp;&nbsp;&nbsp;&nbsp;$r[7]</td><td ><img src='images/phone.png' height='15' width='15'></td><td>&nbsp;&nbsp;&nbsp;&nbsp;$r[8]</td> </tr>";
echo "<tr><td ><img src='images/course.png' height='25' width='25'></td><td>&nbsp;&nbsp;&nbsp;&nbsp;$r[5]</td><td ><img src='images/mail.png' height='20' width='20'></td><td>&nbsp;&nbsp;&nbsp;&nbsp;$r[9]</td></tr> ";
echo "<tr><td colspan='4'><hr></td></tr>";


echo "<tr><td align='center'><p><span style='text-transform:uppercase;font:bold 14px Tahoma;color:blue'>$r[1]</span></p><p style='color:black'>(&nbsp;$r[2]&nbsp;)</p></td><td ><img src='images/father.png' height='25' width='20'></td><td>&nbsp;&nbsp;&nbsp;&nbsp;$r[12]&nbsp;[PH:&nbsp;$r[13]&nbsp;]</td><td ><img src='images/mother.png' height='25' width='20'></td><td>&nbsp;&nbsp;&nbsp;&nbsp;$r[14]&nbsp;[PH:&nbsp;$r[15]&nbsp;]</td></tr>";


echo "<tr><th></th><th colspan='2' align='center'><input type='submit' name='approve' value='APPROVE' style='width:80%;background:green;color:white;border:3px ridge white;height:30px;border-radius:5px'></th><th colspan='2' align='center'><input type='submit' name='reject' value='REJECT'  style='width:80%;background:red;color:white;border:3px ridge white;height:30px;border-radius:5px''></th></tr></table><input type='hidden' name='lid' value='$lid'></form><br>";
?>

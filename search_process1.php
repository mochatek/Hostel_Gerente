
<?php
$str=$_POST["str"];
include ("query.php");
$ob=new query();
if($_POST["filter"]==0)
{
$res=$ob->searchstudent($str,0);
echo "<p id='cmnt' align='center'>NO FILTERS APPLIED!</p>";
}
else if($_POST["filter"]==1)
{
$res=$ob->searchstudent($str,1);
echo "<p id='cmnt' align='center'>SEARCHING ON NAME</p>";
}
else if($_POST["filter"]==2)
{
$res=$ob->searchstudent($str,2);
echo "<p id='cmnt' align='center'>SEARCHING ON COURSE</p>";
}
else if($_POST["filter"]==3)
{
$res=$ob->searchstudent($str,3);
echo "<p id='cmnt' align='center'>SEARCHING ON ROOM</p>";
}
else if($_POST["filter"]==4)
{
$res=$ob->searchstudent($str,4);
echo "<p id='cmnt' align='center'>SEARCHING ON DISTRICT</p>";
}
 echo "<br><table width='95%' border='1' cellspacing='0' align='center' style='margin-left:2.5%'>
<tr bgcolor='#000000' style='#CCCC' align='center'><th>NAME</th><th>COURSE</th><th>ROOM</th><th>DOJ</th></tr> ";
 if($rw=mysqli_num_rows($res)>0)
{

 while($r=mysqli_fetch_array($res))
 {
	 echo "<tr align='center'><td><a href='view_student.php?sid=$r[0]'>$r[1]&nbsp;[&nbsp;$r[2]&nbsp;]</a></td><td>$r[5]</td><td>$r[23]</td><td>$r[22]</td></tr>";
	

 }
 
echo "</table><br><br>";
}
else
{
	echo "<tr><th  colspan='4' align='center'><p id='cmnt'>NO RESULTS FOUND !</p></th></tr>";
}
?>

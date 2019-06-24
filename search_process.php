
<?php
$str=$_POST["str"];
include ("query.php");
$ob=new query();
if($_POST["filter"]==0)
{
$res=$ob->searchstudent($str,0);
echo "<p id='cmnt'>NO FILTERS APPLIED!</p>";
}
else if($_POST["filter"]==1)
{
$res=$ob->searchstudent($str,1);
echo "<p id='cmnt'>SEARCHING ON NAME</p>";
}
else if($_POST["filter"]==2)
{
$res=$ob->searchstudent($str,2);
echo "<p id='cmnt'>SEARCHING ON COURSE</p>";
}
else if($_POST["filter"]==3)
{
$res=$ob->searchstudent($str,3);
echo "<p id='cmnt'>SEARCHING ON ROOM</p>";
}
else if($_POST["filter"]==4)
{
$res=$ob->searchstudent($str,4);
echo "<p id='cmnt'>SEARCHING ON DISTRICT</p>";
}
 if($rw=mysqli_num_rows($res)>0)
{
 while($r=mysqli_fetch_array($res))
 {
   
	 echo "<br><table width='100%' align='center' cellspacing='3' cellpadding='3'>";
	 echo "<tr><th align='left' rowspan='6' width='18%'><img src='images/$r[21]' width='100px' height='100px'style='max-width:100%;max-height:100%;border:3px;object-fit:contain'></th>";
	 echo "<td width='18%'><span style='text-transform:uppercase'>$r[1]</span>&nbsp;($r[2])</td><td rowspan='3' width='18%' align='left'><p>$r[16]</p><p>$r[17][P.O],$r[18]</p><p>$r[19],$r[20]</p></td></tr>";
		 echo "<tr><td>AGE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$r[3]</td></tr>"; 
		  echo "<tr><td>COURSE :&nbsp;$r[5]</td></tr>";
		   echo "<tr><td>ROOM&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$r[23]</td><td>EMAIL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$r[9]</td></tr>";
		    echo "<tr><td>DOJ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$r[22]</td><td>CONTACT :&nbsp;$r[8]</td></tr>";			
 echo " <tr ><th align='center' colspan='3'><details><summary>MORE DETAILS</summary>";
 echo "<table width='100%' align='center' cellspacing='0'>";
  echo "<tr><td width='50%'>FATHER&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$r[12]</td><td  width='50%'>CONTACT :&nbsp;$r[13]</td></tr>";
  echo "<tr><td>MOTHER&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;$r[14]</td><td>CONTACT :&nbsp;$r[15]</td></tr>";
  echo "<tr><td>GUARDIAN&nbsp;:&nbsp;$r[10]</td><td>CONTACT :&nbsp;$r[11]</td></tr>";
  echo "</table></details></th>";
  echo "<tr><td colspan='3'><hr></td></tr>";
 }
 
echo "</table>";
}
else
{
	echo "<p id='cmnt'>NO RESULTS FOUND !</p>";
}
?>

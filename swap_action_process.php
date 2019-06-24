<?php
 include("query.php");
 $ob=new query();
 $id=$_GET["id"];
 //sender
 $sen=$_GET["s"];
 //reciever
 $rec=$_GET["r"];
 //action[accept/reject]
 if($ac=$_GET["ac"]==2)
 {
 //getting rooms of students
 $rmsen=$ob->room($sen);
  $rmrec=$ob->room($rec);
 $res=$ob->swaproom($id,$sen,$rec,$rmsen,$rmrec,$ac);
 }
 else
 {
	 $res=$ob->swaproom($id,$sen,$rec,$rmsen,$rmrec,$ac);
	 }
  if($res>0)
  {
	   header("location:swap_action.php");
	}
?>
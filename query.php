
<?php
include ("connection.php");
class query
{

	function readmail($lid)
	{
		$obj=new connection();
	$qry="select * from inbox where `to`='$lid' order by date desc";
	$res=$obj->execute($qry);
	return $res;
	}
    function freerooms($type)
	{
	$obj=new connection();
	$qry="select * from room where ISNULL(sid) and type='$type' order by rid";
	$res=$obj->execute($qry);
	return $res;
	}
	 function getrooms($rid)
	{
	$obj=new connection();
	$qry="select * from room where rid like '$rid%'";
	$res=$obj->execute($qry);
	return $res;
	}
	function roomdetails($sid)
	{
	$obj=new connection();
	$qry="SELECT photo, sname, course, sphone, email FROM student WHERE sid='$sid'";
	$res=$obj->execute($qry);
	return $res;
	}
	 function viewrooms($type)
	{
	$obj=new connection();
	if($type==1)
	$qry="select rid from room where type='$type' order by rid";
	else
	$qry="select distinct SUBSTRING(rid,1,LENGTH(rid)-1) as rm from room where type='$type' order by rm";
	$res=$obj->execute($qry);
	return $res;
	}
    function allrooms($type)
	{
	$obj=new connection();
	$qry="select * from room where type='$type' order by rid";
	$res=$obj->execute($qry);
	return $res;
	}
  function getrid($lid)
	{
	$obj=new connection();
	$qry="select room from student where lid='$lid'";
	$res=$obj->execute($qry);
	$room=mysqli_fetch_array($res);
	return $room[0];
	}
	function sid($sid)
	{
	$obj=new connection();
	$qry="select lid from student where sid='$sid'";
	$res=$obj->execute($qry);
	$r=mysqli_fetch_array($res);
	return $r[0];
	}
	function messfees($m,$y)
	{
	$obj=new connection();
	$qry="select * from messfees where month(fdate)='$m' and year(fdate)='$y'";
	$res=$obj->execute($qry);
	return $res;
	}
	function hostelrent($y)
	{
	$obj=new connection();
	$qry="select * from hostelrent where year(rdate)='$y'";
	$res=$obj->execute($qry);
	return $res;
	}
	function addrent($date,$amount)
	{
	$obj=new connection();
	 $qry="insert into hostelrent (rdate,amount) values ('$date','$amount')";
	$res=$obj->execute($qry);
	$rid=mysqli_insert_id($obj->con);
	  $qry="select sid from student";
	$res=$obj->execute($qry);
	while($r=mysqli_fetch_array($res))	
	{
	 $qry="insert into rentpay(sid,rid,paid) values ('$r[0]','$rid','0')";
	$res1=$obj->execute($qry);	
	}
	return $res;
	}
	function addmessfees($date,$amount)
	{
	$obj=new connection();
	 $qry="insert into messfees (fdate,amount) values ('$date','$amount')";
	$res=$obj->execute($qry);
	$fid=mysqli_insert_id($obj->con);
	  $qry="select sid from student";
	$res=$obj->execute($qry);
	while($r=mysqli_fetch_array($res))	
	{
	 $qry="insert into messpay(sid,fid,paid) values ('$r[0]','$fid','0')";
	$res1=$obj->execute($qry);	
	}
	return $res;
	}
	function swaprequest($lid,$date,$rid)
	{
	$obj=new connection();
	$qry="select sid from student where lid='$lid'";
	$res=$obj->execute($qry);
	$r=mysqli_fetch_array($res);
	$sid=$r[0];
	$qry="select sid from room where rid='$rid'";
	$res=$obj->execute($qry);
	$r=mysqli_fetch_array($res);
	if($r[0]==NULL)
		$status=1;
		else
		$status=0;
	 $qry="insert into swaproom (sid,sdate,rid,status) values ('$sid','$date','$rid','$status')";
	$res=$obj->execute($qry);
	return $res;
	}
	function getname($lid)
	{
	$obj=new connection();
	$qry="select sname from student where lid='$lid'";
	$res=$obj->execute($qry);
	$n=mysqli_fetch_array($res);
	return $n[0];
	}
	function getdistrict()
	{
	$obj=new connection();
	$qry="select * from district order by dstname";
	$res=$obj->execute($qry);
	return $res;
	}
	function getcourse()
	{
	$obj=new connection();
	$qry="select cname from course";
	$res=$obj->execute($qry);
	return $res;
	}
	function getblood()
	{
	$obj=new connection();
	$qry="select * from blood";
	$res=$obj->execute($qry);
	return $res;
	}
	function sendmail($date,$from,$to,$msg,$sub)
	{
	$obj=new connection();
	$qry="INSERT INTO `inbox` (`date`, `from`, `to`, `msg`, `sub`) VALUES ('$date','$from','$to','$msg','$sub')";
	$res=$obj->execute($qry);
	return $res;
		
	}
	function showrequests($lid)
	{
	$obj=new connection();
	$qry="select lid,sname,room from student,swaproom where student.sid in(select sid from swaproom where rid in (select room from student where lid='$lid')) and swaproom.status=0 order by sdate";
	$res=$obj->execute($qry);
	return $res;
	}
	function swapstatus($lid,$status)
	{
	$obj=new connection();
	$qry="update swaproom set status='$status' where rid in (select room from student where lid='$lid')";
	$res=$obj->execute($qry);
	return $res;
	}
	function studregister($sname,$nname,$age,$dob,$course,$blood,$adrno,$sphone,$email,$gname,$gphone,$fname,$fphone,$mname,$mphone,$house,$place,$po,$dist,$pin,$photo,$doj,$room,$status,$uname,$pswd,$role)
	{
	$obj=new connection();
	$qry="insert into login(uname,pswd,role)values('$uname','$pswd','$role')";
	$res=$obj->execute($qry);
	$r=mysqli_insert_id($obj->con);
	$qry="insert into student (sname,nname,age,dob,course,blood,adrno,sphone,email,gname,gphone,fname,fphone,mname,mphone,house,place,po,dist,pin,photo,doj,room,status,lid)values('$sname','$nname','$age','$dob','$course','$blood','$adrno','$sphone','$email','$gname','$gphone','$fname','$fphone','$mname','$mphone','$house','$place','$po','$dist','$pin','$photo','$doj','$room','$status','$r')";
	$res=$obj->execute($qry);
	$sid=mysqli_insert_id($obj->con);
	$qry="update room set sid='$sid' where rid='$room'";
	$res=$obj->execute($qry);
	return $res;
	}
	
	function login($uname,$pswd,$role)
	{
		$obj=new connection();
		$qry="select * from login where uname='$uname' and pswd='$pswd' and role='$role'";
		$res=$obj->execute($qry);
		return $res;
	}
	
	
	function searchstudent($str,$filter)
	{
		$obj=new connection();
		if($filter==0)
		{
		$qry="select * from student where sname like '$str%' or dist like '$str%' or room like '$str%'";
		}
		else if($filter==1)
		{
		$qry="select * from student where sname like '$str%' order by sname";
		}
		else if($filter==2)
		{
		$qry="select * from student where course like '$str%'";
		}
		else if($filter==3)
		{
		$qry="select * from student where room like '$str%' order by room";
		}
		else if($filter==4)
		{
		$qry="select * from student where dist like '$str%' order by place";
		}
		$res=$obj->execute($qry);
		return $res;
	}
	
	function newregisters()
	{
		$obj=new connection();
		$qry="select lid,sname,course,room from student where status='0' order by doj desc";
		$res=$obj->execute($qry);
		return $res;		
	}
	function getmessdate()
	{
		$obj=new connection();
		$qry="select * from messfees order by fid desc";
		$res=$obj->execute($qry);
		return $res;		
	}
		function getrentdate()
	{
		$obj=new connection();
		$qry="select * from hostelrent order by rid desc";
		$res=$obj->execute($qry);
		return $res;		
	}
	function getcmnt($sid)
	{
			$obj=new connection();
 $qry="select * from comment where sid='$sid' order by flag desc";
		$res=$obj->execute($qry);
		return $res;
	}
	function addcmnt($sid,$cmnt,$flag)
	{
					$obj=new connection();
 $qry="insert into comment (sid,cmnt,flag) values ('$sid','$cmnt','$flag')";
		$res=$obj->execute($qry);
		return $res;
	}
	function dltcmnt($cid)
	{
	$obj=new connection();
 $qry="delete from comment where cid='$cid'";
		$res=$obj->execute($qry);
		return $res;
	}
function messdet($sid)
{
	$obj=new connection();
 $qry="select fdate,amount,pdate from messfees join messpay where messfees.fid=messpay.fid and messpay.sid='$sid' order by pdate desc";
		$res=$obj->execute($qry);
		return $res;
}
function rentdet($sid)
{
	$obj=new connection();
 $qry="select rdate,amount,pdate from hostelrent join rentpay where hostelrent.rid=rentpay.rid and rentpay.sid='22' order by pdate desc";
		$res=$obj->execute($qry);
		return $res;
}
	function messfeesearch($d,$c,$s)
	{
		$obj=new connection();
		if($c=='0')
		 $qry="select sname,pdate,student.sid from student join messpay on student.sid =messpay.sid where student.sid in(select sid from messpay where fid='$d' and paid='$s')";
		 else
		 $qry="select sname,pdate,student.sid from student join messpay on student.sid =messpay.sid where course='$c' and student.sid in(select sid from messpay where fid='$d' and paid='$s')";
		$res=$obj->execute($qry);
		return $res;
		
	}
	function rentsearch($d,$c,$s)
	{
		$obj=new connection();
		if($c=='0')
		 $qry="select sname,pdate,student.sid from student join rentpay on student.sid =rentpay.sid where student.sid in(select sid from rentpay where rid='$d' and paid='$s')";
		 else
		 $qry="select sname,pdate,student.sid from student join rentpay on student.sid =rentpay.sid where course='$c' and student.sid in(select sid from rentpay where rid='$d' and paid='$s')";
		$res=$obj->execute($qry);
		return $res;
		
	}
	function messpay($date,$fid,$lid)
	{
		$obj=new connection();
		 $qry="update messpay set paid='1',pdate='$date' where fid='$fid' and sid in (select sid from student where lid='$lid')";
		$res=$obj->execute($qry);
		return $res;
	}
	function swaphistory($lid)
	{
			$obj=new connection();
		 $qry="select * from swaproom where sid in(select sid from student where lid='$lid') order by sdate desc";
		$res=$obj->execute($qry);
		return $res;
	}
	function rentpay($date,$rid,$lid)
	{
		$obj=new connection();
		  $qry="update rentpay set paid='1',pdate='$date' where rid='$rid' and sid in (select sid from student where lid='$lid')";
		$res=$obj->execute($qry);
		return $res;
	}
	function messhistory($lid)
	{
		$obj=new connection();
		$qry="select messfees.fid,fdate,amount,paid from messfees,messpay where messfees.fid=messpay.fid and sid in(select sid from student where lid='$lid') order by paid,fdate";
		$res=$obj->execute($qry);
		return $res;
	}
		function renthistory($lid)
	{
		$obj=new connection();
		$qry="select hostelrent.rid,rdate,amount,paid from hostelrent,rentpay where hostelrent.rid=rentpay.rid and sid in(select sid from student where lid='$lid') order by paid,rdate";
		$res=$obj->execute($qry);
		return $res;
	}
	function getpaydate($lid,$fid)
	{
		$obj=new connection();
		$qry="SELECT * FROM messpay WHERE paid='1' and fid='$fid' and sid in(select sid from student where lid='$lid')";
		$res=$obj->execute($qry);
		return $res;
	}
		function getrentpay($lid,$rid)
	{
		$obj=new connection();
		$qry="SELECT * FROM rentpay WHERE paid='1' and rid='$rid' and sid in(select sid from student where lid='$lid')";
		$res=$obj->execute($qry);
		return $res;
	}
	function getswap()
	{
		$obj=new connection();
		$qry="select id,swaproom.sid,student.sid from swaproom join student on rid=room where swaproom.status=1";
		$res=$obj->execute($qry);
		return $res;		
	}
	function swaproom($id,$sen,$rec,$rmsen,$rmrec,$ac)
	{
		$obj=new connection();
		if($ac==2)
		{
		 $qry="update student set room='$rmrec' where sid='$sen'";
		$res=$obj->execute($qry);
		 $qry="update student set room='$rmsen' where sid='$rec'";
		$res=$obj->execute($qry);
		 $qry="update room set sid='0' where rid='$rmrec'";
		$res=$obj->execute($qry);
		  $qry="update room set sid='$rec' where rid='$rmsen'";
		$res=$obj->execute($qry);
		 $qry="update room set sid='$sen' where rid='$rmrec'";
		$res=$obj->execute($qry);
	 $qry="update swaproom set status='2' where id='$id'";
		$res=$obj->execute($qry);
		}
		else
		{
		$qry="update swaproom set status='3' where id='$id'";
		$res=$obj->execute($qry);	
		}
		return $res;	
		
	}
	function dispdet($sid)
	{
		$obj=new connection();
		$qry="select sname,room from student where sid='$sid' ";
		$res=$obj->execute($qry);
		$r=mysqli_fetch_array($res);
		$det=$r[0]."  [ ".$r[1]." ]";
		return $det;		
	}
	
	function dispstudent($lid)
	{
		$obj=new connection();
		  $qry="select * from student where lid='$lid'";
		$res=$obj->execute($qry);
		return $res;
	}
	function room($sid)
	{
		$obj=new connection();
		  $qry="select room from student where sid='$sid'";
		$res=$obj->execute($qry);
		$r=mysqli_fetch_array($res);
		return $r[0];
	}
	function studstatus($lid,$status)
	{
		$obj=new connection();
		if($status==1)
		{
		$qry="update student set status='$status' where lid='$lid'";
		$res=$obj->execute($qry);
		return $res;
		}
		else if($status==2)
		{
		 $qry="update room set sid=NULL where sid in (select sid from student where lid='$lid')";
		$res=$obj->execute($qry);
		 $qry="delete from student where lid='$lid'";
		$res=$obj->execute($qry);	
		 $qry="delete from login where lid='$lid'";
		$res=$obj->execute($qry);	
		return $res;
		}			
	}
	
	function studupdate($sname,$nname,$age,$dob,$course,$blood,$adrno,$sphone,$email,$gname,$gphone,$fname,$fphone,$mname,$mphone,$house,$place,$po,$dist,$pin,$photo,$doj,$lid)
	{
		$obj=new connection();
		$qry="update student set sname='$sname',nname='$nname',age='$age',dob='$dob',course='$course',blood='$blood',adrno='$adrno',sphone='$sphone',email='$email',gname='$gname',gphone='$gphone',fname='$fname',fphone='$fphone',mname='$mname',mphone='$mphone',house='$house',place='$place',po='$po',dist='$dist',pin='$pin',photo='$photo',doj='$doj' where lid='$lid'";
		$res=$obj->execute($qry);
		return $res;
	}
}
?>
<?php
class connection
{
var $con,$res;
	function getcon()
	{
    $this->con=mysqli_connect("localhost","root","","hostel");
	}
	function execute($q)
	{
		$this->getcon();
		$this->res=mysqli_query($this->con,$q);
		return $this->res;
		}
}
?>
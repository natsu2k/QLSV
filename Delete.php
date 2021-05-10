<?php
if(isset($_GET['user']))
{
	$masp = $_GET['user'];
	$con = mysqli_connect('localhost','root','','test');
	$sql = " Delete from users where username = '$user'";
	if(mysqli_query($con,$sql))
		header('location:http://localhost/Truong_19cntt1a/ruot.php');
	    else echo"lệnh sai!";

}
?>
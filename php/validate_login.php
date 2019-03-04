<?php

$connect = mysqli_connect("localhost", "root", "usbw", "urlshort");

if (isset($_POST["email"]) && isset($_POST["password"]))
{
	$correo = $_POST["email"];
	$pass = $_POST["password"];
	//$pass_hash = hash("md5", "$pass");

	$sql = "SELECT email,password from user WHERE email='$correo' AND password='$pass'";
	$result = mysqli_query($connect, $sql);
	$num_row = mysqli_num_rows($result);
	if ($num_row == "1")
	{
		session_start();
		$data = mysqli_fetch_array($result);
		
		$_SESSION["email"] = $data[0];
		echo "001";
	}
	else
	{
		echo "002";
	}
	
}
else
{
	echo "002";
}

?>
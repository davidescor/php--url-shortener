<?php
	$connect = mysqli_connect("localhost", "root", "usbw", "urlshort");

	$correo = $_POST["email"];
	$nombre = $_POST["nombre"];
	$pass = $_POST["password"];



	$sql = "SELECT email FROM user WHERE email='$correo'";

	$result = mysqli_query($connect,$sql);

	$num_row = mysqli_num_rows($result);

	if ($num_row == "0")
	{

			//$pass_hash = hash("md5","$pass");				

			$sql3 = "insert INTO user (email,user,password)VALUES('$correo', '$nombre', '$pass')";

			if (mysqli_query($connect,$sql3))
			{	
				session_start();
				echo "2";
				$_SESSION["email"] = $correo;
			}
	}
	else
	{
		echo "1";
	}

?>
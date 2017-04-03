<?php 
require 'connect.php';

$usr=$_POST["username"];
$email=$_POST["email"];
$password=$_POST["password"];
$password2=$_POST["password2"];
echo 'user : '.$usr.'<br> email : '.$email.'<br>password : '.$password."<br>password 2 : ".$password2;
if($password==$password2)
{
	$sql="insert into pengunjung (username,email,password) values ('$usr','$email','$password')";
	$result=mysqli_query($conn,$sql);

	if($result)
	{
		header("Location: ../");

	}
	else
	{
		echo "error";
	}

}
else
{
	echo "password tidak sama";
}


?>
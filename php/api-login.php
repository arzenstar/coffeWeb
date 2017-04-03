<?php
require "connect.php";

$usr=$_POST['username'];
$password=$_POST['password'];

$sql="select * from pengunjung where username='$usr' and password='$password'";
$result=mysqli_query($conn,$sql);



if(mysqli_num_rows($result)>0)
{
	$array = array();
	while($row = mysqli_fetch_assoc($result))
	{
		array_push($array,$row);
	}
	echo '{"data":'.json_encode($array).'}';
	
}


?>
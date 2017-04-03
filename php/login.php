<?php
require "connect.php";

$usr=$_POST['username'];
$password=$_POST['password'];
$login=0;
$user=0;
echo $usr.' and '.$password;



$sql="select * from pengunjung where username='$usr' and password='$password'";
$result=mysqli_query($conn,$sql);



if(mysqli_num_rows($result)>0)
{
	echo "user";
	while($row = mysqli_fetch_assoc($result))
	{
		session_start();
 	$_SESSION['user']=$row["id"];
	}
	header("Location:../customers/pesan.php");
	
}
else
{
	$sql2="select * from admin where username='$usr' and password='$usr'";
	$result2=mysqli_query($conn,$sql2);
	if (mysqli_num_rows($result2)>0) {
	echo "admin";
	header("Location:../admin/pesanan.php");
	}
	else
	{
		echo "error";
	}

}





/*if($usr=='putra'&&$password=='putratama')
{
	echo "login berhasil";
}
else
{
	echo "login gagal";	
}*/
?>
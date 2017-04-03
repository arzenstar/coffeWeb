<?php
session_start();
require "connect.php";
$id=$_GET['id'];
$user=$_SESSION['user'];
$sql="insert into pesanan (id_pengunjung,id_item,status) values ($user,$id,'antrian')";
$result=mysqli_query($conn, $sql);
if($result)
{
	echo "berhasil";
	header("Location:../customers/pesan.php");

}
else
{
	echo "gagal".mysqli_error($conn);
}
?>
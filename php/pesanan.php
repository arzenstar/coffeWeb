<?php 
require "connect.php";
$id=$_GET['id'];
$proses=$_GET['proses'];
$hapus=$_GET['hapus'];
date_default_timezone_set('Asia/Jakarta');

echo "p : ".$proses." h :".$hapus;
echo $date;

if($proses>0)
{
	$sql="update pesanan set status = 'proses' where id=$id";
	$result=mysqli_query($conn,$sql);


	$sqlSelect="select * from pesanan where id=$id";
	$resultSelect=mysqli_query($conn,$sqlSelect);
	
	if(mysqli_num_rows($resultSelect)>0)
	{

		while ($row=mysqli_fetch_assoc($resultSelect)) {

		$sql2="insert into rekap_peasanan (id_user) values (".$row['id_pengunjung'].")";
		$result2=mysqli_query($conn,$sql2);
		echo "success";
		
		}
	}
	else
	{
		echo "error";
	}

	if($result)
	{
		header("Location: ../admin/pesanan.php");
	}
}
if ($hapus>0) {
	$sql="update pesanan set status = 'dibatalkan' where id=$id";
	$result=mysqli_query($conn,$sql);

	$sqlSelect="select * from pesanan where id=$id";
	$resultSelect=mysqli_query($conn,$sqlSelect);
	while ($row=mysqli_fetch_assoc($resultSelect)) {
		$sql2="insert into rekap_peasanan (id_user) values (".$row['id_pengunjung'].")";
		$result2=mysqli_query($conn,$sql2);
		
	}
	if($result)
	{
		header("Location: ../admin/pesanan.php");
	}	
}	
else {
	echo "error";
}
?>
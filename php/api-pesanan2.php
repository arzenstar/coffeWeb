<?php
require "connect.php";

$id=$_GET['id'];

$sql="select pesanan.id, pesanan.id_pengunjung, item.nama, item.harga, item.file, pesanan.status FROM pesanan INNER JOIN item ON pesanan.id_item=item.id where pesanan.id_pengunjung=$id";
$result=mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0)
		{
			$array=array();
			while($row = mysqli_fetch_assoc($result)) {
				array_push($array,$row);
				}

				echo '{"rekap":'.json_encode($array).'}';
		}
?>
<?php
require "connect.php";

$id=$_POST['id'];

$sql="Select * from rekap_peasanan where id_user=$id";
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
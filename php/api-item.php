<?php
require "connect.php";

$sql="select * from item";
$result=mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0)
		{
			$array=array();
			while($row = mysqli_fetch_assoc($result)) {
				array_push($array,$row);
				}

				echo '{"item":'.json_encode($array).'}';
		}
?>
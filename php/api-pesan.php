<?php
require "connect.php";
$id=$_POST['id_item'];
$user=$_POST['id_user'];
$sql="insert into pesanan (id_pengunjung,id_item,status) values ($user,$id,'antrian')";
$result=mysqli_query($conn, $sql);

?>
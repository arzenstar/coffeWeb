<?php
session_start();
require ("../php/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pesanan</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Title</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>


<div class="row">
	<div class="col-sm-2 col-md-2">
		<div class="list-group">
			<a class="list-group-item active" >Option</a>
			<a class="list-group-item" href="pesanan.php">Pemsanan</a>
			<a class="list-group-item" href="produk.php">Produk</a>
			<a class="list-group-item" href="tambah.html">Tambah Produk</a>
		</div>
	</div>
	<div class="col-sm-10 col-md-10 ">
		

	<?php 
		

		$sql1="select * from pesanan";
		$result=mysqli_query($conn,$sql1);

		while ($row= mysqli_fetch_assoc($result)) {
			$item=$row['id_item'];
			$sql2="select * from item where id=$item";
			$result2=mysqli_query($conn,$sql2);
			

			echo '<div class="col-sm-3 col-md-3">';
			while ($row2= mysqli_fetch_assoc($result2))
			{
				echo '
				
				    <div class="thumbnail">
				      <img src="../'.$row2['file'].'" alt="...">
				      <div class="caption">
				        <h3>'.$row2['nama'].'</h3>
				        <p>'.$row2['deskripsi'].'</p>
				        <h2>'.$row2['harga'].'</h2>
				        <h2>'.$row['status'].'</h2>
				        <p><a class="btn btn-primary" role="button" data-toggle="modal" href="../php/pesanan.php?proses=1&&hapus=0&&id='.$row['id'].'">Proses</a> <a href="../php/pesanan.php?proses=0&&hapus=1&&id='.$row['id'].'" class="btn btn-default" role="button">Batal</a></p>
				      </div>
				    </div>
		 		 
				';
			}
			echo "</div>";
		}
		?>

		
		
	</div>
</div>

<script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
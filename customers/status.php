<?php
session_start();
require ("../php/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pesan</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<a class="navbar-brand" href="#">Title</a>
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Link</a>
			</li>
		</ul>
	</div>
</nav>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<ul class="list-group">
				<li class="list-group-item"><a href="pesan.php">Pesan</a></li>
				<li class="list-group-item"><a href="status.php">Status</a></li>
			</ul>
		</div>
	<div class="col-sm-8 col-md-8">
		<?php 
		$id=$_SESSION['user'];
		

		$sql1="select * from pesanan where id_pengunjung=$id";
		$result=mysqli_query($conn,$sql1);

		while ($row= mysqli_fetch_assoc($result)) {
			$item=$row['id_item'];
			$sql2="select * from item where id=$item";
			$result2=mysqli_query($conn,$sql2);
			$status=$row['status'];

			while ($row2= mysqli_fetch_assoc($result2))
			{
				echo '
				
					<div class="col-sm-3 col-md-3 ">
						<div class="thumbnail">
							<img src="../'.$row2['file'].'" alt="">
							<div class="caption">
								<h3>'.$row2['nama'].'</h3>
								
								<p>
									<a href="#" class="btn btn-primary">'.$row['status'].'</a>
									
							</div>
						</div>
					</div>';
			}
		}
		?>
		
			
		</div>
	</div>	
</div>
<script type="text/javascript" src="../js/jquery-2.1.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
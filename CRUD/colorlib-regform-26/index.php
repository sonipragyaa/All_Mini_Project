<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CRUD OPERATION</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<?php
		include "config.php";
		if(isset($_POST['submit']))
		{

			$username= $_POST['username'];
			$email= $_POST['email'];
			$phone= $_POST['phone'];
			$address= $_POST['address'];
			$img= $_POST['img'];

				
		$sql="insert into admin(username,email,phone,address,img) values('$username','$email','$phone','$address','$img')";
		if (mysqli_query($conn, $sql)) {
			echo "inserted successfully";
			} else {
			 echo "Error: " . $sql . "
		 " . mysqli_error($conn);
			}
			
		
			

		}
		?>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				<form action="" method="POST" >
					<h3>ADMIN</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username" name="username">
					</div>
					
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Email" name="email">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" placeholder="Phone Number" name="phone">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="address" class="form-control" placeholder="Address" name="address">
					</div>
					<div class="form-holder">
						<!-- <span class="lnr lnr-file"></span> -->
						<input type="file" class="form-control"  name="img">
					</div>
				
					<button type="submit" value="submit">Submit</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
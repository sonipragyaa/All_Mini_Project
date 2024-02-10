<?php
include "config.php";

session_start();

if(!isset($_SESSION["username"])){
    ("Location: index.php");
}
?>


<!doctype html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="../css/user_login.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">

						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Admin Login</h3>
								</div>

							</div>
							<form  action="<?php $_SERVER['PHP_SELF']?>" method ="POST" class="signin-form">
								<div class="form-group mt-3">
									<input type="text" class="form-control" required>
									<label class="form-control-placeholder" name="username" for="username">Username</label>
								</div>
                               
								<div class="form-group">
									<input id="password-field" type="password" class="form-control" required>
									<label class="form-control-placeholder" name="password" for="password">Password</label>
									<span toggle="#password-field"
										class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								
								
									 <input type="submit" name="login" value="login" class="form-control btn btn-primary rounded submit px-3"> 
								
								<!-- <div class="form-group">
									<button type="submit" name="login" class="form-control btn btn-primary rounded submit px-3">Sign
										In</button>
								</div> -->
							</form>
                            <!--form end-->
							<?php

if(isset($_POST['login'])){
	include "config.php";
	if(empty($_POST['username'])|| empty($_POST['password'])){

		echo '<div class = "alert alert-danger">fills must be emtered</div>';
		die();
	 }else{
	 $username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = md5($_POST['password']);
	
		$sql = "select user_id, username, role from user where username = '{$username}' AND password = '{$password}'";
   
		$result = mysqli_query($conn,$sql) or die("query failed");

		if(mysqli_num_rows($result) > 0){

		while($row = mysqli_fetch_assoc($result)){
			session_start();
			$_SESSION["username"] = $row['username'];
			$_SESSION["user_id"] = $row['user_id'];
			$_SESSION["role"] = $row['role'];

			header("Location: dashboard.php");
		}
		}else{
		echo '<div class = "alert alert-danger">Username and password are not matched</div>';

	}
}
}

?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<h2>Register</h2>
			<p>Please fill this form to create an account</p>
			<form action="" method="post">
				<div class="form-group">
					<label>Full Name</label>
					<input type="text" name="name" class="form-control" required>
				</div>
				<div class="form-group">
					<label>email</label>
					<input type-"email" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="confirm_password" class="form-control"
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
				</div>
				<p>Already have an account? <a href="login.php">Login Here</a>.</p>
			</form>
		</div>
	</div>
</body>
</html>

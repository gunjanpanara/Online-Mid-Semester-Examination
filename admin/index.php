<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="humans.txt">
	<?php include 'include/head.php';?>
	<title>WelCome to online exam portal</title>

</head>

<body>
<?php include 'include/header.php'; ?>

<div class="container home-container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<p class="lead">Hello Students, <span class="text-danger">Are you ready for the examination ?</span> Let's start here!</p>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<img src="images/banner.jpg" class="img-responsive banner-img">
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h3>Examinaiton Procedure</h3>
			<p>
			<a href="login.php">Log In</a>/<a href="register.php">Registeration (for new user)</a><br>
			Select Examination Criteria<br>
			Read 'Examination Rules & Guidelines'<br>
			Start Examination
			</p>
		</div>
		<div class="col-md-6">
			<h3>About Us</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3 class="text-center">Contact Us</h3>
			<form role="form" action="#">
				<div class="form-group">
					<label for="InputName">Name</label>
					<input type="text" name="name" class="form-control" id="InputName" placeholder="Enter name">
				</div>
				<div class="form-group">
					<label for="InputEmail">Email*</label>
					<input type="email" name="mail" class="form-control" id="InputEmail" placeholder="Enter email" required>
				</div>
				<div class="form-group">
					<label for="InputMessage">Message*</label>
					<textarea rows="4" cols="25" name="message" class="form-control" id="InputMessage" placeholder="Your message for us.." required></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>

<?php include 'include/footer.php'; ?>
</body>

</html>

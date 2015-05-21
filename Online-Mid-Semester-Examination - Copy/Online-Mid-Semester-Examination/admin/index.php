<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="humans.txt">
	<?php include 'include/head.php';?>

</head>

<body>
	<?php include 'include/header.php'; ?>

	<div class="container home-container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<p class="lead">Hello Examiner, <span class="text-danger">Have A Nice Day !</span></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<img src="images/banner.jpg" class="img-responsive banner-img" alt="Government Polytechnic, College Campus Image">
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

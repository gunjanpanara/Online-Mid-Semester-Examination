<?php

/*
*********************************************
*** Title: Student Registration           ***
*********************************************
*/

/* Procedure
*********************************************
Step 1: Submit - Add the new Student to the System.

Step 2: Display the HTML page to receive the required information.
*********************************************
*/

error_reporting(0);
session_start();
include_once 'oesdb.php';

if(isset($_REQUEST['submit']))
{

//Add the new user information in the database

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$enroll=$_POST['enroll'];
	$pswd=$_POST['pswd'];
	$branch=$_POST['branch'];
	$sem=$_POST['sem'];
	$dob=$_POST['dob'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$pin=$_POST['pin'];
	$cdate = date('Y-m-d h:i:s');
	$mdate = date('Y-m-d h:i:s');

	$result=executeQuery("select * from reg_gpa where fname='$fname' and lname='$lname'");
// $_GLOBALS['message']=$newstd;
	if(empty($_REQUEST['fname'])||empty ($_REQUEST['lname'])||empty ($_REQUEST['gender'])||empty($_REQUEST['enroll'])||empty($_REQUEST['pswd'])||empty($_REQUEST['pswd_again'])||empty($_REQUEST['branch'])||empty($_REQUEST['dob'])||empty($_REQUEST['sem'])||empty($_REQUEST['email'])||empty($_REQUEST['phone']))
	{
		$_GLOBALS['message']="Fields marked with an asterisk sign are required";
	}else if(mysql_num_rows($result)>0)
	{
		$_GLOBALS['message']="Sorry the Enrollment Number you entered is not available. Try with some other name.";
	}
	else
	{

		$q = "insert into reg_gpa(fname,lname,gender,enroll,branch,sem,dob,email,phone,address,city,pin,cdate)
		values ('$fname','$lname','$gender',$enroll,'$branch',$sem,'$dob','$email',$phone,'$address','$city',$pin,'$cdate')";

		$res=executeQuery($q);
		$r_id = mysql_insert_id();
		//$q1 = "insert into login_gpa(r_id, user, pswd) values ('$r_id', '$enroll',ENCODE('".htmlspecialchars($_REQUEST['pswd'],ENT_QUOTES)."','oespass') )";
		$q1 = "insert into login_gpa(r_id, user, pswd) values ('$r_id', '$enroll','$pswd' )";


		$res1=executeQuery($q1);
		if(!@$res||!@$res1)
			$_GLOBALS['message']=mysql_error();
		else
		{
			$success=true;
			$_GLOBALS['message']="Your Account is Created Successfully. Click <a href=\"login.php\">here</a> to Login";
		// header('Location: index.php');

		}
	}
	closedb();
}

?>

<!DOCTYPE html>
<html>

<?php include ('include/head.php'); ?>

<body>

	<?php include ('include/header.php'); ?>

	<div class="container reg-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="text-center">Student Registration</h3>
				<?php
				if($_GLOBALS['message']) {
					echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
				}
				?>

				<form id="reg_form" class="form-horizontal" role="form" action="register.php" method="POST">

					<div class="form-group">
						<label for="firstname" class="control-label col-md-3">Name* </label>
						<div class="col-md-3">
							<input type="text" name="fname" class="form-control" id="firstname" placeholder="First Name" required autofocus/>
						</div>
						<div class="col-md-3">
							<input type="text" name="lname" class="form-control" id="lastname" placeholder="Last Name" required/>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Gender* </label>
						<div class="radio-inline">
							<label>
								<input type="radio" name="gender" value="male" checked>
								Male 
							</label>
						</div>
						<div class="radio-inline">
							<label>
								<input type="radio" name="gender" value="female">
								Female
							</label>
						</div>
					</div>

					<div class="form-group">
						<label for="enrollmentNumber" class="control-label col-md-3">Enrollment No. *</label>
						<div class="col-md-5">
							<input type="number" name="enroll" class="form-control" id="enrollmentNumber" placeholder="Enrollment No." required/>
						</div>

					</div>

					<div class="form-group">
						<label for="passwordText" class="control-label col-md-3">Password* </label>
						<div class="col-md-5">
							<input type="password" name="pswd" class="form-control" id="passwordText" placeholder="Password [6-14]" required/>
						</div>
					</div>

					<div class="form-group">
						<label for="passwordConfirm" class="control-label col-md-3">Confirm Password* </label>
						<div class="col-md-5">
							<input type="password" name="pswd_again" class="form-control" id="passwordConfirm" placeholder="Confirm Password" required/>
						</div>
					</div>

					<div class="form-group">
						<label for="selectBranch" class="control-label col-md-3">Branch* </label>
						<div class="col-md-5">
							<select name="branch" class="form-control" id="selectBranch" required>
								<option value="">- - Select Branch - -</option>
								<option value="automobile">AUTO MOBILE ENGINEERING</option>
								<option value="biomedical">BIO MEDICAL ENGINEERING</option>
								<option value="biomedical">CIVIL ENGINEERING</option>
								<option value="computer">COMPUTER ENGINEERING</option>
								<option value="electrical">ELECTRICAL ENGINEERING</option>
								<option value="ec">ELECTRONICS &amp; COMMUNICATION ENGINEERING</option>
								<option value="it">INFORMATION TECHNOLOGY</option>
								<option value="ic">INSTRUMENTION &amp; CONTROL ENGINEERING</option>
								<option value="mechanical">MECHANICAL ENGINEERING</option>
								<option value="plastic">PLASTIC ENGINEERING</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="birthdate" class="control-label col-md-3">Birth-date* </label>
						<div class="col-md-5">
							<input type="date" name="dob" class="form-control" id="birthdate" required/>
						</div>
					</div>

					<div class="form-group">
						<label for="selectSemester" class="control-label col-md-3">Semester* </label>
						<div class="col-md-5">
						<select name="sem" class="form-control" id="selectSemester" required>
							<option value="">---</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
						</select>
						</div>
					</div>

					<div class="form-group">
						<label for="emailInput" class="control-label col-md-3">E-Mail ID* </label>
						<div class="col-md-5">
							<input type="email" name="email" class="form-control" id="emailInput" placeholder="Valid E-Mail Address" required/>
						</div>
					</div>

					<div class="form-group">
						<label for="contactNumber" class="control-label col-md-3">Phone* </label>
						<div class="col-md-5">
							<input type="number" name="phone" class="form-control" id="contactNumber" placeholder="Contact Number" required/>
						</div>
					</div>  

					<div class="form-group">
						<label for="addressInput" class="control-label col-md-3">Address </label>
						<div class="col-md-5">
							<textarea rows="4" cols="25" name="address" class="form-control"  id="addressInput" placeholder="Permanent Address"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="cityInput" class="control-label col-md-3">City </label>
						<div class="col-md-5">
							<input type="text" name="city" class="form-control" id="cityInput" placeholder="City">
						</div>
					</div>

					<div class="form-group">
						<label for="pinNumber" class="control-label col-md-3">PIN </label>
						<div class="col-md-5">
							<input type="number" name="pin" class="form-control" id="pinNumber" placeholder="6-digit PIN Number">
						</div>
					</div>	
					<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
							<p>* Fields marked with an asterisk sign are required</p>
							<button type="submit" class="btn btn-primary" name="submit" >Submit</button>
							<button type="reset" class="btn btn-primary" name="reset" >Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php include ('include/footer.php'); ?>
</body>


</html>
<?php

/**** Title: Student Registration ****/

/**** Procedure: Add the new Student to the System. ****/
error_reporting(0);

session_start();
include_once 'oesdb.php';
include 'include/general.php';

if(isset($_REQUEST['submit']))
{

//Add the new user information in the database

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$enroll=$_POST['enroll'];
	$pswd=$_POST['pswd'];
	$pswd_again=$_POST['pswd_again'];
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
	$result=executeQuery("select * from reg_gpa where enroll=$enroll");
// $_GLOBALS['message']=$newstd;
	if(empty($_REQUEST['fname'])||empty ($_REQUEST['lname'])||empty ($_REQUEST['gender'])||empty($_REQUEST['enroll'])||empty($_REQUEST['pswd'])||empty($_REQUEST['pswd_again'])||empty($_REQUEST['branch'])||empty($_REQUEST['dob'])||empty($_REQUEST['sem'])||empty($_REQUEST['email'])||empty($_REQUEST['phone']))
	{
		$_GLOBALS['message']="Fields marked with an asterisk sign are required";
	}else if(mysql_num_rows($result)>0)
	{
		$_GLOBALS['message']="Sorry the Enrollment Number you entered is not available. Try with some other name.";
	}
	else if ($pswd!=$pswd_again) {
		# code...
		$_GLOBALS['message']="Sorry the passwords do not match.";

	}
	else if(email_exists($email))
		$_GLOBALS['message']="Sorry the mail address is already been taken.";

	
    else if (strlen($_POST['pswd']) < 6 && strlen($_POST['pswd']) >14) {
                $_GLOBALS['message'] = 'Your password must be between 6 to 14 character.';
            }
    else if (strlen($_POST['phone']) > 10 ) {
                $_GLOBALS['message'] = 'please enter a valid phone no.';
            }
	else
	{

		$q = "insert into reg_gpa(fname,lname,gender,enroll,branch,sem,dob,email,phone,address,city,pin,cdate)
		values ('$fname','$lname','$gender',$enroll,'$branch',$sem,'$dob','$email',$phone,'$address','$city',$pin,'$cdate')";

		$res=executeQuery($q);
		$r_id = mysql_insert_id();
		//$q1 = "insert into login_gpa(r_id, user, pswd) values ('$r_id', '$enroll',ENCODE('".htmlspecialchars($_REQUEST['pswd'],ENT_QUOTES)."','oespass') )";
		$q1 = "insert into login_gpa(r_id, user, pswd) values ('$r_id', '$enroll','$pswd')";


		$res1=executeQuery($q1);
		
	}
	closedb();
}

?>

<!DOCTYPE html>
<head>
</head>
<?php include ('include/head.php'); ?>
 <script type="text/javascript">
   function val()
	 {
		  //validation
	      var txtname=document.getElementById("firstname").value;
		  var validtxtname=/[^a-zA-Z]+/i;
		  var count=0;
		  		 
		  if(validtxtname.test(txtname))
		  {
			  document.getElementById("nm1").innerHTML="Invalid First Name!";
			  count++;
		  }
		  else
		  {
	      document.getElementById("nm1").innerHTML="";
		  }
		  var txtname=document.getElementById("lastname").value;
		  var validtxtname=/[^a-zA-Z]+/i;
		  var count=0;
		  if(validtxtname.test(txtname))
		  {
			  document.getElementById("nm2").innerHTML="Invalid Last Name!";
			  count++;
		  }
		  else
		  {
	      document.getElementById("nm2").innerHTML="";
		  }
		  var txtname=document.getElementById("cityInput").value;
		  var validtxtname=/[^a-zA-Z]+/i;
		  var count=0;
		  if(validtxtname.test(txtname))
		  {
			  document.getElementById("city").innerHTML="Enter Valid City Name!";
			  count++;
		  }
		  else
		  {0
	      document.getElementById("city").innerHTML="";
		  }
          
          var txtname=document.getElementById("enrollmentNumber").value;
		  var validtxtname=/\D$/i;
		  var count=0;
		   	if((txtname.length!=12 && txtname.length>0) || isNaN(txtname)  )
			{
				document.getElementById("erno").innerHTML="Please Enter Valid Enrollment of 12 Digits !!";
				count++;
			}
			else
			{
	    		document.getElementById("erno").innerHTML="";
			}
		  var txtname=document.getElementById("pinNumber").value;
		  var validtxtname=/\D$/i;
		  var count=0;
		  if((txtname.length!=6 && txtname.length>0) || isNaN(txtname))
		  {
			  document.getElementById("pin").innerHTML="Enter Valid 6 Digit PIN !!";
			  count++;
		  }
		  else
		  {
	      document.getElementById("pin").innerHTML="";
		  }
		  var txtname=document.getElementById("contactNumber").value;
		  var validtxtname=/\D$/i;
		  var count=0;
		  if((txtname.length!=10 && txtname.length>0) || validtxtname.test(txtname))
		  {
			  document.getElementById("en").innerHTML="Enter Valid 10 Digit Phone Number !!";
			  count++;
		  } 
		  else
		  {
	      document.getElementById("en").innerHTML="";
		  }          
		  var pass=document.getElementById("passwordText").value;
		  var validpass=/^[a-zA-Z0-9@_]{4,10}$/;
		  var count=0;
		  if((pass.length<=6 || pass.length>=16) )
		  {
			  document.getElementById("pass1").innerHTML="Your Password Must Be Between 6 to 14 Character!!";
			  count++;
		  }
		  else
		  {
	      document.getElementById("pass1").innerHTML="";
		  }

		  if(count>0)
		  {
			  return false;
		  }
		  
	 }
		  
</script>
<body>

	<?php include ('include/header.php'); ?>

	<div class="container reg-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="text-center">Student Registration</h3>
				<?php
				if($_GLOBALS['message']) {
					echo "<div class=\'message text-center col-md-8 col-md-offset-2 alert alert-danger\'>".$_GLOBALS['message']."</div>";
				}
				if(!@$res||!@$res1)
			$_GLOBALS['message']=mysql_error();
		else
		{
			$success=true;
			?><div class="alert alert-success" role="alert">Registartion Successful.</div><?php
		}
				?>

				<form id="reg_form" class="form-horizontal" role="form" action="register.php" method="POST">

					<div class="form-group">
						<label for="firstname" class="control-label col-md-3">Name* </label>
						<div class="col-md-3">
							<input type="text" name="fname" onkeyup="val()" class="form-control" id="firstname" placeholder="First Name" required autofocus/>
						</div>
											
						<div class="col-md-3">
							<input type="text" name="lname" onkeyup="val()" class="form-control" id="lastname" placeholder="Last Name" required/>
						</div>
					</div>
					<div>
						 <b id="nm1" style="font-size:12px;"></b>
						 <b id="nm2" style="font-size:12px;"></b>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Gender* </label>
						<div class="radio radio-inline">
							<label>
								<input type="radio" name="gender" value="male" required>
								<span class="label-text">Male</span> 
							</label>
						</div>
						<div class="radio radio-inline">
							<label>
								<input type="radio" name="gender" value="female" required>
								<span class="label-text">Female</span>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label for="enrollmentNumber" class="control-label col-md-3">Enrollment No. *</label>
						<div class="col-md-5">
							<input type="text" name="enroll" onkeyup="val()" class="form-control" id="enrollmentNumber" placeholder="Enrollment No." data-toggle="tooltip" data-placement="right" title="valid enroll" required/>
						</div>
					<div>
						 <b id="erno" style="font-size:12px;"></b>
					</div>
					</div>

					<div class="form-group">
						<label for="passwordText" class="control-label col-md-3">Password* </label>
						<div class="col-md-5">
							<input type="password" name="pswd" onkeyup="val()" class="form-control" id="passwordText" placeholder="Password" data-toggle="tooltip" data-placement="right" title="password must be between 6-14 character" required/>
						</div>
					</div>
					<div>
						 <b id="pass1" style="font-size:12px;"></b>
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
								<option value="civil">CIVIL ENGINEERING</option>
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
							<input type="text" name="phone" size="16" class="form-control" id="contactNumber" onkeyup="val()" placeholder="Contact Number" required  />
						</div>
					</div>
					<div>
						 <b id="en" style="font-size:12px;"></b>
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
							<input type="text" name="city" class="form-control" id="cityInput" placeholder="City" onkeyup="val()">
						</div>

					</div>
					<div>
						 <b id="city" style="font-size:12px;"></b>
					</div>

					<div class="form-group">
						<label for="pinNumber" class="control-label col-md-3">PIN </label>
						<div class="col-md-5">
							<input type="text" name="pin" class="form-control" id="pinNumber" onkeyup="val()" placeholder="6-digit PIN Number" />
						</div>
					</div>	
					<div>
						 <b id="pin" style="font-size:12px;"></b>
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
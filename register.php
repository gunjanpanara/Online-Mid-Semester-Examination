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

     $result=executeQuery("select * from reg_gpa where fname='$fname' and lname='$lname';");
    // $_GLOBALS['message']=$newstd;
    if(empty($_REQUEST['fname'])||empty ($_REQUEST['lname'])||empty ($_REQUEST['gender'])||empty($_REQUEST['enroll'])||empty($_REQUEST['pswd'])||empty($_REQUEST['pswd_again'])||empty($_REQUEST['branch'])||empty($_REQUEST['date'])||empty($_REQUEST['sem'])||empty($_REQUEST['email'])||empty($_REQUEST['phone']))
    {
         $_GLOBALS['message']="Fields marked with an asterisk sign are required";
    }else if(mysql_num_rows($result)>0)
    {
        $_GLOBALS['message']="Sorry the Enrollment Number you entered is not available. Try with some other name.";
    }
    else
    {

	$q = "insert into reg_gpa(fname,lname,gender,enroll,branch,dob,email,phone,address,city,pin,cdate)
	values ('$fname','$lname','$gender',$enroll,'$branch','$dob','$email',$phone,'$address','$city',$pin,'$cdate')";
		
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

	<br>
	<h4>User Registration</h4><br>
<?php
      if($_GLOBALS['message']) {
          echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
      }
?>
 
<form id="reg_form" role="form" action="register.php" method="POST">
  <div class="form-group">
    <label for="" style="color:#F38094;">First Name* </label>
    <input type="text" name="fname" class="form-control textbox" id="" placeholder="First Name" required autofocus/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Last Name* </label>
    <input type="text" name="lname" class="form-control textbox" id="" placeholder="Last Name" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Gender* </label>
    <input type="radio" name="gender" value="male" id="" required/>Male
    <input type="radio" name="gender" value="female" id="" required/>Female
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Enrollment No. *</label>
    <input type="number" name="enroll" class="form-control textbox" id="" placeholder="Enrollment No." required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Password* </label>
    <input type="password" name="pswd" class="form-control textbox" id="" placeholder="Password [6-14]" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Confirm Password* </label>
    <input type="password" name="pswd" class="form-control textbox" id="" placeholder="confirm password" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Branch* </label><br>
    <select name="branch" class="textbox" required>
        	<option value="">&lt; - - Select Branch - - &gt;</option>
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
  <div class="form-group">
    <label for="" style="color:#F38094;">Birth-date* </label>
    <input type="date" name="dob" class="form-control textbox" id="" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Semester* </label><br>
    <select name="sem" class="textbox" required>
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
  <div class="form-group">
    <label for="" style="color:#F38094;">E-Mail ID* </label>
    <input type="email" name="email" class="form-control textbox" id="" placeholder="Valid E-Mail Address" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Phone* </label>
    <input type="number" name="phone" class="form-control textbox" id="" placeholder="Contact Number" required/>
  </div>  <div class="form-group">
    <label for="" style="color:#F38094;">Address </label><br>
	<textarea rows="4" cols="25" name="address" class="textbox" placeholder="Permanent Address"></textarea>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">City </label>
    <input type="text" name="city" class="form-control textbox" id="" placeholder="City">
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">PIN </label>
    <input type="number" name="pin" class="form-control textbox" id="" placeholder="6-digit PIN Number">
  </div>
  <text>* Fields marked with an asterisk sign are required</text><br><br>
  <button type="submit" class="btn btn-default" name="submit" >Submit</button>
  <button type="reset" class="btn btn-default" name="reset" >Reset</button>
</form>
</body>

    <?php include ('include/footer.php'); ?>

</html>
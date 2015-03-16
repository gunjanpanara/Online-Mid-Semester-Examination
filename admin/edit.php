<?php
include ('check_user_session.php');
error_reporting(0);
include_once 'oesdb.php';
$id=$_SESSION['examiner_id'];


$q_fetch_register = "select * from reg_examiner_gpa where id=$id";
$q_fetch_login = "select * from login_examiner_gpa where id=$id";

$res_fetch_register = executeQuery($q_fetch_register);
$res_fetch_login = executeQuery($q_fetch_login);

$row_fetch_register = mysql_fetch_assoc($res_fetch_register);
$row_fetch_login = mysql_fetch_assoc($res_fetch_login);

if(isset($_POST['update']))
{

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$username=$_POST['username'];
	$pswd=$_POST['pswd'];
	$branch=$_POST['branch'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$cdate = date('Y-m-d h:i:s');
	$mdate = date('Y-m-d h:i:s');

$q_update_register = "update reg_examiner_gpa set fname='$fname', lname='$lname', gender='$gender',branch='$branch',
email='$email', phone=$phone,mdate='$mdate' where id=$id";

$q_update_login = "update login_examiner_gpa set username='$username',pswd='$pswd' where r_id=$id";

$res_update_register = executeQuery($q_update_register);
$res_update_login = executeQuery($q_update_login);
  if(!$res_update_register ){
    die("error....");
    exit();
  }
  if( !$res_update_login)
  {
     die("error....2");
    exit();
  }

  if($res_update_register && $res_update_login)
  {
  	header('location: home.php?edit=yes');
  }
}
?>

<!DOCTYPE html>
<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

	<h4>Update User Profile</h4><br>

<form id="reg_form" role="form" action="" method="POST">
  <div class="form-group">
    <label for="" style="color:#F38094;">First Name* </label>
    <input type="text" name="fname" value="<?php echo $row_fetch_register['fname']; ?>" class="form-control textbox" id="" placeholder="First Name" required autofocus/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Last Name* </label>
    <input type="text" name="lname" value="<?php echo $row_fetch_register['lname']; ?>" class="form-control textbox" id="" placeholder="Last Name" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Gender* </label>
    <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='male') { echo 'checked'; } ?> value='male' id="" required/>Male
    <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='female') { echo 'checked'; } ?> value='female' id="" required/>Female
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Usernam*: </label>
    <input type="text" name="username" value="<?php echo $row_fetch_login['username']; ?>" class="form-control textbox" id="" placeholder="Username" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Password* </label>
    <input type="password" name="pswd" value="<?php echo $row_fetch_login['pswd']; ?>" class="form-control textbox" id="" placeholder="Password [8-12]" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Confirm Password* </label>
    <input type="password" name="pswd_again" value="<?php echo $row_fetch_login['pswd']; ?>" class="form-control textbox" id="" placeholder="confirm password" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Branch* </label><br>
    <select name="branch" value="<?php echo $row_fetch_register['branch']; ?>" class="textbox" required>
					<option>Administration, Student Section, Library</option>
					<option>Auto Mobile Engineering</option>
					<option>Bio Medical Engineering</option>
					<option>Civil Engineering</option>
					<option>Computer Engineering</option>
					<option>Electrical Engineering</option>
					<option>Electronics & Communication Engineering</option>
					<option>Information Technology</option>
					<option>Instrumention & Control Engineering</option>
					<option>Mechanical Engineering</option>
					<option>Plastic Engineering</option>
	</select>
	</div>
  <div class="form-group">
    <label for="" style="color:#F38094;">E-Mail ID* </label>
    <input type="email" name="email" value="<?php echo $row_fetch_register['email']; ?>" class="form-control textbox" id="" placeholder="Valid E-Mail Address" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Phone* </label>
    <input type="number" name="phone" value="<?php echo $row_fetch_register['phone']; ?>" class="form-control textbox" id="" placeholder="Contact Number" required/>
  </div>  <div class="form-group">
  <text>* Fields marked with an asterisk sign are required</text><br><br>
  <button type="submit" class="btn btn-default" name="update" >Update</button>

</form>
</body>

    <?php include ('include/footer.php'); ?>


</html>

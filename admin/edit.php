<?php
include ('check_user_session.php');
error_reporting(0);
include_once 'oesdb.php';

$id=$_SESSION['examiner_id'];

$q_fetch_register = "select * from reg_examiner_gpa where id=$id";
$q_fetch_login = "select * from login_examiner_gpa where r_id=$id";

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

  <div class="container edit-container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h3 class="text-center">Update User Profile</h3>

        <form id="edit_form" class="form-horizontal" role="form" action="" method="POST">

          <div class="form-group">
            <label for="name" class="control-label col-sm-3">Name </label>
            <div class="col-sm-3">
              <input type="text" name="fname" class="form-control" value="<?php echo $row_fetch_register['fname']; ?>" class="form-control" id="name" placeholder="First Name" required autofocus/>
            </div>
            <div class="col-sm-3">
              <input type="text" name="lname" class="form-control" value="<?php echo $row_fetch_register['lname']; ?>" class="form-control" id="lastname" placeholder="Last Name" required/>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">Gender </label>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='male') { echo 'checked'; } ?> value='male'required/>
                    <span class="label-text">Male</span> 
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='female') { echo 'checked'; } ?> value='female'required/>
                    <span class="label-text">Female</span> 
                </label>
            </div>
          </div>

          <div class="form-group">
            <label for="userNameInput" class="control-label col-sm-3">Username </label>
            <div class="col-md-5">
              <input type="text" name="username" class="form-control" value="<?php echo $row_fetch_login['username']; ?>" class="form-control" id="userNameInput" placeholder="Username" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="passwordText" class="control-label col-sm-3">Password </label>
            <div class="col-md-5">
              <input type="password" name="pswd" class="form-control" value="<?php echo $row_fetch_login['pswd']; ?>" class="form-control" id="passwordText" placeholder="Password [8-12]" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="passwordConfirm" class="control-label col-sm-3">Confirm Password </label>
            <div class="col-md-5">
              <input type="password" name="pswd_again" class="form-control" value="<?php echo $row_fetch_login['pswd']; ?>" class="form-control" id="passwordConfirm" placeholder="confirm password" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="selectBranch" class="control-label col-sm-3">Branch </label>
            <div class="col-md-5">
              <select name="branch" class="form-control" value="<?php echo $row_fetch_register['branch']; ?>" id="selectBranch" class="" required>
                <option <?php if($row_fetch_register['branch'] == 'automobile') { echo 'selected="selected"'; } ?>>Auto Mobile Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'biomedical') { echo 'selected="selected"'; } ?>>Bio Medical Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'civil') { echo 'selected="selected"'; } ?>>Civil Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'computer') { echo 'selected="selected"'; } ?>>Computer Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'electrical') { echo 'selected="selected"'; } ?>>Electrical Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'ec') { echo 'selected="selected"'; } ?>>Electronics & Communication Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'it') { echo 'selected="selected"'; } ?>>Information Technology</option>
                <option <?php if($row_fetch_register['branch'] == 'ic') { echo 'selected="selected"'; } ?>>Instrumention & Control Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'mechanical') { echo 'selected="selected"'; } ?>>Mechanical Engineering</option>
                <option <?php if($row_fetch_register['branch'] == 'plastic') { echo 'selected="selected"'; } ?>>Plastic Engineering</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="emailInput" class="control-label col-sm-3">E-Mail ID </label>
            <div class="col-md-5">
              <input type="email" name="email" class="form-control" value="<?php echo $row_fetch_register['email']; ?>" class="form-control" id="emailInput" placeholder="Valid E-Mail Address" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="contactNumber" class="control-label col-sm-3">Phone </label>
            <div class="col-md-5">
              <input type="number" name="phone" class="form-control" value="<?php echo $row_fetch_register['phone']; ?>" class="form-control" id="contactNumber" placeholder="Contact Number" required/>
            </div>
          </div>  
          <div class="col-md-5 col-md-offset-3">
            <button type="submit" class="btn btn-primary" name="update">Update</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <?php include ('include/footer.php'); ?>

</body>

</html>

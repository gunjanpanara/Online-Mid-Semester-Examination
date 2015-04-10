<?php
include_once 'check_user_session.php';
error_reporting(0);
include_once 'oesdb.php';
$id=$_SESSION['user_id'];


$q_fetch_register = "select * from reg_gpa where id=$id";
$q_fetch_login = "select * from login_gpa where r_id=$id";

$res_fetch_register = executeQuery($q_fetch_register);
$res_fetch_login = executeQuery($q_fetch_login);

$row_fetch_register = mysql_fetch_assoc($res_fetch_register);
$row_fetch_login = mysql_fetch_assoc($res_fetch_login);

if(isset($_POST['update']))
{

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

  $q_update_register = "update  reg_gpa set fname='$fname', lname='$lname', gender='$gender',branch='$branch',sem=$sem,dob='$dob',email='$email', phone=$phone,address='$address',city='$city',pin=$pin, mdate='$mdate' where id=$id";

  $q_update_login = "update login_gpa set user=$enroll,pswd= '$pswd' where r_id=$id";

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
  $_SESSION['user_sem']=$sem;
  $_SESSION['user_branch']=$branch;
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
            <label for="name" class="control-label col-md-3">Name </label>
            <div class="col-md-3">
              <input type="text" name="fname" value="<?php echo $row_fetch_register['fname']; ?>" class="form-control" id="name" placeholder="First Name" required autofocus/>
            </div>
            <div class="col-md-3">
              <input type="text" name="lname" value="<?php echo $row_fetch_register['lname']; ?>" class="form-control" id="" placeholder="Last Name" required/>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Gender </label>
            <div class="radio radio-inline">
              <label>
                <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='male') { echo 'checked'; } ?> value='male' required>
                <span class="label-text">Male</span> 
              </label>
            </div>
            <div class="radio radio-inline">
              <label>
                <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='female') { echo 'checked'; } ?> value='female' required>
                <span class="label-text">Male</span> 
              </label>
            </div>
          </div>

          <div class="form-group">
            <label for="enrollmentNumber" class="control-label col-md-3">Enrollment No. </label>
            <div class="col-md-5">
              <input type="number" name="enroll" value="<?php echo $row_fetch_register['enroll']; ?>" class="form-control" id="enrollmentNumber" placeholder="Enrollment No." required/>
            </div>
          </div>

          <div class="form-group">
            <label for="passwordText" class="control-label col-md-3">Password </label>
            <div class="col-md-5">
              <input type="password" name="pswd" value="<?php echo $row_fetch_login['pswd']; ?>" class="form-control" id="passwordText" placeholder="Password [8-12]" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="selectBranch" class="control-label col-md-3">Branch </label>
            <div class="col-md-5">
              <select name="branch" value="<?php echo $row_fetch_register['branch']; ?>" class="form-control" id="selectBranch" required>
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
            <label for="birthdate" class="control-label col-md-3">Birthdate </label>
            <div class="col-md-5">
              <input type="date" name="dob" value="<?php echo $row_fetch_register['dob']; ?>" class="form-control" id="birthdate" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="selectSemester" class="control-label col-md-3">Semester </label>
            <div class="col-md-5">
              <select name="sem" value="<?php echo $row_fetch_register['sem']; ?>" class="form-control" id="selectSemester" required>
                <option <?php if($row_fetch_register['sem'] == 1) { echo 'selected="selected"'; } ?>>1</option>
                <option <?php if($row_fetch_register['sem'] == 2) { echo 'selected="selected"'; } ?>>2</option>
                <option <?php if($row_fetch_register['sem'] == 3) { echo 'selected="selected"'; } ?>>3</option>
                <option <?php if($row_fetch_register['sem'] == 4) { echo 'selected="selected"'; } ?>>4</option>
                <option <?php if($row_fetch_register['sem'] == 5) { echo 'selected="selected"'; } ?>>5</option>
                <option <?php if($row_fetch_register['sem'] == 6) { echo 'selected="selected"'; } ?>>6</option>
                <option <?php if($row_fetch_register['sem'] == 7) { echo 'selected="selected"'; } ?>>7</option>
                <option <?php if($row_fetch_register['sem'] == 8) { echo 'selected="selected"'; } ?>>8</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="emailInput" class="control-label col-md-3">E-Mail ID </label>
            <div class="col-md-5">
              <input type="email" name="email" value="<?php echo $row_fetch_register['email']; ?>" class="form-control" id="emailInput" placeholder="Valid E-Mail Address" required/>
            </div>
          </div>

          <div class="form-group">
            <label for="contactNumber" class="control-label col-md-3">Phone </label>
            <div class="col-md-5">
              <input type="number" name="phone" value="<?php echo $row_fetch_register['phone']; ?>" class="form-control" id="contactNumber" placeholder="Contact Number" required/>
            </div>
          </div> 

          <div class="form-group">
            <label for="addressInput" class="control-label col-md-3">Address </label>
            <div class="col-md-5">
              <textarea rows="4" cols="25" class="form-control" id="addressInput" name="address"><?php echo $row_fetch_register['address']; ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="cityInput" class="control-label col-md-3">City </label>
            <div class="col-md-5">
              <input type="text" name="city" value="<?php echo $row_fetch_register['city']; ?>" class="form-control" id="cityInput" placeholder="City">
            </div>
          </div>

          <div class="form-group">
            <label for="pinNumber" class="control-label col-md-3">PIN </label>
            <div class="col-md-5">
              <input type="number" name="pin" value="<?php echo $row_fetch_register['pin']; ?>" class="form-control" id="pinNumber" placeholder="6-digit PIN Number">
            </div>
          </div>

          <div class="form-group">
            <input type="hidden" name="r_id" value="<?php echo $row_fetch_login['r_id']; ?>" />
          </div>

          <div class="col-md-5 col-md-offset-3">
            <button type="submit" class="btn btn-primary" name="update" >Update</button>
          </div>
        </form></div>
      </div>
    </div>
  </div>


  <?php include ('include/footer.php'); ?>

</body>
</html>

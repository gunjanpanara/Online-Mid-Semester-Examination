<?php
include ('check_user_session.php');
error_reporting(0);
include_once 'oesdb.php';
$id=$_SESSION['user_id'];


$q_fetch_register = "select * from reg_gpa where id=$id";
$q_fetch_login = "select * from login_gpa where id=$id";

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

  <h4>Update User Profile</h4><br>

<form id="reg_form" role="form" action="" method="POST">
  <div class="form-group">
    <label for="" style="color:#F38094;">First Name : </label>
    <input type="text" name="fname" value="<?php echo $row_fetch_register['fname']; ?>" class="form-control textbox" id="" placeholder="First Name" required autofocus/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Last Name : </label>
    <input type="text" name="lname" value="<?php echo $row_fetch_register['lname']; ?>" class="form-control textbox" id="" placeholder="Last Name" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Gender : </label>
    <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='male') { echo 'checked'; } ?> value='male' id="" required/>Male
    <input type="radio" name="gender" <?php if($row_fetch_register['gender']=='female') { echo 'checked'; } ?> value='female' id="" required/>Female
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Enrollment No. : </label>
    <input type="number" name="enroll" value="<?php echo $row_fetch_register['enroll']; ?>" class="form-control textbox" id="" placeholder="Enrollment No." required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Password : </label>
    <input type="password" name="pswd" value="<?php echo $row_fetch_login['pswd']; ?>" class="form-control textbox" id="" placeholder="Password [8-12]" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Branch : </label><br>
    <select name="branch" value="<?php echo $row_fetch_register['branch']; ?>" class="textbox" required>
          <option <?php if($row_fetch_register['branch'] == 'Administration, Student Section, Library') { echo 'selected="selected"'; } ?>>Administration, Student Section, Library</option>
          <option <?php if($row_fetch_register['branch'] == 'Auto Mobile Engineering') { echo 'selected="selected"'; } ?>>Auto Mobile Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Bio Medical Engineering') { echo 'selected="selected"'; } ?>>Bio Medical Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Civil Engineering') { echo 'selected="selected"'; } ?>>Civil Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Computer Engineering') { echo 'selected="selected"'; } ?>>Computer Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Electrical Engineering') { echo 'selected="selected"'; } ?>>Electrical Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Electronics & Communication Engineering') { echo 'selected="selected"'; } ?>>Electronics & Communication Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Information Technology') { echo 'selected="selected"'; } ?>>Information Technology</option>
          <option <?php if($row_fetch_register['branch'] == 'Instrumention & Control Engineering') { echo 'selected="selected"'; } ?>>Instrumention & Control Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Mechanical Engineering') { echo 'selected="selected"'; } ?>>Mechanical Engineering</option>
          <option <?php if($row_fetch_register['branch'] == 'Plastic Engineering') { echo 'selected="selected"'; } ?>>Plastic Engineering</option>
  </select>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Birthdate : </label>
    <input type="date" name="dob" value="<?php echo $row_fetch_register['dob']; ?>" class="form-control textbox" id="" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Semester : </label><br>
    <select name="sem" value="<?php echo $row_fetch_register['sem']; ?>" class="textbox" required>
          <option <?php if($row_fetch_register['sem'] == '1') { echo 'selected="selected"'; } ?>>1</option>
          <option <?php if($row_fetch_register['sem'] == '2') { echo 'selected="selected"'; } ?>>2</option>
          <option <?php if($row_fetch_register['sem'] == '3') { echo 'selected="selected"'; } ?>>3</option>
          <option <?php if($row_fetch_register['sem'] == '4') { echo 'selected="selected"'; } ?>>4</option>
          <option <?php if($row_fetch_register['sem'] == '5') { echo 'selected="selected"'; } ?>>5</option>
          <option <?php if($row_fetch_register['sem'] == '6') { echo 'selected="selected"'; } ?>>6</option>
          <option <?php if($row_fetch_register['sem'] == '7') { echo 'selected="selected"'; } ?>>7</option>
          <option <?php if($row_fetch_register['sem'] == '8') { echo 'selected="selected"'; } ?>>8</option>
  </select>
  <div class="form-group">
    <label for="" style="color:#F38094;">E-Mail ID : </label>
    <input type="email" name="email" value="<?php echo $row_fetch_register['email']; ?>" class="form-control textbox" id="" placeholder="Valid E-Mail Address" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Phone : </label>
    <input type="number" name="phone" value="<?php echo $row_fetch_register['phone']; ?>" class="form-control textbox" id="" placeholder="Contact Number" required/>
  </div>  <div class="form-group">
    <label for="" style="color:#F38094;">Address : </label><br>
  <textarea rows="4" cols="25" class="textbox" name="address"  ><?php echo $row_fetch_register['address']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">City : </label>
    <input type="text" name="city" value="<?php echo $row_fetch_register['city']; ?>" class="form-control textbox" id="" placeholder="City">
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">PIN : </label>
    <input type="number" name="pin" value="<?php echo $row_fetch_register['pin']; ?>" class="form-control textbox" id="" placeholder="6-digit PIN Number">
  </div>
  <input type="hidden" name="r_id" value="<?php echo $row_fetch_login['r_id']; ?>" />
  <text>* Fields marked with an asterisk sign are required</text><br><br>
  <button type="submit" class="btn btn-default" name="update" >Update</button>

</form>

    <?php include ('include/footer.php'); ?>

</body>
</html>

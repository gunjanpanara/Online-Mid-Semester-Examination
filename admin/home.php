<?php 
error_reporting(0);
include_once 'check_user_session.php';
include_once 'oesdb.php';

$res = executeQuery("select * from reg_examiner_gpa where id=".$_SESSION['examiner_id']);
$arr = mysql_fetch_assoc($res);

?>

<html>

<?php include ('include/head.php'); ?>

<body>

  <?php include ('include/header.php'); 

  if($_GLOBALS['message']) 
  {
    echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
  }

  $q_fetch_register = "select * from reg_examiner_gpa where id=$id";
  $q_fetch_login = "select * from login_examiner_gpa where id=$id";

  $res_fetch_register = executeQuery($q_fetch_register);
  $res_fetch_login = executeQuery($q_fetch_login);

  $row_fetch_register = mysql_fetch_assoc($res_fetch_register);
  $row_fetch_login = mysql_fetch_assoc($res_fetch_login);
  ?>

  <div class="container home-container">
    <div class="row">
      <?php if(isset($_GET['edit']) && isset($_GET['edit'])=='yes')
      {?>
      <p class="text-center text-success">Profile updated successfully</p>
      <?php } ?>

      <div class="col-md-8 col-md-offset-2">
        <div class="card personal-details">
          <h3 class="card-title text-center"><?php echo "Welcome, ".$arr['fname']." ".$arr['lname']; ?></h3>
          <a href="edit.php" class="">
            <span class="lbl">Username</span> <span class="data"><?php echo $arr['fname']." ".$arr['lname']; ?></span>
          </a>
          <a href="edit.php" class="">
            <span class="lbl">Gender</span> <span class="data"><?php echo $arr['gender']; ?></span>
          </a>
          <a href="edit.php" class="">
            <span class="lbl">Branch</span> <span class="data"><?php echo $arr['branch']; ?></span>
          </a>
          <a href="edit.php" class="">
            <span class="lbl">E-Mail</span> <span class="data email-display"><?php echo $arr['email']; ?></span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php include ('include/footer.php'); ?>
</body>
</html>
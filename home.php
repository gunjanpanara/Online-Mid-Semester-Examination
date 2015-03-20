<?php 
error_reporting(0);
include_once 'check_user_session.php';
include_once 'oesdb.php';

$res = executeQuery("select * from reg_gpa where id=".$_SESSION['user_id']);
$arr = mysql_fetch_assoc($res);

?>

<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>
 <?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
 ?>
<center>
<?php if(isset($_GET['edit']) && isset($_GET['edit'])=='yes')
{?>
    <h5>Your changes saved</h5>
    <h4>Profile updated successfully<h4>
<?php } ?>

    <h3 style="text-transform:capitalize;"><?php echo "Welcome, ".$arr['fname']." ".$arr['lname']; ?></h3><hr>
    <h3><u><a href="start_examination.php">Start Examination</a></u></h3><hr>

<?php 
$q_fetch_register = "select * from reg_gpa where id=$id";
$q_fetch_login = "select * from login_gpa where id=$id";

$res_fetch_register = executeQuery($q_fetch_register);
$res_fetch_login = executeQuery($q_fetch_login);

$row_fetch_register = mysql_fetch_assoc($res_fetch_register);
$row_fetch_login = mysql_fetch_assoc($res_fetch_login);
?>
<form id="reg_form" style="text-transform:uppercase; 
    text-align:left; 
    border:2px solid #a1a1a1; 
    min-height:25%; 
    margin-top:10px; 
    padding:20px 50px;
    background: #dddddd;
    border-radius: 5px;">
  <div class="form-group">
  <h3 style="text-transform:capitalize">User Profile</h3>
    <hr>
    <label for="" style="color:#F38094;">Username : </label>
    <?php echo $arr['fname']." ".$arr['lname']; ?><br>
    <label for="" style="color:#F38094;">Gender : </label>
    <?php echo $arr['gender']; ?><br>
    <label for="" style="color:#F38094;">Branch : </label>
    <?php echo $arr['branch']; ?><br>
    <label for="" style="color:#F38094;">Semester : </label>
    <?php echo $arr['sem']; ?><br>
    <label for="" style="color:#F38094;">E-mail : </label>
    <?php echo $arr['email']; ?><br>
    <hr>
  </div>
</form>

</center>

    <?php include ('include/footer.php'); ?>

</body>
</html>

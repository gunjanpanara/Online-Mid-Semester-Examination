<?php 
error_reporting(0);
session_start();
include_once 'oesdb.php';

if(!isset($_SESSION['examiner_id']))
{
	header('location:login.php');
}
        if(!isset($_SESSION['examiner_name'])){
            $_GLOBALS['message']="Session Timeout.Click here to <a href=\"login.php\">Re-LogIn</a>";
        }
        else if(isset($_REQUEST['logout'])){
                unset($_SESSION['examiner_name']);
                unset($_SESSION['examiner_id']);
        }

$res = executeQuery("select * from reg_examiner_gpa where id=".$_SESSION['examiner_id']);
$arr = mysql_fetch_assoc($res);

if(isset($_GET['edit']) && isset($_GET['edit'])=='yes')
{
	echo "Profile updated successfully..";
}

?>

<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header_student.php'); ?>
 <?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
 ?>
<center>
    <br><hr>
	<h4><a href="question_gen.php">Generate Question Paper</a></h4>
	<hr>
</center>

    <?php include ('include/footer.php'); ?>

</body>
</html>

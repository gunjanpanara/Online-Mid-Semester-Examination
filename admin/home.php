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
		<br><br><h3><?php echo "Welcome, ".$arr['fname']." ".$arr['lname']; ?></h3>
</center>

    <section style="margin-top:20%;">

        <?php include ('include/footer.php'); ?>

    </section>

</body>
</html>

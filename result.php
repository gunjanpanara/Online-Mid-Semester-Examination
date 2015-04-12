<!DOCTYPE html>
<html>

<?php include ('include/head.php');
include ('include/connection.php');
include ('check_user_session.php');
include ('oesdb.php');

$res = executeQuery("select * from reg_gpa where id=".$_SESSION['user_id']);
$arr = mysql_fetch_assoc($res);

?>

<body>

    <?php include ('include/header.php'); ?>

    <div class="container result-container">
        <div class="row">
            <div class="col-md-12">
                <p class="lead text-center">Here's your <span class="text-danger">Examination Results !!</span></p>
            </div>
        </div>

		<div class="col-md-8 col-md-offset-2">
			<h3 class="text-center">Examination Results</h3>
            <h4 class="text-center"><?php echo "Welcome, ".$arr['fname']." ".$arr['lname']; ?></h4>
        </div>

    </div>

</body>

    <?php include ('include/footer.php'); ?>

<html>
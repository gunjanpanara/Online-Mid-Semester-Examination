<?php 

error_reporting(0);
session_start();
include_once 'oesdb.php';

if(!isset($_REQUEST['submit']))
{
	$_GLOBALS['message']="Select user..";
}
else
{
	$new_user=$_POST['new_user'];
	if(strcmp($new_user, "student")==0)
	{
		unset($_GLOBALS['message']);
		header('Location: register.php');
	}
	else if(strcmp($new_user, "examiner")==0)
	{
		unset($_GLOBALS['message']);
		header('Location: register_examiner.php');
	}
	else{}
}

?>

<!DOCTYPE html>
<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

	<br>
	<h4>Registarer As</h4><br>
	<?php
      if($_GLOBALS['message']) {
          echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
      }
?>

 <form id="reg_form" role="form" action="" method="POST">
   <div class="form-group">
    <input type="radio" name="new_user" value="student" id="" required/>&nbsp Student &nbsp &nbsp &nbsp
    <input type="radio" name="new_user" value="examiner" id="" required/>&nbsp Examiner
  </div>
  <button type="submit" class="btn btn-default" name="submit" >Next</button>
</form>

    <?php include ('include/footer.php'); ?>

</body>
</html>

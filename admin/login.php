<?php   

error_reporting(0);
session_start();
include_once 'oesdb.php';

if(isset($_POST['login']))
{

  $uname=$_POST['uname'];
  $pswd=$_POST['pswd'];

  $q="select * from login_examiner_gpa where username='$uname' and pswd='$pswd'";

  //$res=mysql_query($q,$conn);

  $res=executeQuery($q);
  $num=mysql_num_rows($res);
  $row=mysql_fetch_assoc($res);
  $rid=$row['r_id'];

  $q2 = "select branch from reg_examiner_gpa where id=$rid";
  $res2=executeQuery($q2);
  $row2=mysql_fetch_assoc($res2);

  if($num>0)
  {
  	session_start();
  	$_SESSION['examiner_id']=$row['id'];
  	$_SESSION['examiner_name']=$row['username'];
    $_SESSION['examiner_branch']=$row2['branch'];
    unset($_GLOBALS['message']);
  	header('location:home.php');
  } 
  else {$_GLOBALS['message']="Check your Username and Password.";  }

}
?>

<!DOCTYPE html>
<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

	<br>
	<h3>Welcome to Online Mid-Semester Examination System of Government Polytechnic, Ahmedabad</h3><br>
<?php
       
        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
        
  <form role="form" id="reg_form" action="" method="POST">
    <div class="form-group">
      <h4><label for="" style="color:#F38094;">User Name</label></h4>
      <input type="text" name="uname" class="form-control textbox" id="" placeholder="username" required autofocus/>
    </div>
    <div class="form-group">
      <h4><label for="" style="color:#F38094; text-transform:none;">Password</label></h4>
      <input type="password" name="pswd" class="form-control textbox" id="" placeholder="password" required/>
    </div>
    <button type="submit" name="login" class="btn btn-default" >Submit</button>
    <button type="reset" class="btn btn-default" >Reset</button>
  </form>
</body>

    <?php include ('include/footer.php'); ?>

</html>

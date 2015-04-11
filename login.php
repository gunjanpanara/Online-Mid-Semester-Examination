<?php 

error_reporting(0);
session_start();
include 'include/general.php';
include_once 'oesdb.php';

if(isset($_POST['login']))
{
    $uname=$_POST['uname'];
    $pswd=$_POST['pswd'];
    $uname=sanitize($uname);
    $pswd=sanitize($pswd);

    $q="select * from login_gpa where user='$uname' and pswd='$pswd'";

    $res=executeQuery($q);
    $num=mysql_num_rows($res);
    $row=mysql_fetch_assoc($res);
    $rid=$row['r_id'];

    $q2 = "select sem, branch from reg_gpa where id=$rid";
    $res2=executeQuery($q2);
    $row2=mysql_fetch_assoc($res2);

    if($num>0)
    {
        session_start();
      	$_SESSION['user_id']=$row['r_id'];
      	$_SESSION['user_name']=$row['user'];
        $_SESSION['user_sem']=$row2['sem'];
        $_SESSION['user_branch']=$row2['branch'];
        unset($_GLOBALS['message']);
      	header('location:home.php');
    } 
              
    else 
    {
        $_GLOBALS['message']="Check your Username and Password.";  
    }
}
?>


<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

 <div class="container login-container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <p class="text-center lead">Welcome to Online Mid-Semester Examination System</p>
        <?php

        if($_GLOBALS['message']) {
          echo "<div class=\"alert alert-danger message\" >".$_GLOBALS['message']."</div>";
        }
        ?>
        <h3 class="text-center">LOGIN</h3>

        <form id="login_form" class="form-horizontal" role="form" action="" method="POST">

          <div class="form-group">
            <label for="userName" class="control-label col-md-3">User Name </label>
            <div class="col-md-8">
              <input type="text" name="uname" class="form-control input-lg" id="userName" placeholder="Username (enrollment no.)" required autofocus/>
            </div>
          </div>  

          <div class="form-group">
            <label for="passwordInput" class="control-label col-md-3">Password </label>
            <div class="col-md-8">
              <input type="password" name="pswd" class="form-control input-lg" id="passwordInput" placeholder="Password" required/>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
             <button type="submit" name="login" class="btn btn-primary" >Login</button>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>

    <?php include ('include/footer.php'); ?>

</html>

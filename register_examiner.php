<?php

/*
****************************************************
*** Online Examination System                    ***
***----------------------------------------------***
*** Title: Student Registration                  ***
****************************************************
*/

 /* Procedure
*********************************************

 * ----------- *
 * PHP Section *
 * ----------- *
Step 1: Event to Process...
        Case 1 : Submit - Add the new Student to the System.
      
 * ------------ *
 * HTML Section *
 * ------------ *
Step 2: Display the Html page to receive the required information.

*********************************************
*/

error_reporting(0);
session_start();
include_once 'oesdb.php';

if(isset($_REQUEST['submit']))
{
 /***************************** Step 1 : Case 1 ****************************/
 //Add the new user information in the database
    

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$username=$_POST['username'];
	$pswd=$_POST['pswd'];
	$branch=$_POST['branch'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$cdate = date('Y-m-d h:i:s');
	$mdate = date('Y-m-d h:i:s');

     $result=executeQuery("select * from reg_examiner_gpa where fname='$fname' and lname='$lname';");
    // $_GLOBALS['message']=$newstd;
    if(empty($_REQUEST['fname'])||empty ($_REQUEST['pswd'])||empty ($_REQUEST['email']))
    {
         $_GLOBALS['message']="Some of the required Fields are Empty";
    }else if(mysql_num_rows($result)>0)
    {
        $_GLOBALS['message']="Sorry the User Name is Not Available Try with Some Other name.";
    }
    else
    {

	$q = "insert into reg_examiner_gpa(fname,lname,gender,branch,email,phone,cdate)
	values ('$fname','$lname','$gender','$branch','$email',$phone,'$cdate')";
		
  $res=executeQuery($q);
	$r_id = mysql_insert_id();
	//$q1 = "insert into login_gpa(r_id, user, pswd) values ('$r_id', '$username',ENCODE('".htmlspecialchars($_REQUEST['pswd'],ENT_QUOTES)."','oespass') )";
  $q1 = "insert into login_examiner_gpa(r_id, username, pswd) values ('$r_id', '$username','$pswd' )";
	

  $res1=executeQuery($q1);
     if(!@$res||!@$res1)
                $_GLOBALS['message']=mysql_error();
     else
     {
        $success=true;
        $_GLOBALS['message']="Your Account is Created Successfully. Click <a href=\"login.php\">here</a> to Login";
       // header('Location: index.php');
       
     }
    }
    closedb();
}

?>

<!DOCTYPE html>
<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

	<br>
	<h4>User Registartion</h4><br>
<?php
      if($_GLOBALS['message']) {
          echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
      }
?>
 
<form id="reg_form" role="form" action="register_examiner.php" method="POST">
  <div class="form-group">
    <label for="" style="color:#F38094;">First Name* </label>
    <input type="text" name="fname" class="form-control textbox" id="" placeholder="First Name" required autofocus/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Last Name* </label>
    <input type="text" name="lname" class="form-control textbox" id="" placeholder="Last Name" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Gender : </label>
    <input type="radio" name="gender" value="male" id="" required/>Male
    <input type="radio" name="gender" value="female" id="" required/>Female
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Username *</label>
    <input type="text" name="username" class="form-control textbox" id="" placeholder="username" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Password </label>
    <input type="password" name="pswd" class="form-control textbox" id="" placeholder="Password [8-12]" required/>
  </div>

<div class="dropdown" style="position: relative;">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    Dropdown
    <span class="caret">  </span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
  </ul>
</div>

  <div class="form-group">
    <label for="" style="color:#F38094;">Branch </label><br>
    <select name="branch" class="textbox" required>
			    	<option value=""><--Select Branch--></option>
					<option value="automobile">AUTO MOBILE ENGINEERING</option>
					<option value="biomedical">BIO MEDICAL ENGINEERING</option>
					<option value="biomedical">CIVIL ENGINEERING</option>
					<option value="computer">COMPUTER ENGINEERING</option>
					<option value="electrical">ELECTRICAL ENGINEERING</option>
					<option value="ec">ELECTRONICS & COMMUNICATION ENGINEERING</option>
					<option value="it">INFORMATION TECHNOLOGY</option>
					<option value="ic">INSTRUMENTION & CONTROL ENGINEERING</option>
					<option value="mechanical">MECHANICAL ENGINEERING</option>
					<option value="plastic">PLASTIC ENGINEERING</option>
	</select>
	</div>
  <div class="form-group">
    <label for="" style="color:#F38094;">E-Mail ID *</label>
    <input type="email" name="email" class="form-control textbox" id="" placeholder="Valid E-Mail Address" required/>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Phone *</label>
    <input type="number" name="phone" class="form-control textbox" id="" placeholder="Contact Number" required/>
  </div>  
  <button type="submit" class="btn btn-default" name="submit" >Submit</button>
   <button type="reset" class="btn btn-default" name="reset" >Reset</button>
</form>

    <?php include ('include/footer.php'); ?>

</body>
</html>
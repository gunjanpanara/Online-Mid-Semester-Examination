<?php

/**** Title: Examiner Registration ****/

/**** Procedure: Add the new Examiner to the System. ****/

error_reporting(0);
session_start();
include_once 'oesdb.php';

if(isset($_REQUEST['submit']))
{

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
    if (empty($_POST) === false) {
        $required_fields = array('fname','lname','gender','username','pswd','branch','email','phone');
        foreach ($_POST as $key => $value) {
            if (empty($value) && in_array($key, $required_fields) === true) {
                $_GLOBALS['message'] = 'Fields marked with an asterisk sign are required';
            }
        }

        if (empty($errors) === true) {
            if (preg_match("/\\s/", $_POST['username']) === true) {
                $_GLOBALS['message'] = 'User-name must not contain any spaces.';
            }
            if (strlen($_POST['pswd']) < 6 ) {
                $_GLOBALS['message'] = 'Your password must be between 6 to 14 character.';
            }
        }
    }
    if ($_POST['pswd'] == $_POST['pswd_again']) {

        if(empty($_REQUEST['fname'])||empty ($_REQUEST['lname'])||empty ($_REQUEST['gender'])||empty($_REQUEST['username'])||empty($_REQUEST['pswd'])||empty($_REQUEST['pswd_again'])||empty($_REQUEST['branch'])||empty($_REQUEST['email'])||empty($_REQUEST['phone']))
        {
            $_GLOBALS['message']="Fields marked with an asterisk sign are required";
        }
        else if(mysql_num_rows($result)>0)
        {
            $_GLOBALS['message']="Sorry the 'username' is not available. Try with some other name.";
        }
        else
        {
            $q = "insert into reg_examiner_gpa(fname,lname,gender,branch,email,phone,cdate)
            values ('$fname','$lname','$gender','$branch','$email',$phone,'$cdate')";

            $res=executeQuery($q);
            $r_id = mysql_insert_id();
            $q1 = "insert into login_examiner_gpa(r_id, username, pswd) values ('$r_id', '$username','$pswd')";

            $res1=executeQuery($q1);
            if(!@$res||!@$res1)
                $_GLOBALS['message']=mysql_error();
            else
            {
                $success=true;
                $_GLOBALS['message']="Your Account is Created Successfully. Click <a href=\"login.php\">here</a> to Login";
            }
        }
    }
    else
    {
        $_GLOBALS['message'] = 'Passwords Do Not Match.';
    }
    closedb();
}

?>

<!DOCTYPE html>
<html>

<?php include ('include/head.php'); ?>
<script type="text/javascript">
   function val()
     {
         //validation for name
          var txtname=document.getElementById("firstname").value;
          var validtxtname=/[^a-zA-Z]+/i;
          var count=0;
          if(validtxtname.test(txtname))
          {
              document.getElementById("nm1").innerHTML="Invalid First Name!";
              count++;
          }
          else
          {
          document.getElementById("nm1").innerHTML="";
          }
          var txtname=document.getElementById("lastname").value;
          var validtxtname=/[^a-zA-Z]+/i;
          var count=0;
          if(validtxtname.test(txtname))
          {
              document.getElementById("nm2").innerHTML="Invalid Last Name!";
              count++;
          }
          else
          {
          document.getElementById("nm2").innerHTML="";
          }
          
          var txtname=document.getElementById("contactNumber").value;
          var validtxtname=/\D$/i;
          var count=0;
          if((txtname.length!=10 && txtname.length>0) || isNaN(txtname))
          {
              document.getElementById("cn").innerHTML="Enter Valid 10 Digit Phone Number !!";
              count++;
          }
          else
          {
          document.getElementById("cn").innerHTML="";
          }
          var pass=document.getElementById("passwordText").value;
          var validpass=/^[a-zA-Z0-9@_]{4,10}$/;
          var count=0;
          if((pass.length<=6 || pass.length>=16) )
          {
            document.getElementById("pass1").innerHTML="Your Password Must Be Between 6 to 14 Character!!";
            count++;
          }
          else
          {
            document.getElementById("pass1").innerHTML="";
          }
          

          if(count>0)
          {
              return false;
          }
          
     }
          
</script>
</script>
<body>

    <?php include ('include/header.php'); ?>

    <div class="container reg-container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center">Examiner Registration</h3>
                <?php
                if($_GLOBALS['message']) {
                    echo "<div class=\"message text-center col-md-8 col-md-offset-2 alert alert-danger\">".$_GLOBALS['message']."</div>";
                }
                ?>

                <form id="reg_form" class="form-horizontal" role="form" action="register.php" method="POST">

                    <div class="form-group">
                        <label for="firstname" class="control-label col-md-3">Name* </label>
                        <div class="col-md-3">
                            <input type="text" name="fname" class="form-control" id="firstname" placeholder="First Name" onkeyup="val()" required autofocus/>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="lname" class="form-control" id="lastname" placeholder="Last Name" onkeyup="val()" required/>
                        </div>
                    </div>
                    <div>
                         <b id="nm1" style="font-size:12px;"></b>
                    </div>

                    <div>
                         <b id="nm2" style="font-size:12px;"></b>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Gender* </label>
                        <div class="radio radio-inline">
                            <label>
                                <input type="radio" name="gender" value="male" required>
                                <span class="label-text">Male</span> 
                            </label>
                        </div>
                        <div class="radio radio-inline">
                            <label>
                                <input type="radio" name="gender" value="female" required>
                                <span class="label-text">Female</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="usernameInput" class="control-label col-md-3">Username*</label>
                        <div class="col-md-5">
                          <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Username" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="passwordText" class="control-label col-md-3">Password* </label>
                        <div class="col-md-5">
                            <input type="password" name="pswd" class="form-control" id="passwordText" placeholder="Password" required/>
                        </div>
                    </div>
                    <div>
                         <b id="pass1" style="font-size:12px;"></b>
                    </div>


                    <div class="form-group">
                        <label for="passwordConfirm" class="control-label col-md-3">Confirm Password* </label>
                        <div class="col-md-5">
                            <input type="password" name="pswd_again" class="form-control" id="passwordConfirm" placeholder="Confirm Password" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="selectBranch" class="control-label col-md-3">Branch* </label>
                        <div class="col-md-5">
                        <select name="branch" class="form-control" id="selectBranch" required>
                            <option value="">- - Select Branch - -</option>
                            <option value="automobile">AUTO MOBILE ENGINEERING</option>
                            <option value="biomedical">BIO MEDICAL ENGINEERING</option>
                            <option value="biomedical">CIVIL ENGINEERING</option>
                            <option value="computer">COMPUTER ENGINEERING</option>
                            <option value="electrical">ELECTRICAL ENGINEERING</option>
                            <option value="ec">ELECTRONICS &amp; COMMUNICATION ENGINEERING</option>
                            <option value="it">INFORMATION TECHNOLOGY</option>
                            <option value="ic">INSTRUMENTION &amp; CONTROL ENGINEERING</option>
                            <option value="mechanical">MECHANICAL ENGINEERING</option>
                            <option value="plastic">PLASTIC ENGINEERING</option>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="emailInput" class="control-label col-md-3">E-Mail ID* </label>
                        <div class="col-md-5">
                            <input type="email" name="email" class="form-control" id="emailInput" placeholder="Valid E-Mail Address" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contactNumber" class="control-label col-md-3">Phone* </label>
                        <div class="col-md-5">
                            <input type="text" name="phone" class="form-control" id="contactNumber" placeholder="Contact Number" onkeyup="val()" required/>
                        </div>
                    </div> 
                    <div>
                         <b id="cn" style="font-size:12px;"></b>
                    </div>  

                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                          <p>* Fields marked with an asterisk sign are required</p>
                          <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                          <button type="reset" class="btn btn-primary" name="reset" >Reset</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<?php include ('include/footer.php'); ?>

</html>
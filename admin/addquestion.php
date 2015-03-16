<?php 
session_start();

if(!isset($_SESSION['sem']))
{
  header('location:select.php');
  exit();
}

$conn=mysql_connect('localhost','root','');
$db=mysql_select_db('oes_gpa');

if(!$conn)
{
  echo "not connected...";
}

if(isset($_POST['addque']))
{
  $sem=$_SESSION['sem'];
  $branch=$_SESSION['branch'];
  $subject=$_SESSION['subject'];
  $question=$_POST['question'];
  $option_a=$_POST['option_a'];
  $option_b=$_POST['option_b'];
  $option_c=$_POST['option_c'];
  $option_d=$_POST['option_d'];
  $answer=$_POST['answer'];
  
  $q="insert into question_gpa(sem,branch,subject,question,option_a,option_b,option_c,option_d,answer)
  values('$sem','$branch','$subject','$question','$option_a','$option_b','$option_c','$option_d','$answer')";

  $res = mysql_query($q,$conn);
	
  if(!$res)
  {
  	die('im');
  }
  else
    { ?><script>alert("New Question Added..")</script><?php }

}  
?>

<!DOCTYPE html>
<html>


    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

	<br>
	<h4>Paper Generation for Mid-Semester Examination</h4><br>

<form id="reg_form" role="form" action="" method="POST">
  <div class="form-group">
    <label for="" style="color:#F38094;">Enter Question : </label><br>
    <textarea rows="4" cols="25" class="textbox" name="question" placeholder="Question" required autofocus></textarea>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Option A </label>
    <input type="text" name="option_a" class="form-control textbox" id="" placeholder="Option A" required>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Option B </label>
    <input type="text" name="option_b" class="form-control textbox" id="" placeholder="Option B" required>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Option C </label>
    <input type="text" name="option_c" class="form-control textbox" id="" placeholder="Option C" required>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Option D </label>
    <input type="text" name="option_d" class="form-control textbox" id="" placeholder="Option D" required>
  </div>
  <div class="form-group">
    <label for="" style="color:#F38094;">Answer : </label><br>
    A &nbsp<input type="radio" name="answer" value="option_a" id="" required/><br>
    B &nbsp<input type="radio" name="answer" value="option_b" id="" required/><br>
    C &nbsp<input type="radio" name="answer" value="option_c" id="" required/><br>
    D &nbsp<input type="radio" name="answer" value="option_d" id="" required/>
  </div>
  <button type="submit" name="addque" class="btn btn-default" >Add Question</button>
  <button type="reset" class="btn btn-default" >Reset</button>
</form>

<hr>
<a href="select.php">Reset Branch &amp Semester</a>

</body>

    <?php include ('include/footer.php'); ?>

<html>
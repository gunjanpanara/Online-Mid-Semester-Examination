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

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p class="text-center lead">Generate Paper</p>        

        <form id="add_question_form" class="form-horizontal" role="form" action="" method="POST">
          <div class="form-group">
            <label class="control-label col-md-2" for="questionInput">Enter Question </label>
            <div class="col-md-8">
              <textarea rows="5" cols="75" class="form-control" name="question" id="questionInput" placeholder="Question" required autofocus></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-2">Option A </label>
            <div class="col-md-8">
              <input type="text" name="option_a" class="form-control textbox" id="" placeholder="Option A" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-2">Option B </label>
            <div class="col-md-8">
              <input type="text" name="option_b" class="form-control textbox" id="" placeholder="Option B" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-2">Option C </label>
            <div class="col-md-8">
              <input type="text" name="option_c" class="form-control textbox" id="" placeholder="Option C" required>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="control-label col-md-2">Option D </label>
            <div class="col-md-8">
              <input type="text" name="option_d" class="form-control textbox" id="" placeholder="Option D" required>
            </div>
          </div>

          <div class="form-group">
            <label for="">Answer </label>
            <div class="col-md-8">
              A &nbsp<input type="radio" name="answer" value="option_a" id="" required/><br>
              B &nbsp<input type="radio" name="answer" value="option_b" id="" required/><br>
              C &nbsp<input type="radio" name="answer" value="option_c" id="" required/><br>
              D &nbsp<input type="radio" name="answer" value="option_d" id="" required/>
            </div>
          </div>
          <div class="col-md-4 col-md-offset-2">
            <button type="submit" name="addque" class="btn btn-primary" >Add Question</button>
            <button type="reset" class="btn btn-primary" >Reset</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <a href="select.php">Reset Branch &amp Semester</a>

</body>

<?php include ('include/footer.php'); ?>

<html>
<?php 


error_reporting(0);
session_start();
include_once 'oesdb.php';
unset($_SESSION['branch']);
unset($_SESSION['sem']);
unset($_SESSION['subject']);

if(isset($_POST['submit']))
{
	$branch=$_POST['branch'];
	$sem=$_POST['sem'];
	$subject=$_POST['subject'];

	$_SESSION['branch']=$branch;
	$_SESSION['sem']=$sem;
	$_SESSION['subject']=$subject;

	if(!empty($_SESSION['branch']) && !empty($_SESSION['sem']) && !empty($_SESSION['subject'])){
		header('location:addquestion.php');
		exit();
	}
	
}

?>

<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script language="javascript" type="text/javascript">

$(document).ready(function(){
	
	$('#sem').on('change',function(){
		var sem = $(this).val();
		var branch = $("#branch").val();
		$.ajax({
			url: 'get_subject_ajax.php',
			type: 'POST',
			data: 'branch='+branch+'&sem='+sem,
			success: function(data){
				var subject = $.parseJSON(data);
				$('#subject').html(subject);
			}
		});
	});

	$('#branch').on('change',function(){
		var sem = $('#sem').val();
		var branch = $(this).val();
		$.ajax({
			url: 'get_subject_ajax.php',
			type: 'POST',
			data: 'branch='+branch+'&sem='+sem,
			success: function(data){
				var subject = $.parseJSON(data);
				$('#subject').html(subject);
			}
		});
	});
	
	
});

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<!DOCTYPE html>
<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

	<br>
	<h4>Paper Generation (Select Branch, Semester & Subject)</h4><br>

<form action="select.php" method="post">
  <div class="form-group">
    <label for="" style="color:#F38094;">Branch : </label><br>
    <select name="branch" class="textbox" id="branch" required autofocus>
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
    <label for="" style="color:#F38094;">Semester : </label><br>
    <select name="sem" class="textbox" id="sem" required>
			    	<option value="">---</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
	</select>
  <div class="form-group">
    <label for="" style="color:#F38094;">Subject : </label><br>
    <select name="subject" class="textbox" id="subject" required>
    	<option value="">---</option>
	</select>
	<br><br>
  <button type="submit" class="btn btn-default" name="submit" >Next &gt;</button>
</form>

    <section style="margin-top:20%;">

        <?php include ('include/footer.php'); ?>

    </section>

</body>
<html>
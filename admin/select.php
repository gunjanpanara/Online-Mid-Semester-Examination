<?php 

/**** Title: Select Branch,Semester & Subject to Generate Paper ****/

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

	<div class="container select-form-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">Paper Generation</h2>
				<p class="text-center">Select Branch, Semester & Subject</p>
				
				<form class="form-horizontal" action="select.php" method="post">
					
					<div class="form-group">
						<label for="branch" class="control-label col-md-3">Branch </label>
						<div class="col-md-5">
							<select name="branch" class="form-control" id="branch" required autofocus>
								<option value="">--Select Branch--</option>
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
					</div>

					<div class="form-group">
						<label for="sem" class="control-label col-md-3">Semester </label>
						<div class="col-md-3">
							<select name="sem" class="form-control col-md-5" id="sem" required>
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
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3">Subject </label>
						<div class="col-md-5">
							<select name="subject" class="form-control" id="subject" required>
								<option value="">--Select Subject--</option>
							</select>
						</div>
					</div>

					<div class="col-md-3 col-md-offset-3">
						<button type="submit" class="btn btn-primary" name="submit">Next</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<?php include ('include/footer.php'); ?>

</body>
<html>
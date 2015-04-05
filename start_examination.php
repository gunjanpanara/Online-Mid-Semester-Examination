<?php include_once 'check_user_session.php'; ?>

<!DOCTYPE HTML>
<html>

<?php include ('include/head.php'); ?>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script language="javascript" type="text/javascript">

	$(document).ready(function(){

		var sem = $('#sem').val();
		var branch = $('#branch').val();
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

	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
</script>

<body>

	<?php include ('include/header.php'); ?>

	<div class="container select-subject-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<form class="form-horizontal" action="examination.php" method="POST">
					<p class="text-center">Hello Students, <span class="text-danger">Are you ready for the examination ?</span> Let's start here!</p>
					<input type="hidden" id="sem" value="<?php echo $_SESSION['user_sem']; ?>">
					<input type="hidden" id="branch" value="<?php echo $_SESSION['user_branch']; ?>">
					
					<div class="form-group">
						<label for="selectSubject" class="control-label col-md-3">Subject </label>
						<div class="col-md-5">
							<select name="subject" class="form-control" id="subject" required>
								<option value="">-- Select Subject --</option>
							</select>
						</div>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-4">
					<button type="submit" name="submit" class="btn btn-primary">Next</button>
				</div>
				</form>
			</div>
		</div>
	</div>

</body>

<?php include ('include/footer.php'); ?>

</html>
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

  <!--/top-->
  <header>
    <h1>Hello Students, <span>Are you ready for the examination ?</span> Let's start here!</h1>
    <h2>&ndash; Examiner &ndash;</h2>
  </header>
<input type="hidden" id="sem" value="<?php echo $_SESSION['user_sem']; ?>">
<input type="hidden" id="branch" value="<?php echo $_SESSION['user_branch']; ?>">
<form action="examination.php" method="POST">
<div class="form-group">
    <label for="" style="color:#F38094;">Subject : </label><br>
    <select name="subject" class="textbox" id="subject" required>
    	<option value="">---</option>
	</select>
</div>
<button type="submit" name="submit" class="btn btn-default">Next</button>
</form>
    <?php include ('include/footer.php'); ?>

</body>
</html>
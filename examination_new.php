<?php include_once 'check_user_session.php'; 
include_once 'oesdb.php';?>

<!DOCTYPE HTML>
<html>

<?php

/*echo '<pre>';
print_r($_SESSION);
echo '</pre>';*/

//$_POST[];
if(isset($_POST['subject']) && !empty($_POST['subject'])){
	$_SESSION['subject'] = $_POST['subject'];
}

foreach ($_SESSION as $key => $value) {
	$$key = $value;
}

//unset($_SESSION['qa']);

if(!isset($_SESSION['qa']) || empty($_SESSION['qa'])){
	$q = "select * from question_gpa where subject = '".$subject."' and branch = '".$user_branch."' and sem = '".$user_sem."' order by RAND() limit 30";
	$res = executeQuery($q);
	$_SESSION['qa'] = array();
	$count = 1;
	while($row = mysql_fetch_array($res)){
		$_SESSION['qa'][$count]['id'] = $row['id'];
		$_SESSION['qa'][$count]['question'] = $row['question'];
		$_SESSION['qa'][$count]['option_a'] = $row['option_a'];
		$_SESSION['qa'][$count]['option_b'] = $row['option_b'];
		$_SESSION['qa'][$count]['option_c'] = $row['option_c'];
		$_SESSION['qa'][$count]['option_d'] = $row['option_d'];
		$_SESSION['qa'][$count]['ans'] = '';
		$count++;
	}
}

if(!isset($_SESSION['current_que']) || empty($_SESSION['current_que'])){
	$_SESSION['current_que'] = 1;
}

/*if(!isset($_GET['que']) || empty($_GET['que'])){
  $current = 1;
} else {
  $current = $_GET['que'];
}*/

?>

<?php include ('include/head.php'); ?>

<head>
	<script type="text/javascript">

		function getPrevQue(){

			var checked_value = $('input[type=radio]:checked').val();
			var current_que = $('#current_que').val();

			$.ajax({
				url: 'submit_que.php',
				type: 'POST',
				data: 'prev=1',
				success: function(data){
					if(data == 1){
						location.reload();
					}
				}
			});

		}

		function getNextQue(){

			var checked_value = $('input[type=radio]:checked').val();
			var current_que = $('#current_que').val();

	  //alert(checked_value);
	  //alert(current_que);

	  $.ajax({
	  	url: 'submit_que.php',
	  	type: 'POST',
	  	data: 'next=1&value='+checked_value+'&current_que='+current_que,
	  	success: function(data){
	  		if(data == 1){
	  			location.reload();
	  		}
	  	}
	  });

	}
</script>

</head>

<body>

	<?php include ('include/header.php'); ?>

	<div class="container examination-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<div class="">
					<h4>
						Q.<?php echo $_SESSION['current_que']; echo '  '; echo $_SESSION['qa'][$_SESSION['current_que']]['question']; ?>
					</h4>
				</div>

				<div class="form-group" id="checkbox_div">

					<div class="row">
						<div class="col-md-5">
							<div class="radio">
								<label>
									<input type="radio" name="answer" value="option_a" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_a') { echo 'checked="checked"'; } ?>>
									<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_a']; ?></span>
								</label>
							</div> 
						</div>

						<div class="col-md-5">
							<div class="radio">
								<label>
									<input type="radio" name="answer" value="option_b" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_b') { echo 'checked="checked"'; } ?>>
									<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_b']; ?></span>
								</label>
							</div> 
						</div>
					</div>

					<div class="row">
						<div class="col-md-5">
							<div class="radio">
								<label>
									<input type="radio" name="answer" value="option_c" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_c') { echo 'checked="checked"'; } ?>>
									<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_c']; ?></span>
								</label>
							</div> 
						</div>

						<div class="col-md-5">
							<div class="radio">
								<label>
									<input type="radio" name="answer" value="option_d" <?php if(!empty($_SESSION['qa'][$_SESSION['current_que']]['ans']) && $_SESSION['qa'][$_SESSION['current_que']]['ans'] == 'option_d') { echo 'checked="checked"'; } ?>>
									<span class="label-text"><?php echo $_SESSION['qa'][$_SESSION['current_que']]['option_d']; ?></span>
								</label>
							</div> 
						</div>
					</div>


				</div>

				<input type="hidden" id="current_que" value="<?php echo $_SESSION['current_que']; ?>" />
				<div class="col-md-6 col-md-offset-3">
					<?php if($_SESSION['current_que'] != 1){ ?>
					<button type="" id="prev_button" onclick="getPrevQue(); return false;" class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i>Previous</button>
					<?php } ?>

					<?php if($_SESSION['current_que'] != 30){ ?>
					<button type="" id="next_button" onclick="getNextQue(); return false;" class="btn btn-primary">Next<i class="fa fa-fw fa-arrow-right"></i></button>
					<?php } ?>
				</div>

			</div>
		</div>
	</div>

	<?php include ('include/footer.php'); ?>

</body>
</html>
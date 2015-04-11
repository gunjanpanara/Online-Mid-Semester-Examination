<html>

<?php include ('include/head.php'); ?>

<?php

include_once 'check_user_session.php'; 
include_once 'oesdb.php';

$res = executeQuery("select * from reg_gpa where id=".$_SESSION['user_id']);
$arr = mysql_fetch_assoc($res);

$total_que = 0;
$right_ans = 0;
foreach ($_SESSION['qa'] as $key => $value) {
	
	
	$qid = $value['id'];
	$q = "select answer from question_gpa where id = ".$qid;
	$res = executeQuery($q);
	$res = mysql_fetch_assoc($res);
	$ans = $res['answer'];

	if($ans == $value['ans']){
		$right_ans++;
	}

	$total_que++;
}

?>

<body>

	<?php include 'include/header.php'; ?>

	<div class="container result-display-container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="card result-details">                  
					<h3 class="card-title text-center">Your Examination Result</h3>
					<div class="result-data">
						<span class="lbl">Name : </span> 
						<span class="data"><?php echo $arr['fname']." ".$arr['lname']; ?></span>
					</div>
					<div class="result-data">
						<span class="lbl">Subject : </span> 
						<span class="data"></span>
					</div>
					<div class="result-data">
						<span class="lbl">Total Questions : </span> 
						<span class="data"><?php echo "$total_que"; ?></span>
					</div>
					<div class="result-data">
						<span class="lbl">Attended Questions : </span> 
						<span class="data"></span>
					</div>
					<div class="result-data">
						<span class="lbl">Right Answers : </span> 
						<span class="data"><?php echo "$right_ans"; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

<?php include 'include/footer.php'; ?>

</html>

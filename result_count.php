<html>

<?php include ('include/head.php'); ?>

<?php

include_once 'check_user_session.php'; 
include_once 'oesdb.php';

$res = executeQuery("select * from reg_gpa where id=".$_SESSION['user_id']);
$arr = mysql_fetch_assoc($res);
$count_atten = 0;
$count=0;
$total_que = 0;
$right_ans = 0;
	while($count<30)
	{
		if(isset($_SESSION['qa'][$count]['ans']) && empty($_SESSION['qa'][$count]['ans']) == false)
		{
			$count_atten++;
		}
		$count++;
	}
	foreach ($_SESSION['qa'] as $key => $value) 
	{	
		$qid = $value['id'];
		$q = "select answer from question_gpa where id = ".$qid;
		$res = executeQuery($q);
		$res = mysql_fetch_assoc($res);
		$ans = $res['answer'];

		if($ans == $value['ans'])
		{
			$right_ans++;
		}

		$total_que++;
	}

$subject = $_SESSION['subject'];
$user_id = $_SESSION['user_id'];
$attend_que = $count_atten;
$obtained_marks = $right_ans;
$exam_date = date('Y-m-d h:i:s');

$res_reg = executeQuery("select * from reg_gpa where id=".$_SESSION['user_id']);
$arr = mysql_fetch_assoc($res_reg);

$branch = $arr['branch'];
$sem = $arr['sem'];

$q = "insert into result_gpa (user_id,branch,sem,subject,attend_que,obtained_marks,exam_date)
	values ($user_id,'$branch',$sem,'$subject',$attend_que,$obtained_marks,'$exam_date')";
	
$res = executeQuery($q);
if (!$res) {
	echo "error inserting result data";
}

unset($_SESSION['qa']);
unset($_SESSION['subject']);
unset($_SESSION['current_que']);

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
						<span class="data"><?php echo "$subject"; ?></span>
					</div>
					<div class="result-data">
						<span class="lbl">Total Questions : </span> 
						<span class="data"><?php echo "$total_que"; ?></span>
					</div>
					<div class="result-data">
						<span class="lbl">Attended Questions : </span> 
						<span class="data"><?php echo "$count_atten"; ?></span>
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

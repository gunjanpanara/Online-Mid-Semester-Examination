<?php include_once 'check_user_session.php'; 
include_once 'oesdb.php';

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

?>

<html>

<?php include ('include/head.php'); ?>

</head>

<body>

	<?php include ('include/header.php'); ?>

	<iframe id="exam_frame" width="100%" height="450" frameborder="0" scrolling="no" src="exam_frame.php"></iframe>

	<?php include ('include/footer.php'); ?>
	<script type="text/javascript" src="js/timeTo.js"></script>
	<script type="text/javascript">
		$(function()
		{
			$('#countdown-1').timeTo(5, function()
			{
				alert('Your examination time is completed.\nYou are Redirecting to Result page.');
				window.location.assign("result_count.php");
			});
		});
	</script>

	</body>
</html>
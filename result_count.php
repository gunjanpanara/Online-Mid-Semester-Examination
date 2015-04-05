<?php

include_once 'check_user_session.php'; 
include_once 'oesdb.php';

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

echo 'Total que:' . $total_que. '<br> Right ans:' . $right_ans;
exit;
?>
<?php include_once 'check_user_session.php'; 
include_once 'oesdb.php';

if(isset($_POST['prev']) && $_POST['prev'] == 1){

	$_SESSION['current_que'] = $_SESSION['current_que'] - 1;

	echo 1;
	exit;

} else if(isset($_POST['next']) && $_POST['next'] == 1 
	&& !empty($_POST['value']) && !empty($_POST['current_que'])){

	$value = $_POST['value'];

	if($value == '' || $value == 'undefined'){
		$value = '';
	}
	
	$current_que = $_POST['current_que'];
	$_SESSION['qa'][$current_que]['ans'] = $value;
	$_SESSION['current_que'] = $_SESSION['current_que'] + 1;
	
	echo 1;
	exit;
}

?>
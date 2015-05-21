<?php

/**** Title: Check Examiner Login/Session ****/

	session_start();
	if(!isset($_SESSION['examiner_id']) || $_SESSION['examiner_id'] == ''){
		header('location: login.php');
	}
?>
<?php
include_once 'oesdb.php';

function sanitize($data)
{
	return mysql_real_escape_string($data);
}
function user_active($id)
{
	$id=sanitize($id);
$res=executeQuery("select * from reg_gpa where id=$id AND active=1");
	return 
	(mysql_num_rows($res)>0)?true:false;
}
function email_exists($mail)
{
	$mail=sanitize($mail);
$res=executeQuery("select * from reg_gpa where email='$mail'");
	return (mysql_num_rows($res)>0)?true:false;
}
?>

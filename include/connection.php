<?php
if($_SERVER['HTTP_HOST'] == '192.168.4.163'){
	$conn = mysql_connect('localhost','root','root');
} else {
	$conn = mysql_connect('localhost','root','');
}
$db=mysql_select_db('oes_gpa');
?>
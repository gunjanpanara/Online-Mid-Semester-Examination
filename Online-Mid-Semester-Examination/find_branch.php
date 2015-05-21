<?php

include ('include/connection.php');
	
if(!$conn)
{
	die('connection error..');
}

mysql_select_db('oes_gpa');



$branch = ucwords(strtolower($_POST['branch']));

$sql = "select * from branch where subject = '".$branch."'";
$res = mysql_query($sql,$conn);

$html = '';

$html .= '<option value="">--- Select Branch ---</option>';
while($row=mysql_fetch_array($res)){
	$subject = $row['branch'];
	$html .= '<option value="'.$subject.'">'.$subject.'</option>';
}

echo json_encode($html);
exit;


?>
<?php 

include_once 'oesdb.php';

$query = "select * from download";

if(isset($_REQUEST['submit']))

switch ($semester) {
	case 'sem1':
		echo ?><button type="button" class="btn btn-default btn-lg btn-block">Download Semester - 1, Syllabus</button><?php;
		echo ?>Download Semester - 1, Previous Examination Papers<?php;
		break;
	case 'sem2':
		echo ?>"Download Semester - 2, Syllabus"<?php;
		echo ?>"Download Semester - 2, Previous Examination Papers"<?php;
		break;

	default:
		echo "Content Not Available..";
		break;
}


?>
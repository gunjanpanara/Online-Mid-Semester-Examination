<?php 
if(isset($_GET['id']))
{
include_once 'oesdb.php';

$id = $_GET['id'];
$query = "SELECT name, type, size, path FROM upload_gpa WHERE id = '$id'";
$result = executeQuery($query) or die('Error, query failed');
$row = mysql_fetch_array($result);
$name=$row['name'];
$size=$row['size'];
$type=$row['type'];
$filePath=$row['path'];
header("Content-Disposition: attachment; filename=$name");
header("Content-length: $size");
header("Content-type: $type");

readfile($filePath);

exit;
}
?>

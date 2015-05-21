<?php 

if(isset($_POST['upload']) && $_FILES['fname']['size']>0)
{
$fileName=$_FILES['fname']['name'];
$tmpName=$_FILES['fname']['tmp_name'];
$fileSize=$_FILES['fname']['size'];
$fileType=$_FILES['fname']['type'];

$uploadDir = 'C:\wamp\www\Online-Mid-Semester-Examination\studyMaterial/';

$filePath = $uploadDir . $fileName;

$result = move_uploaded_file($tmpName, $filePath);
if (!$result) {
echo "Error uploading file";
exit;
}

include_once ('check_user_session.php');
include_once ('oesdb.php');

if(!get_magic_quotes_gpc())
{
$fileName = addslashes($fileName);
$filePath = addslashes($filePath);
}

$query = "INSERT INTO upload_gpa (name, size, type, path ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$filePath')";

executeQuery($query) or die('Error, query failed : ' . mysql_error());


echo "<br>Files uploaded<br>";

}
?>
<html>
<?php include ('include/head.php'); ?>

<body>
    <?php include ('include/header.php'); ?>

<div class="container studystore-container">
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
			<h3 class="text-center">Upload Examination Material</h3><br>
			<form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-md-3">Select File to Upload</label>
                    <div class="col-md-5">
                        <input type="file" name="fname" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-3">
	                        <button type="submit" class="btn btn-primary" name="upload" value="Upload">Upload</button>
	                    </div>
                    </div>
				</div>
            </form>
        </div>
	</div>
</div>

</body>

    <?php include ('include/footer.php'); ?>

</html>

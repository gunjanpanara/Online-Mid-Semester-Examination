<!DOCTYPE html>
<html>
<?php
	include ('include/head.php');
?>
<body>

	<?php include ('include/header.php'); ?>

	<div class="container studystore-container">
		<div class="row">
			<div class="col-md-12">
			<h3 class="text-center">Download Examination Material</h3>
				<?php 

				/**** Title: Study Material ****/

				include_once 'oesdb.php';
				$query = "SELECT id, name FROM upload_gpa";
				$result = executeQuery($query) or die('Error, query failed');
				if(mysql_num_rows($result) == 0)
				{
					echo "Database is empty <br>";
				} 
				else
				{
					while(list($id, $name) = mysql_fetch_array($result))
					{
					?>

					<div class="col-md-8 col-md-offset-2">
		            <div class="card personal-details">                  
    					<a href="download.php?id=<?php=$id;?>">
        					<span class="lbl">Download</span> <span class="data"><?php echo $name ?></span><hr>
    					</a>
    				</div>
    				</div>
    				
					<?php 
					}
				}
				?>
			</div>
		</div>
	</div>
</body>

<?php include ('include/footer.php'); ?>

<html>
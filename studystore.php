<!DOCTYPE html>
<html>

<?php 

/**** Title: Study Material ****/

include ('include/head.php');
include ('include/connection.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

    <div class="container studystore-container">
    	<div class="row">
    		<div class="col-md-12">
				<h3 class="text-center">Download Examination Material</h3><br>
                
                <form class="form-horizontal" role="form" action="download.php" method="POST">

                <div class="form-group">
                    <label class="control-label col-md-3 col-md-offset-2">Select Semester</label>
                    <div class="col-md-3">
                        <select class="form-control" autofocus required>
                            <option value="">- - Select Semester - -</option>
                            <option value="sem1">Semester - 1</option>
                            <option value="sem2">Semester - 2</option>
                            <option value="sem3">Semester - 3</option>
                            <option value="sem4">Semester - 4</option>
                            <option value="sem5">Semester - 5</option>
                            <option value="sem6">Semester - 6</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2 col-md-offset-5">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
    		</div>
    	</div>
    </div>

</body>

    <?php include ('include/footer.php'); ?>

<html>
<!DOCTYPE html>
<html>

<?php 

/**** Title: Upload Study Material ****/

include ('include/head.php');
include ('include/connection.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

    <div class="container studystore-container">
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">
				<h3 class="text-center">Upload Examination Material</h3><br>

                <form action="download.php">
                    <div class="form-group">
                        <label class="control-label col-md-3">Select File to Upload</label>
                        <div class="col-md-5">
                            <input type="file" name="fileUpload" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                            </div>
                        </div>

                        </div>
                    </div>
                </form>

    		</div>
    	</div>
    </div>

</body>

    <?php include ('include/footer.php'); ?>

<html>
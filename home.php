<?php 
error_reporting(0);
include_once ('check_user_session.php');
include_once ('oesdb.php');

$res = executeQuery("select * from reg_gpa where id=".$_SESSION['user_id']);
$arr = mysql_fetch_assoc($res);

?>

<html>

<?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php');

    if($_GLOBALS['message']) 
    {
        echo "<div class=\"message col-md-8 col-md-offset-2 alert alert-success\">".$_GLOBALS['message']."</div>";
    }
    
    ?>

    <div class="container home-container">
        <div class="row">
            <?php if(isset($_GET['edit']) && isset($_GET['edit'])=='yes')
            {?>
            <p class="text-center col-md-8 col-md-offset-2 alert alert-success">Profile Updated Successfully</p>
            <?php } ?>

            <div class="col-md-8 col-md-offset-2">
                <div class="card personal-details">                  
                    <h3 class="card-title text-center"><?php echo "Welcome, ".$arr['fname']." ".$arr['lname']; ?></h3>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <a class="tile" href="edit.php">
                                <i class=" fa fa-3x fa-user"></i>
                                <span>Update Profile</span>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="tile" href="result.php">
                                <i class="fa fa-3x fa-list-alt"></i>
                                <span>Examination Results</span>
                            </a>
                        </div>
                    </div>

                    <a href="edit.php">
                        <span class="lbl">Username</span> <span class="data"><?php echo $arr['fname']." ".$arr['lname']; ?></span>
                    </a>
                    <a href="edit.php">
                        <span class="lbl">Gender</span> <span class="data"><?php echo $arr['gender']; ?></span>
                    </a>
                    <a href="edit.php">
                        <span class="lbl">Branch</span> <span class="data branch-display">
                            <?php
                            if($arr['branch'] == 'automobile') { echo "Auto Mobile Engineering"; }
                            else if($arr['branch'] == 'biomedical') { echo "Bio Medical Engineering";}
                            else if($arr['branch'] == 'civil') { echo "Civil Engineering"; }
                            else if($arr['branch'] == 'computer') { echo "Computer Engineering"; }
                            else if($arr['branch'] == 'electrical') { echo "Electrical Engineering"; }
                            else if($arr['branch'] == 'ec') { echo "Electronics & Communication Engineering"; }
                            else if($arr['branch'] == 'it') { echo "Information Technology"; }
                            else if($arr['branch'] == 'ic') { echo "Instrumention & Control Engineering"; }
                            else if($arr['branch'] == 'mechanical') { echo "Mechanical Engineering"; }
                            else if($arr['branch'] == 'plastic') { echo "Plastic Engineering"; }
                            else{}
                            ?>
                        </span>
                    </a>


                    <a href="edit.php">
                        <span class="lbl">Semester</span> <span class="data"><?php echo $arr['sem']; ?></span>
                    </a>
                    <a href="edit.php">
                        <span class="lbl">E-Mail</span> <span class="data email-display"><?php echo $arr['email']; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include ('include/footer.php'); ?>

</body>
</html>
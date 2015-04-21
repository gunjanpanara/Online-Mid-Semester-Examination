<!DOCTYPE html>
<html>

<?php 

/**** Title: Display Examination Results ****/

include ('include/head.php');
include ('include/connection.php');
include ('check_user_session.php');
include ('oesdb.php');

$res = executeQuery("select * from result_gpa where user_id=".$_SESSION['user_id']);
$arr = mysql_fetch_assoc($res);

?>

<body>

    <?php include ('include/header.php'); ?>

    <div class="container result-container">
        <div class="container">
        <div class="row-fluid">

            <div class="span9">
                <div class="hero-unit-3">

                    <div class="row-fluid">
                        <div class="span12">
                            <div class="hero-unit-3">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                    <div class="alert alert-info">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong><i class="icon-user icon-large"></i>&nbsp;Results</strong>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Subject Name</th>
                                            <th>Total Questions</th>
                                            <th>Attended Questions</th>
                                            <th>Result</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                            while ($row = mysql_fetch_array($res)) {
                                            $id = $row['id'];
                                        ?>

                                        <!-- script -->
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                    
                                                $('#e<?php echo $id; ?>').tooltip('show')
                                                $('#e<?php echo $id; ?>').tooltip('hide')
                                            });
                                        </script>
                                        <!-- end script -->
                                        <!-- script -->
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                    
                                                $('#d<?php echo $id; ?>').tooltip('show')
                                                $('#d<?php echo $id; ?>').tooltip('hide')
                                            });
                                        </script>
                                        <!-- end script -->

                                        <?php
                                          /*  if($row['filetype'] == 'doc' || $row['filetype'] == 'docx'){
                                                $image = 'admin/img/docx.png';
                                            } else if($row['filetype'] == 'pdf'){
                                                $image = 'admin/img/pdf.png';
                                            } else if($row['filetype'] == 'ppt' || $row['filetype'] == 'pptx'){
                                                $image = 'admin/img/pptx.png';
                                            } else if($row['filetype'] == 'xls' || $row['filetype'] == 'xlsx'){
                                                $image = 'admin/img/xls.png';
                                            }
*/
                                           /* $branch_id = $row['branch_id'];
                                            $q = 'select name from branch where id = '.$branch_id;
                                            $data = mysql_query($q);
                                            $branch_name = mysql_fetch_assoc($data);
*/                                        ?>

                                        <tr class="odd gradeX">
                                            <td width="40"><?php echo $count; ?></td>
                                            <td><?php echo $row['subject']; ?></td>
                                            <td>30</td>
                                            <td><?php echo $row['obtained_marks']; ?></td>
                                            <td><?php echo $row['attend_que']; ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($row['exam_date'])); ?></td>
                                        </tr>
                                    <?php $count++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- end slider -->
            </div>

        </div>
    </div>
    </div>

</body>

    <?php include ('include/footer.php'); ?>

<html>
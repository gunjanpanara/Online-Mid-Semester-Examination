<?php include_once 'check_user_session.php'; ?>
<!DOCTYPE HTML>
<html>

    <?php include ('include/head.php'); ?>

<body>
    <!-- change header while examination.php, display only logout link -->
    <?php include ('include/header.php'); ?>

<form action="" method="POST" style="border:2px solid #a1a1a1; min-height:50%; margin-top:10px; padding:20px 50px;
    background: #dddddd;
    border-radius: 5px;">

  <h4 style="font-weight: 500; word-spacing: 5px; line-height:25px;">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </h4>

  <div class="form-group">
    <style type="text/css">
    label{
      font-weight: 800;
    }
    input radio{
      font-weight: 800;
      font-size: 20px;
    }
    </style>
    <label for="" style="color:#F38094;">Answer : </label> &nbsp;
    <input type="radio" name="answer" value="option_a" id="" /> A &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="answer" value="option_b" id="" /> B &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="answer" value="option_c" id="" /> C &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="answer" value="option_d" id="" /> D
  </div>

  <button type="" class="btn btn-default">&lt; Previous</button>
  <button type="" class="btn btn-default">Next &gt;</button>


</form>

    <?php include ('include/footer.php'); ?>

</body>
</html>
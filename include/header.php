<!DOCTYPE HTML>
<html>
<head>
  <title>Online Mid-Semester Examination System | Government Polytechnic, Ahmedabad</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
</head>

<body>
<div class="wrapper">
  <div id="top" class="clearfix">
    <div id="logo">
      <?php if(isset($_SESSION['user_id'])){ ?>
        <a href="home.php"><img id="logoimage" src="images/logo.png" alt="GP, Ahmedabad"></a>
      <?php } else { ?>
        <a href="index.php"><img id="logoimage" src="images/logo.png" alt="GP, Ahmedabad"></a>
      <?php } ?>
    </div>
      <nav>
        <ul class="nav nav-pills" role="tablist">
          <?php if(isset($_SESSION['user_id'])){ ?>
            <li><a href="home.php">Home</a></li>
          <?php } else { ?>
            <li><a href="index.php">Home</a></li>
          <?php } ?>
          <li><a href="studystore.php">Study Store</a></li>
          <?php if(isset($_SESSION['user_id'])){ ?>
            <li><a href="edit.php">Update Profile</a></li>
            <li><a href="result.php">Result</a></li>
            <li><a href="logout.php">Logout</a></li>
          <?php } else { ?>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>

</body>
</html>
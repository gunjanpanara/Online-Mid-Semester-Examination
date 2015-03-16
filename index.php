<!DOCTYPE HTML>
<html>

    <?php include ('include/head.php'); ?>

<body>

    <?php include ('include/header.php'); ?>

  <!--/top-->
  <header>
    <h1>Hello Students, <span>Are you ready for the examination ?</span> Let's start here!</h1>
    <h2>&ndash; Examiner &ndash;</h2>
  </header>
  <!-- /header -->
  <section id="slideshow">
    <div class="html_carousel">
      <div id="slider" class="clearfix">
        <!-- Image size 1200px wide and 313px high or the same ratio -->
        <div class="slide"> <img src="images/slideshow/sliderimage1.jpg" title="Main Building at Government Polyetchnic, Ahmedabad" alt="Image of Main Building at Government Polytechnic, Ahmedabad"> </div>
      </div>
    </div>
  </section>
  <!-- /section -->
  <aside id="about" class="left">
    <h3>Examination Procedure</h3>
    <p>
      1. <a href="login.php">Log In</a>/<a href="register.php">Registration (if new user)</a><br>
      2. Select Proper Criteria<br>
      3. Read 'Examination Rules & Guidelines'<br>
      4. Click on "Start" for Examination
    </p>
  </aside>
  <!-- /aside -->
  <aside class="right">
    <h3>about us</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </aside>
</div>

<footer id="footer" class="clearfix">

    <form id="reg_form" action="#" method="POST" role="form" style="margin-left:10%;">
      <div class="form-group">
        <label for="" style="color:#F38094;">Name</label>
        <input type="text" class="form-control textbox" id="" placeholder="Name">
      </div>
      <div class="form-group">
        <label style="color:#F38094;">Email*</label>
        <input type="email" class="form-control textbox" id="" placeholder="e-mail" required/>
      </div>
      <div class="form-group">
        <label style="color:#F38094;">Message* : </label><br>
      <textarea rows="4" cols="25" class="textbox" name="message" required></textarea>
      </div>
      <button type="submit" class="btn btn-default" >Submit</button>
    </form>

    <section class="right social clear" style="margin-right:10%;">
      <!-- Replace with any 32px x 32px icons -->
      <a href="#"><img class="icon" src="images/icons/google.png" alt=""></a> 
      <a href="#"><img class="icon" src="images/icons/youtube.png" alt=""></a> 
      <a href="#"><img class="icon" src="images/icons/twitter.png" alt=""></a>
      <a href="#"><img class="icon" src="images/icons/facebook.png" alt=""></a> 
    </section>

    <?php include ('include/footer.php'); ?>

</footer>
</body>
</html>
<?php

/**** Title: Header/Navigation Pane ****/

$filepage = explode('/',$_SERVER['REQUEST_URI']);
$filepage = end($filepage);
?>
<header class="main-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="home.php"><img src="images/logo.png" class="main-logo" alt="Government Polytechnic Logo Image"></a>
			</div>
			<div class="col-md-8">
				<ul class="nav nav-pills pull-right main-nav" role="tablist">
					<?php if(isset($_SESSION['user_id'])) {
						if($filepage != 'examination.php'){ ?>
							<li><a href="home.php"><i class="fa fa-home fa-fw"></i> Home</a></li>
							<li><a href="result.php"><i class="fa fa-home fa-fw"></i> Result</a></li>
							<li><a href="start_examination.php"><i class="fa fa-table fa-fw"></i> Start Examination</a></li>
							<li><a href="logout.php"> <i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
						<?php } else { ?>
							<li><a href="result_count.php" id="endExamBtn"> <i class="fa fa-user fa-fw"></i> End-Exam</a></li>						
							<li><a href="logout.php"> <i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
						<?php }
					} else { ?>
						<li><a href="home.php"><i class="fa fa-home fa-fw"></i> Home</a></li>
						<li><a href="studystore.php"><i class="fa fa-file-archive-o fa-fw"></i> Study Store</a></li>
						<li><a href="register.php"><i class="fa fa-user fa-fw"></i> Register</a></li>
						<li><a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
					<?php } ?>

				</ul>
				<div id="clockcontainer">
					<div id="countdown-1"></div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- <script type="text/javascript" src="js/script.js"></script> -->
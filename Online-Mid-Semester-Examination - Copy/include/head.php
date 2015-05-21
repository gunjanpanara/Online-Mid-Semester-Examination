<?php

/**** Title: Head/Link External Files ****/

$filepage = explode('/',$_SERVER['REQUEST_URI']);
$filepage = end($filepage);
?>
<link rel="icon" href="images/favicon.png">

	<title>Online Mid-Semester Examination System | Government Polytechnic, Ahmedabad</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">

<!-- css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/timeTo.css">

<!-- JS -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<?php if($filepage != 'register.php'){ ?>

<script type="text/javascript" src="js/validate.js" ></script>

<?php } ?>
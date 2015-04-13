<?php

/*
***************************************************
*** Online Mid-Examination System               ***
***---------------------------------------------***
*** Title: Database Settings                    ***
***************************************************
*/

//This is the name of your server where the MySQL database is running
$dbserver="localhost";

//username of the MySQL server
$dbusername="root";

//password
if($_SERVER['HTTP_HOST'] == '192.168.4.163'){
	$dbpassword="root";
} else {
	$dbpassword="";
}

//database name of the online Examination system
$dbname="oes_gpa";

?>

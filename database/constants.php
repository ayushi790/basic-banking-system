<?php
define('SITEURL','http://localhost/banking_system/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','banking_system');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  //Database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());  //Database selection

?>
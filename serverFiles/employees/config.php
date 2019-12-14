<?php
// Code adapted from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
// Terms of use: https://www.tutorialrepublic.com/terms-of-use.php

/* Define the database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'adminEC521');
define('DB_NAME', 'teslaEC521');
 
/* Try to connect to the database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
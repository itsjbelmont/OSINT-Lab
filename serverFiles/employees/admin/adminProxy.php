<?php
/*  proxy to manage files for the admin
*   admin files in ./files/ are denied to everyone by a .htaccess
*
*   This script sends out ./files/afile if the admin requests it
*/

/* Initialize the session */
session_start();

/* variables */
$fp = null;
$proxiedDirectory = "./files/"; 
$filename = isset($_GET["file"])?$_GET["file"]:"adminMenu.html";

 
/* Check if the user is logged in, if not then deny access */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include("/var/www/html/errors/error403.html");
    http_response_code(403);
    exit;
}

/* Make sure the logged in user is the admin */
if (strcmp($_SESSION["username"], "admin") == 0) {

    /* Make sure that the user is looking for a real file */
    if (!file_exists($proxiedDirectory.$filename)) {
        include("/var/www/html/errors/error404.html");
        http_response_code(404);
        exit;
    }

    /* Include the requested file for the admin */
    include($proxiedDirectory.$filename);
} else {

    /* Deny accesss to other users */
    include("/var/www/html/errors/error403.html");
    http_response_code(403);
    exit;
}


?>


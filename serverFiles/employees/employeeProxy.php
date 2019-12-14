<?php
/*  proxy to manage files for the admin
*   admin files in ./files/ are denied to everyone by a .htaccess
*
*   This script sends out ./files/afile if the user requests it
*/

/* Initialize the session */
session_start();

/* variables */
$fp = null;
$proxiedDirectory = "./employeeFiles/"; 
$username = $_SESSION["username"];
$filename = isset($_GET["file"])?$_GET["file"]:"welcome.php";

 
/* Check if the user is logged in, if not then deny access */
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include("/var/www/html/errors/error403.html");
    http_response_code(403);
    exit;
}

/* If the logged in user is the admin he should be directed through the admin proxy */
if (strcmp($username, "admin") == 0) {
    header("location: ./admin/adminProxy.php");
} else {
    /* Make sure that the user is looking for a real file */
    if (!file_exists($proxiedDirectory.$filename)) {
        include("/var/www/html/errors/error404.html");
        http_response_code(404);
        exit;
    }

    /* Provide the users welcome file */
    if ($filename == "welcome.php") {
        include($proxiedDirectory.$filename);
    } else {
        /* User should only be able to access their own files */
        $pathSplit = explode('/', $filename);
        if ($pathSplit[0] == $username) {

            $fileTypeSplit = explode('.', $filename);
            if (end($fileTypeSplit) === "txt" || end($fileTypeSplit) === "csv") {
                $fileContents = file_get_contents($proxiedDirectory.$filename);
                echo  nl2br($fileContents);
            } else {
                include($proxiedDirectory.$filename);
            }
        } else {
            /* If they tried to access a file that doesnt belong to them then break out */
            include("/var/www/html/errors/error403.html");
            http_response_code(403);
            exit;
        }
    }

}


?>



<!DOCTYPE html>
    <head>

    </head>
    <body>

    </body>

</html>



















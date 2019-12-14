<?php
    /* Initialize the session */
    session_start();

    /* Variables */
    $proxiedDirectory = "./employeeFiles/"; 
    $username = $_SESSION["username"];
    $filename;

    /* Make sure a filename was specified */
    if (!isset($_GET["file"])) {
        include("/var/www/html/errors/error404.html");
        http_response_code(404);
        exit;
    } else {
        $filename = $_GET["file"];
    }

    /* Check if the user is logged in, if not then deny access */
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        include("/var/www/html/errors/error403.html");
        http_response_code(403);
        exit;
    }

    /* Make sure that the user is looking for a real file */
    if (!file_exists($proxiedDirectory.$filename)) {
        include("/var/www/html/errors/error404.html");
        http_response_code(404);
        exit;
    }

    /* User should only be able to download their own files */
    $pathSplit = explode('/', $filename);
    if ($pathSplit[0] !== $username) {
         /* If they tried to access a file that doesnt belong to them then break out */
         //include("/var/www/html/errors/error403.html");
         http_response_code(403);
         exit;
    } else {
        /* Download the file */
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($proxiedDirectory.$filename).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($proxiedDirectory.$filename));
        flush(); // Flush system output buffer
        readfile($proxiedDirectory.$filename);
        header("location: employeeProxy.php");
    }

?>
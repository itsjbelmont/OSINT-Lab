<?php
/*
    Landing page when you log in to an account

    Display all of the files the users directory

    Note: Links must be realative to /var/www/html/employees/employeefiles/employeeProxy.php
*/

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then deny access
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    readfile("/var/www/html/errors/error403.html");
    http_response_code(403);
    exit;
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css">
        body{ font: 14px sans-serif;}
    </style>
</head>
<body>
    <center>
        <div class="page-header">
            <h1>Hi, <b><?php echo $_SESSION["username"]; ?></b>. Welcome to your personal portal.</h1>
        </div>
        <p>
            <!-- <a href="./employeeFiles/resetPassword.php" class="btn btn-warning">Reset Password</a> -->
            <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </p>
    </center>
    <br>
    <HR>
    <br>
    <?php
        $username = $_SESSION["username"];
        $proxiedDirectory = "employeeFiles/".$username;
        
        /* Display the logged in employees files */
        function recursiveReadDir($dir) {
            /* Read the directory */
            $files = scandir($dir);

            /* Get links to the users files */
            for ($i = 0; $i < count($files); $i++) {
                if ($files[$i] == "." || $files[$i] == "..") {
                    continue;
                }

                $linkDir = ltrim($dir, "employeeFiles/");

                if (is_dir($dir."/".$files[$i])) {
                    recursiveReadDir($dir."/".$files[$i]);
                } else {
                    /* Display the link and a download button for the file */
                    echo "<input type=\"button\" onclick=\"location.href='./download.php?file=$linkDir/$files[$i]';\" value=\"Download File\" /> <a href=\"./employeeProxy.php?file=$linkDir/$files[$i]\">$linkDir/$files[$i]</a> <br>";
                }
            }
        }

        recursiveReadDir($proxiedDirectory);
        



    ?>
</body>
</html>
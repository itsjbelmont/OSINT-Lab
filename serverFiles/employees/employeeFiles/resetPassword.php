<?php
// Code adapted from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
// Terms of use: https://www.tutorialrepublic.com/terms-of-use.php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

/* FOR SQL Error checking */
$sql_status = "";
 
// Processing form data on submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE employees SET password = ? WHERE id = ?";

        $sql_status = "password reset will commence";
        
        if($stmt = mysqli_prepare($link, $sql)){
            $sql_status = "SQL statement prepared";

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $sql_status = "Password updated successfully";
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                $sql_status = "Oops! Something went wrong with the login!"; 
            }
        } else {
            $sql_status = "Could not prepare sql statement";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ max-width: 500px; padding: 20px; }
    </style>
</head>
<body>
    <center>
        <div class="wrapper">
            <h2>Reset Your Password</h2>
            <p>Fill out the following form</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm New Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a class="btn btn-link" href="welcome.php">Cancel</a>
                </div>
            </form>
            <br>
            <HR>
            <br>
            <p> <B>Form Errors:</B> </p>
            <p> <?php echo $new_password_err; ?> </p>
            <p> <?php echo $confirm_password_err; ?> </p>
            <p> <B>Reset Status:</B> <?php echo $sql_status; ?> </p>
        </div>    
    </center>
</body>
</html>
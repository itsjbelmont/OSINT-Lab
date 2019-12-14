<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ 
            max-width: 700px;
            margin-right: auto;
            margin-left: auto;
            padding-right: 20px; 
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form 
            action="<?php
                // Code adapted from https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
                // Terms of use: https://www.tutorialrepublic.com/terms-of-use.php


                // Include config file
                require_once "/var/www/html/employees/config.php";
                
                // Define variables and initialize with empty values
                $username = $password = $confirm_password = "";
                $username_err = $password_err = $confirm_password_err = "";
                $newUserStatus = "Could not create new user.";
                
                // Processing form data when form is submitted
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                    // Validate username
                    if(empty(trim($_POST["username"]))){
                        $username_err = "Please enter a username.";
                    } else{
                        // Prepare a select statement
                        $sql = "SELECT id FROM employees WHERE username = ?";
                        
                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "s", $param_username);
                            
                            // Set parameters
                            $param_username = trim($_POST["username"]);
                            
                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                /* store result */
                                mysqli_stmt_store_result($stmt);
                                
                                if(mysqli_stmt_num_rows($stmt) == 1){
                                    $username_err = "This username is already taken.";
                                } else{
                                    $username = trim($_POST["username"]);
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        }
                        
                        // Close statement
                        mysqli_stmt_close($stmt);
                    }
                    
                    // Validate password
                    if(empty(trim($_POST["password"]))){
                        $password_err = "Please enter a password.";     
                    } elseif(strlen(trim($_POST["password"])) < 6){
                        $password_err = "Password must have atleast 6 characters.";
                    } else{
                        $password = trim($_POST["password"]);
                    }
                    
                    // Validate confirm password
                    if(empty(trim($_POST["confirm_password"]))){
                        $confirm_password_err = "Please confirm password.";     
                    } else{
                        $confirm_password = trim($_POST["confirm_password"]);
                        if(empty($password_err) && ($password != $confirm_password)){
                            $confirm_password_err = "Password did not match.";
                        }
                    }
                    
                    // Check input errors before inserting in database
                    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                        
                        // Prepare an insert statement
                        $sql = "INSERT INTO employees (username, password) VALUES (?, ?)";
                        
                        if($stmt = mysqli_prepare($link, $sql)){
                            // Bind variables to the prepared statement as parameters
                            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
                            
                            // Set parameters
                            $param_username = $username;
                            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                            
                            // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                $newUserStatus = "Created new user with username=$username and password=$password hash=$param_password";
                            } else{
                                echo "Something went wrong. Please try again later.";
                            }
                        }
                        
                        // Close statement
                        mysqli_stmt_close($stmt);
                    }
                    
                    // Close connection
                    mysqli_close($link);
                }
            ?>" 
            method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
        <br>
        <p> <B>Status: </B> <?php echo $newUserStatus ?> </p>
        <br>
        <HR>
        <br>
        <p> <B>Form Errors:</B> </p>
        <p> <?php echo $username_err; ?> </p>
        <p> <?php echo $password_err; ?> </p>
        <p> <?php echo $confirm_password_err; ?> </p>
    </div>    
</body>
</html>
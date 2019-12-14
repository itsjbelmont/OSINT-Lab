<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ max-width: 500px; padding: 20px; }
    </style>
</head>
<body>
    <center>
        <H1>Forgot password for: <?php echo isset($_GET["username"])?$_GET["username"]:"Please try to log in with the user first!"; ?></H1>
        <p> 
            <B>Hint: </B>
            <!-- We need to use php to pull the question out of the database -->
            <?php 
                /* Include the config file */
                require_once "config.php";

                /* Variables */
                $username = isset($_GET["username"])?$_GET["username"]:"";
                $question = "";
                $sql = "";
                $stmt = null;
                $param_username = "";

                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    header("location: employeeProxy.php");
                    exit;
                }


                /* Check if username is empty */
                if (strcmp($username, "") == 0) {
                    echo "ERROR GETTING THE RECOVERY QUESTION! -> You need to try logging in on the previous page first.";
                    exit();
                }

                /* Prepare the SQL Statement to grab the recovery question */
                $sql = "SELECT question FROM employees WHERE username = ?";
                
                if ($stmt = mysqli_prepare($link, $sql)) {
                    
                    /* Bind and set the parameters */
                    mysqli_stmt_bind_param($stmt, "s", $param_username);
                    $param_username = $username;

                    /* Execute the sql command */
                    if (mysqli_stmt_execute($stmt)) {

                        /* Store the results */
                        mysqli_stmt_store_result($stmt);

                        /* Check if we got a result */
                        if (mysqli_stmt_num_rows($stmt) == 1) {

                            /* Bind results */
                            mysqli_stmt_bind_result($stmt, $question);

                            /* Get the results */
                            if (mysqli_stmt_fetch($stmt)) {
                                if (strcmp($question, "") == 0) {
                                    echo "user does not have this feature";
                                } else {
                                    echo $question;
                                }
                            }
                        } else {
                            echo "Could not get question - Error: did not get exactly 1 row returned for $username";
                        }
                    } else {
                        echo "Could not get question - Error: could not execute the sql statement";
                    }
                } else {
                    echo "Could not get question - Error: could not prepare statement";
                }

                mysqli_stmt_close($stmt);

                mysqli_stmt_close($link);
            ?>
        </p>
        <div class="wrapper">
            <form action="<?php

                /* Make sure we have database connection set up */
                require_once "config.php";

                /* Variables */
                $answer = "";
                $answer_verify = "";
                $username = isset($_GET["username"])?$_GET["username"]:"";
                $param_username;
                $sql = "";
                $stmt = null;
                $err = "";
                
                /* Only do action when we get the post request */
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    /* Check if username is empty from the GET request */
                    if (strcmp($username, "") == 0) {
                        header("location: login.php");
                    }

                    /* Check if answer is empty from the POST request */
                    if (empty(trim($_POST["answer"]))) {
                        $err = "Please answer the hint";
                    } else {
                        $answer = trim($_POST["answer"]);
                    }

                    /* Prepare the SQL Statement to grab the recovery question */
                    $sql = "SELECT answer FROM employees WHERE username = ?";
                    
                    if ($stmt = mysqli_prepare($link, $sql)) {
                        
                        /* Bind and set the parameters */
                        mysqli_stmt_bind_param($stmt, "s", $param_username);
                        $param_username = $username;

                        /* Execute the sql command */
                        if (mysqli_stmt_execute($stmt)) {

                            /* Store the results */
                            mysqli_stmt_store_result($stmt);

                            /* Check if we got a result */
                            if (mysqli_stmt_num_rows($stmt) == 1) {

                                /* Bind results */
                                mysqli_stmt_bind_result($stmt, $answer_verify);

                                /* Get the results */
                                if (mysqli_stmt_fetch($stmt)) {
                                    if (strcmp($answer_verify, "") == 0) {
                                        $err = "user does not have this feature";
                                    } else {
                                        if (password_verify($answer, $answer_verify)) {
                                            /* Log them in!! */
                                            session_start();
                                            $_SESSION["loggedin"] = true;
                                            $_SESSION["id"] = $id;
                                            $_SESSION["username"] = $username;

                                            header("location: employeeProxy.php");
                                        } else {
                                            $err = "Incorrect answer";
                                        }
                                        
                                    }
                                }
                            } else {
                                $err = "Could not get question - Error: did not get exactly 1 row returned for $username";
                            }
                        } else {
                            $err = "Could not get question - Error: could not execute the sql statement";
                        }
                    } else {
                        $err = "Could not get question - Error: could not prepare statement";
                    }

                    mysqli_stmt_close($stmt);

                    mysqli_stmt_close($link);

                }
            
            ?>" 
            method="post">
                answer: <input type="text" name="answer"><br>
                <input type="submit" value="Submit">
            </form> 
            <br>
            <p> <B>Errors: </B><?php echo $err?> </p>
        </div>    
    </center>
</body>
</html>
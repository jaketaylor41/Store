<?php

require_once 'db_connector.php';
session_start();

if ($connection) {
    $attemptedLoginName = addslashes($_POST['usernameInput']);
    $attemptedPassword = addslashes($_POST['passwordInput']);

    $sql_statement = "SELECT * FROM `USERS` 
        WHERE `USERNAME` = '$attemptedLoginName' 
        AND `PASSWORD` = '$attemptedPassword' LIMIT 1";
    $result = mysqli_query($connection, $sql_statement);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            //echo "Login successful<br>";
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['USERNAME'];
            $_SESSION['userid'] = $row['ID'];
            header('Location: index.php');
        }
        else {
            echo "<p>Something is not right. Check your username and password.<br>
                  Click to go back to <a href='showLoginForm.php'>Log In Page</a>.<p>";
            exit;
        }
    }
    else {
        echo "error" . mysqli_error($connection);
        exit;
    }
}
else {
    echo "Error connecting " . mysqli_connect_errno();
    exit;
}
?>

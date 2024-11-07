<?php
ob_start();

require_once 'dbconnection/connection.php';

session_start();

// Function to log failed login attempts
function logFailedAttempt($username) {
    $failedLoginsFile = 'failed_logins.txt';
    $ip = $_SERVER['REMOTE_ADDR'];
    $logMessage = date('Y-m-d H:i:s') . " - Failed login attempt from IP: $ip, Username: $username\n";
    file_put_contents($failedLoginsFile, $logMessage, FILE_APPEND);
}

// Function to check login attempts
function checkLoginAttempts($username) {
    $failedLoginsFile = 'failed_logins.txt';
    $ip = $_SERVER['REMOTE_ADDR'];
    $loginAttempts = 0;
    $failedLogins = file($failedLoginsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($failedLogins as $line) {
        if (strpos($line, "Failed login attempt from IP: $ip, Username: $username") !== false) {
            $loginAttempts++;
        }
    }

    return $loginAttempts;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['uname'];
    $mypassword = $_POST['pwd'];

    // Check if the login attempts exceed a threshold (e.g., 5 attempts)
    if (checkLoginAttempts($myusername) >= 5) {
        echo "Login attempts exceeded. Please try again later.";
        exit;
    }

    // Hash the password to match the database hash algorithm (MD5 in this case)
    $password = md5($mypassword);

    try {
        $sql = "SELECT user, pwd FROM admin_login WHERE user=? LIMIT 1";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("s", $myusername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row['pwd'];

            // Verify the entered password against the stored hashed password
            if ($password === $stored_password) {
                $_SESSION['user'] = $myusername;
                header("location: dashboard.php");
                exit;
            } else {
                // Log attack attempt and show generic error
                logFailedAttempt($myusername);
                showError();
            }
        } else {
            // Log attack attempt and show generic error
            logFailedAttempt($myusername);
            showError();
        }
    } catch (Exception $e) {
        // Log exception and show generic error
        logFailedAttempt($myusername);
        showError();
    }
}

function showError() {
    print "<script>";
    print "alert('Invalid credentials');";
    print "self.location='index.php';";
    print "</script>";
}
?>

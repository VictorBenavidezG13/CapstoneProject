<?php
// Script allowing user to sign in

include 'Tools.php';

// Log in requires username/email and password

$login_username = ""; // Allow Email and Username to work
$login_password = "";

// Server Variables
$server_username = "capstone_add";
$server_password = "Arizona";
$server_server = "localhost";
$server_database = "capstone_mydb";

// Checks for dangerous characters and sets the values for the variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = sanitizeInput($_POST["username"]);
    $login_password = sanitizeInput($_POST["password"]);
}
// Connect to server
$conn = mysqli_connect($server_server,$server_username,$server_password,$server_database);


// Search for email/ username in the table, and verify correct password
$sql = "SELECT * FROM users WHERE username='$login_username' AND password='$login_password' "; 
                                                              
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    // Login Success
echo 'successful login';



    //$_SESSION['username'] = $login_username;
//    header("Location: http://www.charityart.biz/");


}
else {
    echo "Invalid Username or password";
}

?>



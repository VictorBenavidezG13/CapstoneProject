<?php
// script for having a user create an account

// Blank Variables 
$account_emailAddress = "";
$account_username = "";
$account_password = "";

// Server Variables
$server_username = "root";
$server_password = "password";
$server_server = "127.0.0.1";
$server_database = "mydb";


// Checks for dangerous characters and sets the values for the variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_emailAddress = validateInput($_POST["emailAddress"]);
    $account_username = validateInput($_POST["username"]);
    $account_password = validateInput($_POST["password"]);

}



// Connect to SQL table
$conn = mysqli_connect($server_server,$server_username,$server_password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// Add the entry into the table
"INSERT INTO users(email, username, password)
VALUES ('$account_emailAddress','$account_username', '$account_password')";








function validateInput($input) {
    // Removes dangerous characters
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}






?>


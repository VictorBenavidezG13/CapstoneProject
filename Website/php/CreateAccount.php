<?php
// script for having a user create an account
// fires when the user clicks 'submit'

include 'Tools.php';

// Blank Variables 
$account_emailAddress = "";
$account_username = "";
$account_password = "";

// Server Variables
$server_username = "capstone_add";
$server_password = "Arizona";
$server_server = "localhost";
$server_database = "capstone_mydb";


// Checks for dangerous characters and sets the values for the variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_emailAddress = sanitizeInput($_POST["email"]);
    $account_username = sanitizeInput($_POST["username"]);
    $account_password = sanitizeInput($_POST["password"]);
}



// Connect to SQL table
$conn = mysqli_connect($server_server,$server_username,$server_password,$server_database);

// check to make sure that email does not exist in the server already
$sql = "SELECT * FROM users WHERE email='$account_emailAddress'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Email Address is already registered
    echo "Email Address Already Registered";

    // MUST SERVE UP BETTER PAGE
    return;
}
else { 
    // Add the entry into the table only if the email address is not already found
    $sql = "INSERT INTO users(email, username, password)
    VALUES ('$account_emailAddress','$account_username', '$account_password')";


    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: profile.html");

        } 
    else  
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
        
?>


<?php
function sanitizeInput($input) {
    // Removes dangerous characters
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}
?>
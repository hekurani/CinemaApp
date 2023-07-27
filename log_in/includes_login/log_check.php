<?php
include "./../../includes/dbconnection.php";
$fetch = mysqli_query($connection, "SELECT * FROM users");
$rows = mysqli_num_rows($fetch);
$check_username = false;
$check_regex = false;
$pattern = "/^[a-zA-Z0-9]{4,16}$/"; // Regular expression without 'pattern=' and with delimiters
$output = "";
if ($rows > 0) {
    while ($row = mysqli_fetch_assoc($fetch)) {
        if (isset($_POST['name'])) {
            if ($row['username'] === $_POST['name']) {
                $check_username = true;
                
            }
            if (!preg_match($pattern, $_POST['name'])) {
                    $check_regex = true;
                }
        }
    }
    
    if ($check_username) {
        $output .= "Username is already in use.";
    }  if ($check_regex) {
        $output .= "Username should have at least 4 characters, one uppercase letter or one number or one lowercase letter.";
    }
}

echo $output; // Output the results or use it as needed.
?>


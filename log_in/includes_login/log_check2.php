<?php
include "./../../includes/dbconnection.php";
$check_password = false;
$fetch = mysqli_query($connection, "SELECT * FROM users");

$check_regex = false;
$pattern =  "/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z0-9]{8,20}/";; // Regular expression without 'pattern=' and with delimiters
$output = "";
if (!preg_match($pattern, $_POST['password'])) {
    $check_regex = true;
}
else{
    while($row=mysqli_fetch_assoc($fetch)){
        if(password_verify($_POST['password'],$row['password'])){
            $check_password=true;
            break;
        }
        }
}
// if ($rows > 0) {
//     while ($row = mysqli_fetch_assoc($fetch)) {
//         if (isset($_POST['password'])) {
//             if (password_verify($_POST['password'],$row['password'])) {
//                 $check_username = true;
//             }
//             if (!preg_match($pattern, $_POST['password'])) {
//                     $check_regex = true;
//                 }
//         }
//     }}
    
    if ($check_password) {
        $output .= "Password is already in use.";
    }  if ($check_regex) {
        $output .= "Password should have at least 4 characters, one uppercase letter or one number or one lowercase letter.";
    }

echo $output; // Output the results or use it as needed.
?>



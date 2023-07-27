<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "Class_rating.php";
if(isset($_POST['rate']) && isset($_POST['user']) && isset($_POST['movie'])){
try{
    echo $_POST['rate']." ". $_POST['user']." ".$_POST['movie'];
    $rating->Format($_POST['user'],$_POST['movie'],$_POST['rate']);
echo "Succesful Formating";
}
catch(Exception $error){
    echo $error;
}
}
?>
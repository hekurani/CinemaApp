<?php
include "../includes/dbconnection.php";
session_start();
$id_1=$_SESSION['ID'];
$query="UPDATE users SET loged_in=0 where ID=$id_1";
$fetch=mysqli_query($connection,$query);
session_unset();
session_destroy();
echo "<script>window.location.href='log-in-main.php'</script>";
?>

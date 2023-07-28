<?php
// here the it is connected to database with mysqli connection
$connection=mysqli_connect('localhost:3307','root','','movies3');
if(!$connection){
die("Mysql failed" . mysqli_connect_error());
}
?>
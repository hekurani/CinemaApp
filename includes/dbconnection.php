<?php
$connection=mysqli_connect('localhost:3307','root','','movies3');
if($connection){

}
else{
    die("Mysql failed" . mysqli_connect_error());
}

?>
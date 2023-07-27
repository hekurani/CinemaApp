<?php
include "./../includes/function.php";
session_start();
validate();
?>
  <style>
body {
  font-family: Arial, sans-serif;
}
body {
  overflow-x: hidden;
}
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
  max-width: 600px;
  border-radius: 5px;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

label {
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="file"] {
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
    .navbar-custom {
      background-color: #f8f9fa;
    }
    
    body {
      background-color: #f5f5f5; /* Light gray color */
    }

    .social-icons {
      list-style: none;
      padding: 0;
      margin-top: 10px;
    }

    .social-icons li {
      display: inline-block;
      margin-right: 10px;
    }

    .social-icons li a li select {
      color: #000;
      font-size: 20px;
    }
    
    .navbar-brand {
      font-family: Arial, sans-serif;
      font-size: 24px;
      font-weight: bold;
      color: #FF0000;
      text-transform: uppercase;
    }
    
    /* Fix for select element */
    .navbar-nav .nav-item .nav-link {
      display: flex;
      align-items: center;
    }
    
    .navbar-nav .nav-item .nav-link select {
      margin-left: 5px;
    }
    
    /* Move log-out button to the right */
    .navbar-nav .nav-item:last-child {
      margin-left: auto;
    }
    
    /* Adjust log-out button style */
    .navbar-nav .nav-item:last-child .nav-link input[type="submit"] {
      padding: 5px 10px;
      background-color: #FF0000;
      color: #fff;
      border: none;
      cursor: pointer;
    }
    
    /* Remove default button styles */
    .navbar-nav .nav-item:last-child .nav-link input[type="submit"]:focus,
    .navbar-nav .nav-item:last-child .nav-link input[type="submit"]:hover {
      outline: none;
      box-shadow: none;
    }
    
    .navbar-nav .nav-item .nav-link .profile-picture {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-left: 10px;
      cursor: pointer;
    }

    .profile-dropdown {
      position: absolute;
      top: 100%;
      right: 0;
      background-color: #ffffff;
      padding: 10px;
      list-style: none;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      display: none;
    }

    .profile-menu {
      margin: 0;
      padding: 0;
    }

    .profile-menu li {
      margin-bottom: 10px;
    }

    .profile-menu a {
      color: #333;
      text-decoration: none;
    }

    .profile-menu a:hover {
      text-decoration: underline;
    }

    .navbar-nav .nav-item:hover .profile-dropdown {
      display: block;
    }
    .profile-picture {
  position: relative;
  cursor: pointer; /* Add cursor pointer to indicate it's clickable */
}

.profile-dropdown {
  position: absolute;
  top: calc(100% + 10px); /* Position it below the profile picture with a small gap */
  right: 0;
  background-color: #ffffff;
  padding: 10px;
  list-style: none;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  display: none;
  z-index: 1; /* Ensure the dropdown is on top of other elements */
}
    #container{
        float:right;
        margin-right:-1000px;
        left:620%;
        transform: translateX(620%);
margin-right:0px;
left:-1000px;
right:-290px;
    }
    .nav-item:hover .dropdown-menu {
    display: block;
  }
  #container {
  position: absolute;
  top: 0;
  right: 0;
  margin-right: 2290px; /* Adjust the margin as needed */
}
#cont{
  display:inline-block;
}
#profile{
background-color:white;
}
#valzi{
  margin-right:300px;
}
.close{
  margin-top:-40px;
}
input[type="button"]:hover{
  background-color:#B22222;
  color:whitesmoke;
}
input[type="button"]{
  color:whitesmoke;
}
  </style>
<?php
  $count=0;
  $query="Select * from categories";
  $fetch=mysqli_query($connection,$query);
  if(!$fetch){
    echo'<script>alert("Nuk eshte duke punuar")</script>';
  }
  else{

    while($row=mysqli_fetch_assoc($fetch)){
    if($count==0){
      $list_el=' <nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href='.$row['link'].'>'.$row['Page_name'].'</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">'; 
    }
    if(strlen($row['sub_categories'])>0){
      $subcategory_array=explode(",",$row['sub_categories']);
      $sublink_array=explode(",",$row['sub_link']);
      $temp="";
      for($i=0;$i<count($subcategory_array);$i++){
$temp.='<a class="dropdown-item" href='.$sublink_array[$i].'>'.$subcategory_array[$i].'</a>';
      }
      $list_el.=' <li class="nav-item dropdown">
      <a class="nav-link" href='.$row['link'].' id="navbarDropdownBookings">'.$row['categories'].'</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownBookings">'.$temp.'
      </div>
    </li>';
    }
    else{
    if($count==0){
      $list_el.='<li class="nav-item active">
    <a class="nav-link" href='.$row['link'].'>'.$row['categories'].'</a>
  </li>';
    }
    else{
      $list_el.='<li class="nav-item">
      <a class="nav-link" href='.$row['link'].'>'.$row['categories'].'</a>
    </li>';
    }
  
}

$count++;

  
    }
 echo $list_el;
  }
  ?>
    <form method="POST" onsubmit="funksioni(event)" class="form-inline ml-auto">
    <input id="ser" class="form-control mr-sm-2" type="search" name="search" placeholder="Search"  aria-label="Search">
    <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="sub" value="Search">
  </form>
  

</nav>
<div id="modal" class="modal">
<div class="modal-content">
<form method="POST"  enctype="multipart/form-data">
  <div id="element">
    <label for="image">Choose Image:</label>
    <input type="file" name="imageUpload" id="image" required>
  </div>
  <input type="submit" value="Change" name="profile">
  <input style="background-color:red" type="button" onclick="unshow()" class="btn" value="Cancel">
</form>
</div>
</div>
<?php
if(isset($_POST['profile'])){
  $post_image = $_FILES['imageUpload']['name'];
  $id = $_SESSION['ID'];


  $query1 = "SELECT * FROM users WHERE ID=$id";
  $fetch = mysqli_query($connection, $query1);
  while($row = mysqli_fetch_assoc($fetch)){
    $profile = $row['profile_picture'];
  }
  unlink("./../images//$profile");
  $query = "UPDATE users SET profile_picture='$post_image' WHERE ID=$id";
  mysqli_query($connection, $query);
  move_uploaded_file($_FILES['imageUpload']['tmp_name'], "C://xampp//htdocs//MOVIES//images//$post_image");
  $_SESSION['profile']=$post_image;
}
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    var modal = document.getElementById("modal");
var select=document.getElementById('valzi');
select.addEventListener('change',()=>{
  var selected_value=select.value;
  if("Change Profile"==selected_value){
 btnclicked();
  }
  else if("Log Out"==selected_value){
    window.location.href="./../log_in/logout.php";
  }
})
showmodal();
function showmodal(){
  var selected_value2=select.value;
  if("Open Modal"==selected_value2){
 btnclicked();
  }
}
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("btn")[0];

// When the user clicks the button, open the modal
 function btnclicked() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
function unshow() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

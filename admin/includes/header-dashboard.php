<style>.modal {
  display: none; /* Hide the modal by default */
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
}
body {
  font-family: Arial, sans-serif;
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
.modal-content {
  background-color: #fefefe;
  margin: 20% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
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
.close{
  margin-top:-90px;
}
</style>
<?php
include "./../includes/function.php";
session_start();
  validate();
  validate2();
  // validate3($_SESSION['faqja']);
  if($_SESSION['role']!="superadmin"){
  if(strpos($_SERVER['REQUEST_URI'],$_SESSION['faqja'])>0||strpos($_SERVER['REQUEST_URI'],"dashboard")>0){

  }
else{  
  $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
  if($_SESSION['faqja']!=$curPageName){
   $faq= $_SESSION['faqja'];
   if(isset($faq)){
    echo "<script>window.location.href='$faq'</script>";
   }
    else{
      echo "<script>window.location.href=dashboard.php</script>";
    }
  }
}
  }
?>
<div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Heki-Movies</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="Products_prova.php">
            <i class='bx bx-box' ></i>
        <span class="links_name">Movie-Product</span>
          </a>
        </li>
        <li>
          <a href="faq_d.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">FAQ</span>
          </a>
        </li>
        
        <li>
          <a href="Salla_d.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Salla</span>
          </a>
        </li>
        <li>
          <a href="booking_d.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Booking</span>
          </a>
        </li>
        <li>
          <a href="user_d.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Users</span>
          </a>
        </li>
         <li>
          <a id="myBtn" href="#" >
          <i class='bx bx-coin-stack' ></i>
          <span class="links_name">Change profile-picture</span>
          </a>
        </li>
        <li class="log_out">
          <a href="./../log_in/logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
       
      </ul>
  </div>
<div id="modal" class="modal">
  <div class="modal-content">
    <form action="" method="POST"enctype="multipart/form-data">
      <div id="element">
        <label for="image">Choose Image:</label>
        <input type="file" name="imageUpload" id="image" required>
      </div>
      <input type="submit" name="prof" value="Change">
    </form>
    <span class="close">&times;</span>
  </div>
</div>
<?php
if(isset($_POST['prof'])){
    $post_image = $_FILES['imageUpload']['name'];
    $id = $_SESSION['ID'];
    $query1 = "SELECT * FROM users WHERE ID=$id";
    $fetch = mysqli_query($connection, $query1);
    while($row = mysqli_fetch_assoc($fetch)){
      $profile = $row['profile_picture'];
    }
    unlink("images//$profile");
    $query = "UPDATE users SET profile_picture='$post_image' WHERE ID=$id";
    mysqli_query($connection, $query);
    move_uploaded_file($_FILES['imageUpload']['tmp_name'], "C://xampp//htdocs//MOVIES//images//$post_image");
    $_SESSION['profile']=$post_image;
  }
?>
<script>
// Function to open the modal
function openModal() {
  var modal = document.getElementById('chooseProfileModal');
  modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
  var modal = document.getElementById('chooseProfileModal');
  modal.style.display = 'none';
}

// Close the modal if the user clicks outside of it
window.onclick = function (event) {
  var modal = document.getElementById('chooseProfileModal');
  if (event.target == modal) {
    modal.style.display = 'none';
  }
};

// Close the modal if the user clicks on the close button
var closeBtn = document.querySelector('.close');
closeBtn.addEventListener('click', closeModal);
window.onload = function() {
  var modal = document.getElementById("modal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
};
</script>
<!DOCTYPE html>
<?php
?>
<?php
include "../includes/dbconnection.php";

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard </title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
include "includes/header-dashboard.php";
?>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="profile-details">
        <?php $profile=$_SESSION['profile']; echo '<img src="../images//'.$profile.'"  alt="">' ?>
        <span class="admin_name"><?php echo $_SESSION['username'] ?></span>
      </div>
    </nav>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <?php
            $query="SELECT COUNT(*) as shum from users";
            $fetch=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($fetch)){
              $user=$row['shum'];
            }
            ?>
            <div class="box-topic">Total Order</div>
            <div class="number"><?php echo $user ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        
        <div class="box">
          <div class="right-side">
            <?php
            $query="SELECT SUM(cmimi) as shuma, COUNT(cmimi) as komplet FROM user_ticket";
            $fetch=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($fetch)){
              $shuma2=$row['shuma'];
              $usera=$row['komplet'];
            }
            if(!isset($shuma2)){
$shuma2=0;
            }
            ?>
            <div class="box-topic">Total Profit</div>
            <div class="number">$ <?php echo $shuma2 ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Sales</div>
            <div class="number"><?php echo $usera ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <?php
            $query="SELECT COUNT(pyetje) as shuma from faq";
            $fetch=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($fetch)){
              $shuma=$row['shuma'];
            }
            ?>
            <div class="box-topic">Total Questions</div>
            <div class="number"><?php echo $shuma?></div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>
        
  </section>
  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
</body>
</html>
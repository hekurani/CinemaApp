<?php
include "includes_user//header_test.php";
validate();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Movie Ticket Booking</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    .btn-book {
      background-color: #FF0000;
      color: #fff;
      border: none;
    }
    body{
      background-color:  #EDE7F6;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Movie Ticket Booking</h2>
    <form method="POST">
      <div class="form-group">
        <label for="movie">Movie(Salla-Filmi-cmimi):</label>
        <select class="form-control" id="movie" name="movie">
         <?php
         // it shows movies that are showing after today or today but not what is has been showed but anyway that is in database its not deleted to database 
         $query="SELECT * from movies_post";
          $fetch=mysqli_query($connection,$query);
        $return="";  
          while($row=mysqli_fetch_assoc($fetch)){

            if($row['Data_luajtjes']>time()){
              if(strpos($row['Salla'],',')){
              $array=  explode(',',$row['salla']);
              $query2="SELECT * from movies_post";
              $fetch=mysqli_query($connection,$query2);
              for($i=0;$i<count($array);$i++){
               $return.='<option value='.$row['Tittle'].'-'.$row['Salla'].'-'.$row['cmimi'].'>'.$row['Tittle'].'-'.$row['Salla'].'-'.$row['cmimi'].'</option>'; 
              }
            }
              else{
                $return.='<option value='.$row['Tittle'].'-'.$row['Salla'].'-'.$row['cmimi'].'>'.$row['Tittle'].'-'.$row['Salla'].'-'.$row['cmimi'].'</option>'; 

              }

            }
          }
          
          echo $return;
         ?>
        </select>
      </div>
      <div class="form-group">
        <label for="tickets">Number of Tickets:</label>
        <input type="number" class="form-control" id="tickets" name="tick" min="1" max="10" required>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="f" name="Name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="name">Bank-number:</label>
        <input type="text" class="form-control" id="name" name="Bank" required>
      </div>
      <div class="form-group">
        <label for="name">CVM:</label>
        <input type="text" class="form-control" id="name" name="CVM" required>
      </div>
      <input type="submit" class="btn btn-book btn-block" name="sub" value="Book tickets">
    </form>
  </div>
  <?php
include "includes_user//footer.php"
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// if it books the ticket then tickets are saved and if there's no tickets left it shows an alert message that you cant buy these amount of tickets because the stock is full

if(isset($_POST['sub'])){
  $selectedOption = $_POST['movie'];
  $selectedArray = explode('-', $selectedOption);
  $moviename = $selectedArray[0];
  $salla = $selectedArray[1]; 
   $tick = intval($_POST['tick']);
  $query = "SELECT SUM(buy_tickets) AS total_tickets FROM user_ticket where Salla='$salla'";
  $query2 = "SELECT Nr_Uleseve FROM sallat WHERE salla_name='$salla'";
$fetch2=mysqli_query($connection, $query2);
  $fetch = mysqli_query($connection, $query);

if ($fetch) {
    $row = mysqli_fetch_assoc($fetch);
    $totalTickets = $row['total_tickets'];
 
    echo "Total tickets: " . $totalTickets;
} else {
    echo "Error executing the query: " . mysqli_error($connection);
}
if($fetch2){
  $row2 = mysqli_fetch_assoc($fetch2);
    $tickets = $row2['Nr_Uleseve'];
}
if($totalTickets+$tick<=$tickets){
  $cmimi = intval($selectedArray[2]);
$phone=$_POST['phone'];
  $username = $_SESSION['username'];
  $bank = password_hash($_POST['Bank'], 
  PASSWORD_DEFAULT);
  $cvm = password_hash($_POST['CVM'], 
  PASSWORD_DEFAULT);
  $query = "INSERT INTO user_ticket (Bank_number, phone,CVM, movie_name, buy_tickets, user_name, Salla, cmimi)
            VALUES ('$bank','$phone', '$cvm', '$moviename', $tick, '$username', '$salla', $cmimi)";
  mysqli_query($connection, $query);
}
else{
  $left=$tickets-$totalTickets;
  echo "<script>alert('Sorry? there are $left tickets left')</script>";
}
}
?>
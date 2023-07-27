<?php
 include "includes_user//header_test.php";
// validate();
?>
<head>
  <title>FAQ Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .accordion {
      margin-bottom: 20px;
    }

    .card {
      border: none;
      border-radius: 0;
      margin-bottom: 10px;
      box-shadow: none;
    }

    .card-header {
      background-color: #fff;
      padding: 0;
    }

    .card-header:hover {
      cursor: pointer;
    }

    .card-header h5 {
      margin: 0;
      padding: 10px;
      font-weight: bold;
    }

    .card-header .plus-sign {
      display: inline-block;
      margin-right: 10px;
      transition: transform 0.3s ease-in-out;
    }

    .card-header.collapsed .plus-sign {
      transform: rotate(45deg);
    }

    .card-body {
      display: none;
      padding: 10px;
    }

    .card-body p {
      margin-bottom: 10px;
    }

    .card-body p:last-child {
      margin-bottom: 0;
    }

    .faq-form {
      margin-top: 30px;
    }

    .faq-form input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }

    .faq-form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      resize: vertical;
    }

    .faq-form button {
      background-color: #FF0000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
    }

    .faq-form button:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }
body{
  background-color:  #EDE7F6;
}
  </style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ PAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <style>
        body{
    font-family: 'Work Sans', sans-serif;
}
.faq-heading{
    border-bottom: #777;
    padding: 20px 60px;
}
.faq-container{
display: flex;
justify-content: center;
flex-direction: column;
}
.hr-line{
  width: 60%;
  margin: auto;
  
}
.btn{
  background-color:red;
}
/* Style the buttons that are used to open and close the faq-page body */
.faq-page {
    /* background-color: #eee; */
    color: #444;
    cursor: pointer;
    padding: 30px 20px;
    width: 60%;
    border: none;
    outline: none;
    transition: 0.4s;
    margin: auto;
}
.faq-body{
    margin: auto;
    /* text-align: center; */
   width: 50%; 
   padding: auto;
   
}
/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active,
.faq-page:hover {
    background-color: #F9F9F9;
}
/* Style the faq-page panel. Note: hidden by default */
.faq-body {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
}
.faq-page:after {
    content: '\02795';
    /* Unicode character for "plus" sign (+) */
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}
.active:after {
    content: "\2796";
    /* Unicode character for "minus" sign (-) */
}
input:invalid +button{
  pointer-events:none;
  opacity:0.5;
}
    </style>
</head>
<body>
<div class="faq-form">
      <h3>Have a question?</h3>
      <form method="POST">
        <div class="form-group">
          <label for="question">Question:</label>
          <input type="text" class="form-control" id="question" name="question">
        </div>
        <input type="submit" name="submit" class="btn" value="Submit">
      </form>
    </div>
    <main>

        <section class="faq-container">
          
          <?php
          if(isset($_POST['sub'])&&!empty($_POST['search'])){
            $search=$_POST['search'];
            Search_db($search);
            $query="SELECT * from faq WHERE pyetje='$search'";

            $fetch=mysqli_query($connection,$query);
            $return="";
            // Assuming $row is an associative array containing the database row
  
            while($row=mysqli_fetch_assoc($fetch)){
              $data = $row['dATA'];
  
  // Get the current timestamp
  $currentTimestamp = time();
  
  // Calculate the timestamp for 24 hours ago
  $twentyFourHoursAgo = strtotime('-24 hours');
  
  // Convert the date from the database to a timestamp
  $dataTimestamp = strtotime($data);
              if ($dataTimestamp > $twentyFourHoursAgo && $dataTimestamp <= $currentTimestamp) {
              $question=$row['pyetje'];
              $answer=$row['pergjigje'];
            $return.=  '<div class="faq-one">
              <!-- faq question -->
              <h1 class="faq-page">'.$question.'</h1>
              <!-- faq answer -->
              <div class="faq-body">
                  <p>'.$answer.'</p>
              </div>
          </div>
          <hr class="hr-line">';
              }
            }          
            echo $return;
          }
          
          else{
          $query="SELECT * from faq";
          $fetch=mysqli_query($connection,$query);
          $return="";
          // Assuming $row is an associative array containing the database row

          while($row=mysqli_fetch_assoc($fetch)){
            $data = $row['dATA'];

// Get the current timestamp
$currentTimestamp = time();

// Calculate the timestamp for 24 hours ago
$twentyFourHoursAgo = strtotime('-24 hours');

// Convert the date from the database to a timestamp
$dataTimestamp = strtotime($data);
            if ($dataTimestamp > $twentyFourHoursAgo && $dataTimestamp <= $currentTimestamp) {
            $question=$row['pyetje'];
            $answer=$row['pergjigje'];
          $return.=  '<div class="faq-one">
            <!-- faq question -->
            <h1 class="faq-page">'.$question.'</h1>
            <!-- faq answer -->
            <div class="faq-body">
                <p>'.$answer.'</p>
            </div>
        </div>
        <hr class="hr-line">';
            }
          }          
          echo $return;
        }
          ?>
            <!-- < -->
        </section>
    </main>
    <script>

var faq = document.getElementsByClassName("faq-page");
var i;
for (i = 0; i < faq.length; i++) {
    faq[i].addEventListener("click", function () {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");
        /* Toggle between hiding and showing the active panel */
        var body = this.nextElementSibling;
        if (body.style.display === "block") {
            body.style.display = "none";
        } else {
            body.style.display = "block";
        }
    });
}
    </script>

   
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Handle form submission
    // document.querySelector('.faq-form form').addEventListener('submit', function(event) {
    //   event.preventDefault();
    //   var questionInput = document.querySelector('#question');
    //   var answerTextarea = document.querySelector('#answer');
    //   var submitButton = document.querySelector('.faq-form button');

    //   // Update answer field and enable button
    //   answerTextarea.value = 'This is the answer to your question.';
    //   answerTextarea.disabled = false;
    //   submitButton.disabled = false;

    //   // Clear question field
    //   questionInput.value = '';
    // });

    // // Handle accordion behavior
    // var accordionHeaders = document.querySelectorAll('.card-header');
    // accordionHeaders.forEach(function(header) {
    //   header.addEventListener('click', function() {
    //     var collapseIcon = this.querySelector('.plus-sign');
    //     collapseIcon.classList.toggle('collapsed');
    //     var collapseBody = this.nextElementSibling;
    //     if (collapseBody.style.display === 'block') {
    //       collapseBody.style.display = 'none';
    //     } else {
    //       collapseBody.style.display = 'block';
    //     }
    //   });
    // });
  </script>
<?php
if(isset($_POST['submit'])){
  $emri=$_POST['question'];
if(!empty($emri)){
  $array=["pyetje","dATA"];
  $values=[$emri,date('Y-m-d')];
  add("faq",$array,$values,"FAQ.php"); 
  echo '<script>window.location.href="FAQ.php"</script>';
}
}
?>  
</body>
</html>
<?php
include "includes_user/footer.php";

?>
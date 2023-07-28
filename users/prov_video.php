<?php
include "includes_user//header_test.php";
validate();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>movieCard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<style>
		* {
			font-family: 'Poppins', sans-serif;
			-webkit-user-select: none;
			-moz-user-select: -moz-none;
			-o-user-select: none;
			user-select: none;
		}
		img {
			-webkit-user-drag: none;
			-moz-user-drag: none;
			-o-user-drag: none;
		}
		img {
			pointer-events: none;
		}
		.movie_card {
			padding: 0 !important;
			width: 22rem;
			margin: 14px;
			border-radius: 10px;
			box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0 rgba(0, 0, 0, 0.19);
		}
		.movie_card img {
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			height: 33rem;
		}
		.movie_info {
			color: #5e5c5c;
		}

		.movie_info i {
			font-size: 20px;
		}
		.card-title {
			width: 80%;
			height: 4rem;
		}
		.play_button {
			background-color: #ff3d49;
			position: absolute;
			width: 60px;
			height: 60px;
			border-radius: 50%;
			right: 20px;
			bottom: 111px;
			font-size: 27px;
			padding-left: 21px;
			padding-top: 16px;
			color: #FFFFFF;
			cursor: pointer;
		}
		.star-rating {
			display: inline-flex;
			flex-direction: row-reverse;
			/* Reverse the direction */
		}
		.movie_info {
			display: block;
		}
		.star-rating input {
			display: none;
		}
		.star-rating label {
			font-size: 20px;
			color: #ccc;
			cursor: pointer;
		}
		.star-rating label:before {
			content: "\2606";
		}
		.star-rating input:checked~label:before {
			content: "\2605";
			color: #FFD700;
		}
		.credits {
			margin-top: 20px;
			margin-bottom: 20px;
			border-radius: 8px;
			border: 2px solid #8e24aa;
			font-size: 18px;
		}
		.credits .card-body {
			padding: 0;
		}
		.credits p {
			padding-top: 15px;
			padding-left: 18px;
		}
		.credits .card-body i {
			color: #8e24aa;
		}
		body {
			background-color: #EDE7F6;
		}
		.justify-content-center {
			display: flex;
			flex-wrap: wrap;
		}
		@media (max-width: 767px) {
			.justify-content-center .card {
				flex-basis: 100%;
			}
		}
        .card {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      padding: 20px;
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
    }

    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-description {
      font-size: 14px;
      margin-bottom: 20px;
    }

    .card-image {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px;
    }

    .card-link {
      color: #007bff;
      text-decoration: none;
      font-weight: bold;
    }
    #container{
        margin-top:140px;
        margin-left:0px;
    left:100px;
    }
    .card{
        width:500px;
        height:500px;
        left:-1000px;
    }
    #cont{
        left:-1000px;
    }
    .rating {
    font-size: 30px;
    cursor: pointer;
}

.star {
    color: grey;
}


nav,ul{
    display:flex;
  }
  ul{
  gap:15px;
  list-style: none; 
  }
  li{
     text-decoration: none;
  }
  
a {
  text-decoration: none; /* Remove underlines */
}
body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
  left: 0;
  width: 100%;
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
  z-index: 100;
}


    main {
      padding: 20px;
    }

    .video-container {
      position: relative;
      width: 100%;
      height: 0;
      padding-bottom: 56.25%;
    }

    .video-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .movie-description {
      margin-top: 20px;
      font-size: 18px;
      line-height: 1.5;
    }
    .star.filled {
    color: yellow;
}
#container{
  left:1500px;
}
</style>
   <title>Movie Web-page</title>
</head>
<body>
  <header>
    <?
    // get the id when its clicked with GET variable and show thats movie
    if(isset($_GET['edit'])){
      $id=$_GET['edit'];
      $query="SELECT * from movies_post where ID=$id";
$fetch=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($fetch)){
  echo '<h1>'.$row['Tittle'].'</h1>';
}}?>
</header>
  <main>
    <div class="video-container">
   
   <?php if(isset($_GET['edit'])){
            $id=$_GET['edit'];
            $query="SELECT * from movies_post where ID=$id";
    $fetch=mysqli_query($connection,$query);//

    while($row=mysqli_fetch_assoc($fetch)){
        echo '<video controls>
        <source src="./../'.$row['videoURL'].'"video/mp4">
        Your browser does not support the video tag.
      </video>';
    ?>
    </div>
    <span>Rating:</span>
    <div class="rating" id="rating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>
    <div class="movie-description">
      <h2>Description:</h2>
<?php
echo $row['content']; 
    }}
?><?php include "rating//Class_rating.php";
 ?>
    </div>
  </main>
  <script>
     document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');
    const ratingDiv = document.getElementById('rating');
    const message = document.getElementById('message');

    let currentRating =<?php
 echo $rating->GetRating($_GET['edit'],$_SESSION['ID'])
?>;
// here it is to fillstar when its hovered the stars then it adds an class hover which is in CSS makes it yellow when clicked get the data
// and all stars permanently been yellow which add another class
fillStars(currentRating);
    let hoveredRating = 0;

    stars.forEach(function(star) {
        star.addEventListener('mouseover', function() {
            const value = this.getAttribute('data-value');
            hoveredRating = value;
            fillStars(hoveredRating);
        });

        star.addEventListener('mouseout', function() {
            hoveredRating = 0;
            fillStars(currentRating);
        });

        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            $.ajax({
type:"POST",
url:"rating//ratt.php",
data: "rate=" + value + "&movie=" + <?php echo $_GET['edit'] ?> +"&user="+<?php echo $_SESSION['ID'] ?>,
success:function(data){
console.log(data);
}
})
            currentRating = value;
            
        });
    });
    function fillStars(value) {
        stars.forEach(function(star) {
            const starValue = star.getAttribute('data-value');
            if (starValue <= value) {
                star.classList.add('filled');
                star.classList.remove('hovered');
            } else {
                star.classList.remove('filled');
                star.classList.add('hovered');
            }
        });
    }
});

  </script>
</body>
</html> 
<?php include "includes_user//header_test.php";?>
<DOCTYPE html>
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
		
		
		#container{
		left:1770px!important;
		background-color: #ff3d49;
		top:10px;
		}
		*{
			/* overflow-x:scroll; */
		}
		
	</style>
</head>
<body>
<div id="container">
            <div id="dad" class="profile-picture">
              <img style="height:100px; width:100px" src="<?php echo'./../images//'.  $_SESSION['profile']?>" id="spec"class="Profile">
            </div>
           
    <div><?php
	
echo "Welcome ".$_SESSION['username'];
?>
<select id="valzi" class="profile-select">
  <option value="#"></option>
  <option id="logout" value="Log Out">Log Out</option>
  <option id="myBtn" onclick="btnclicked();">Change Profile</option>
</select>
     </div>
    </div>
	<?php
	
	
	include "./../includes/dbconnection.php";
	validate();
	if(!isset($check2)){
		$check2=false;
	}
if(!isset($_POST['sub'])|| empty($_POST['search'])){
	$query = "SELECT * from movies_post";
	$fetch = mysqli_query($connection, $query);

	if (!$fetch) {
		echo "<script>alert('Nuk eshte duke punuar ne rregull src code')</script>";
	} else {
		$check = 0;
		$return = '<div class="container mt-5">
		<div class="row justify-content-center">';
		while ($row = mysqli_fetch_assoc($fetch)) {
			if($row['Data_luajtjes']>=date("Y-m-d")){
				$id=$row['ID'];
				$fetch2=mysqli_query($connection,"SELECT AVG(rate) as rt FROM rating WHERE ProductID=$id");
				$row2=mysqli_fetch_assoc($fetch2);
				$rate=$row2['rt'];
			$check = 1;
			$return .= '<div class="card movie_card">
			<img src="./../' . $row['image_url'] . '" class="card-img-top" alt="...">
			<div class="card-body">
				<a href="prov_video.php?edit='.$row['ID'].'"<i class="fas fa-play play_button" data-toggle="tooltip" data-placement="bottom" title="Play Trailer"></i></a>
				<h5 class="card-title">' . $row['Tittle'] . '</h5>
				<span class="movie_info">Data e Filmit:' . $row['Viti_filmit'] . '</span>
				<span class="movie_info">Data e shfaqjes:' . $row['Data_luajtjes'] . '</span>
				<span class="movie_info">cmimi:' . $row['cmimi'] . '$</span>
				<span class="movie_info">Salla:' . $row['Salla'] . '</span>
				<span class="movie_info">Koha e shfaqjes:' . $row['Koha_luajtjes'] . '</span>
				<span class="movie_info">rating:' . $rate . '</span>
			</div>
			</div>';
			}
		}
		if ($check == 1) {
			$return .= '</div>
		</div>';
			echo $return;
		} else {
			$return = "";
		}
	}
}
else{
	$search=$_POST['search'];
	Search_db($search);
		$query="SELECT * from movies_post where Tittle='$search'";
		$fetch=mysqli_query($connection,$query);
		$check2=true; 
	if (!$fetch) {
		echo "<script>alert('Nuk eshte duke punuar ne rregull src code')</script>";
	} else {
		$check = 0;
		$return = '<div class="container mt-5">
		<div class="row justify-content-center">';
		while ($row = mysqli_fetch_assoc($fetch)) {
			if($row['Data_luajtjes']>date("Y-m-d")){
				$id=$row['ID'];
				$fetch2=mysqli_query($connection,"SELECT AVG(rate) as rt FROM rating WHERE ProductID=$id");
				$row2=mysqli_fetch_assoc($fetch2);
				$rate=$row2['rt'];
				
			$check = 1;
			$return .= '<div class="card movie_card">
			<img src="./../' . $row['image_url'] . '" class="card-img-top" alt="...">
			<div class="card-body">
				<a href="prov_video.php?edit={'.$row['ID'].'}"<i class="fas fa-play play_button" data-toggle="tooltip" data-placement="bottom" title="Play Trailer"></i></a>
				<h5 class="card-title">' . $row['Tittle'] . '</h5>
				<span class="movie_info">Viti Filmit:' . $row['Viti_filmit'] . '</span>
				<span class="movie_info">Data e shfaqjes:' . $row['Data_luajtjes'] . '</span>
				<span class="movie_info">cmimi:' . $row['cmimi'] . '</span>
				<span class="movie_info">Salla:' . $row['Salla'] . '</span>
				<span class="movie_info">Rating:' . $rate . '</span>
			</div>
			</div>';
			}
		}
		if ($check == 1) {
			$return .= '</div>
		</div>';
			echo $return;
		} else {
			$return = "";
		}
	}

}

	?>
	<?php
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
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

	<?php
	include "includes_user/footer.php";
	?>
</body>
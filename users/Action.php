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
	</style>
</head>
<body>
	<?php
	include "includes_user//header_test.php";
	include "../includes/dbconnection.php";
	validate();
	if(!isset($check2)){
		$check2=false;
	}
if(!isset($_POST['sub'])){
	$query = "SELECT * FROM movies_post WHERE Zhandri LIKE '%Aksion%'";
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
				<span class="movie_info">rate:' . $rate . '</span>
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
				<span class="movie_info">Salla:' . $rate . '</span>
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
	<?php
	include "includes_user//footer.php";
	?>
</body>
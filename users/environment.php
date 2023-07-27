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
       
    }
   
	</style>
</head>
<body>
	<?php
	include "includes_user//header_test.php";
	include "../includes/dbconnection.php";
	validate();
    ?>
<?php
// include "header_test.php"
// ?>
<!DOCTYPE html>
<html>
<head>
  <title>Environment Protection Cards</title>
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
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      padding: 20px;
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
    left:400px;
    }
    .card{
        width:500px;
        height:500px;
    }
  </style>
</head>
<body>
    <div id="container">
  </div>
<script>
	var data2='';
    window.onload=function(){
var xhr=new XMLHttpRequest();
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      // The request was successful
      var response = xhr.responseText;
      var element2=``;
      // Parse the JSON response
      var data = JSON.parse(response);
	  data2=data;
     for(let element in data){
element2+= ` <div class="card">
    <h2 class="card-title">${data[element].TITTLE}</h2>
    <p class="card-description">${data[element].description}</p>
    <img class="card-image" src=../${data[element].URL} alt="Conservation">
  </div>`;
     }
     document.getElementById("container").innerHTML=element2;
      // Use the parsed data
      console.log(data);
    } else {
      // There was an error
      console.log("Error: " + xhr.status);
    }
  }
};

xhr.open('GET', 'data//env.json', true);
xhr.send();
    }
const funksioni=(event)=>{
var	element2='';
	event.preventDefault();
	console.log(data2);
	if(document.getElementById('ser').value!==""){
		console.log(data2);
	for(let element in data2){
		if(data2[element].TITTLE===document.getElementById('ser').value){
element2+= ` <div class="card">
    <h2 class="card-title">${data2[element].TITTLE}</h2>
    <p class="card-description">${data2[element].description}</p>
    <img class="card-image" src=../${data2[element].URL} alt="Conservation">
  </div>`;
     }
	}}
	else{
		for(let element in data2){
			element2+= ` <div class="card">
    <h2 class="card-title">${data2[element].TITTLE}</h2>
    <p class="card-description">${data2[element].description}</p>
    <img class="card-image" src=../${data2[element].URL} alt="Conservation">
  </div>`;
		}
	}
	 
	
     document.getElementById("container").innerHTML=element2;

}
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
	
</script>
</body>
</html> 
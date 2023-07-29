<?php
include "includes/header-dashboard.php";// include header file 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/dashboard.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}
    .container{
        right:1000px;
        left:-200px;
        margin-right:120px;
        right:0;
        padding-right:0;
    }	
    .table-responsive{
        width:1500px;
    }
    .delete{
		padding-top:0;
        height:60px;
        width:80px;
    }
    .delete:hover{
        box-shadow: 0 0 5px red;
    }
    .col-xs-6{
        margin-left:1200;

    }
    #Yeas{
        visibility:hidden;
    }
	#formm{
		margin-left:600px;
	}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	// function for setting DOM element visible or hidden depends 
function unableadmin(element){
    if(element==true){
        document.getElementById('Yeas').style.visibility="hidden";
    }
    else{
        document.getElementById('Yeas').style.visibility="visible";
    }   
}
</script>
<form id="formm" method="POST" class="form-inline ml-auto">
<select name="mySelect">
	  <option value="username">username:</option>
</select>
	<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
	<input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="sub" value="Search">
</form>      
<?php
// if its not empty search input then go inside of scope and set search to whats in input and show all table users with that searched field that it chooses  
if(isset($_POST['sub'])&&!empty($_POST['search'])){
	$search=$_POST['search'];
	$array=array();
	$table="users";
	 showtablesearch($table,$array,"username",$search);
}
else{
	// here it shows all the table
$array=array();
$table="users";
 showtable($table,$array);
}
?>
    <!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add <?php echo $table ?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>username:</label>
							<input type="text" name="name" class="form-control" pattern="[a-zA-Z0-9]{4,16}" required>
						</div>
                        <div class="form-group">
							<label>profile-picture</label>
							<input type="file" name="image" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Email:</label>
							<input type="text" name="email" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" class="form-control" required>
						</div>
                        <div class="form-group">
                        <label>Password:</label>
							<input type="password" class="form-control"  pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z0-9]{8,20}" name="password" required>
                        </div>
						<div class="form-group">
							<label>Gjinia:
    <input type="radio" name="gender" value="male" required>
    Male
  </label>
  <label>
    <input type="radio" name="gender" value="female" required>
    Female
  </label>
  <label>
    <input type="radio" name="gender" value="other" required>
    Other
  </label>
	</div>
    <div class="form-group">
							<label>Roli:
    <input type="radio" name="role" value="user" onclick="unableadmin(true);" required>
    User
    <input type="radio" name="role"value="admin" onclick="unableadmin(false);" required>
    Admin
  </label>
	</div>
    <div id="Yeas" class="form-group">
        Specifikat:
							<label>
    <input type="radio" name="specifikat" value="faq_d.php">
    FAQ
		</label>
  <label>
    <input type="radio" name="specifikat" value="Products_prova.php">
    Movies
  </label>
  <label>
    <input type="radio" name="specifikat" value="Salla.php">
    Salla
  </label>
  <label>
    <input type="radio" name="specifikat" value="booking_d.php">
    Booking
  </label>
	</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submitadd" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
<script>
	// here it is how we get the id of a element DOM and then id is id of the one row ID that we want to edit
	//and then pushes it into an input hidden value
 var array=[];
	$('a.edit').click(function(){
var id = $(this).attr('id');
if(isNaN(id)){
	var id2=parseInt(id);
}
else{
	var id2=id;
}
$('#hidden').val(id2);
	})
	// here it is how we get an id from the delete when we want to delete an row and get the ID of the deleted row and pushes into an DOM element with id hidden
$('a.delete').click(function(){
var id = $(this).attr('id');
if(isNaN(id)){
	var id2=parseInt(id);
}
else{
	var id2=id;
}
console.log(id);
$('#hidden2').val(id2);
	})
// here it is how we get all id of every check box thay we click and we want to delete them
$('input.check').click(function(){
	var check = false;
  var id = $(this).attr('id');

  for (var i = 0; i < array.length; i++) {
    if (array[i] === id) {
      array.pop(array[i]);
      check = true;
      break;
	}
  }

  if ((check === false || array.length === 0)&&check!=true) {
    array.push(id);
  }
  var el=document.getElementById('special');
if(array.length>0){
    el.value=array;
}
})
// this function is for showing modal
    function funksioni(){
        const module = document.getElementById('deleteEmployeeModal');
        module.show();
    }
</script>
</body>
</html>
<?php
// here it explains how we can add an row to table users
if(isset($_POST['submitadd'])){
	// here it checks if there are not any empty input
	if(isset($_POST['name']) && isset($_FILES['image']) && isset($_POST['gender'])&& isset($_POST['password'])&&isset($_POST['email'])){
// gets the image and upload it in folder images and checks if it is admin or user role and then create an array of field names
// and values and inserti into table and reload page
		$post_image=$_FILES['image']['name'];
$post_temp_file=$_FILES['image']['tmp_name'];
move_uploaded_file($post_temp_file,"C:/xampp/htdocs/MOVIES/images/$post_image");
if($_POST['role']=="admin"){
    $array=["username","password","profile_picture","email","gjinia","roli","specifikimet"];
    $values=[$_POST['name'],password_hash($_POST['password'], 
	PASSWORD_DEFAULT),"images/" . $post_image,$_POST['email'], $_POST['gender'],$_POST['role'],$_POST['specifikat']];    
}
else{
$array=["username","password","profile_picture","email","gjinia","roli"];
$values=[$_POST['name'],password_hash($_POST['password'], 
PASSWORD_DEFAULT),"images/" . $post_image,$_POST['email'], $_POST['gender'],$_POST['role']];
}
add("users",$array,$values,"user_d.php");  

echo "<script>window.location.href='user_d.php'</script>";
}
}
// here it is if delete input type='submit' is clicked and then get all the id that we want to delete and delete all the ids that are in inpiut hidden inserted with values before    
if(isset($_POST['delete'])){
		$id=intval($_POST['spec']);
		$all="";
		$query="SELECT ID from users where roli='admin'";
		$fetch=mysqli_query($connection,$query);
		while($row=mysqli_fetch_row($fetch)){
			$superadminid=$row['ID'];
		}
		if(empty($_POST['spec'])){
			$query="UPDATE users SET disabled=1 where ID <> $superadminid";
			$query=mysqli_query($connection,$query);
		}
		
		else if(strpos($_POST['spec'], ',') !== false){
			$array = explode(",", $_POST['spec']);
		    for($i=0;$i<count($array);$i++){
				$temp=intval($array[$i]);
				$query="Update users SET disabled=1 WHERE ID=$temp and ID <> $superadminid";
				mysqli_query($connection,$query);
			}
		}
		else{
            $query="Update users SET disabled=1 WHERE ID=$id and ID <> $superadminid";
            mysqli_query($connection,$query);
		}
echo("<script>window.location.href='user_d.php'</script>");
	}
// here it is when we want to delete just one row and we use GET super variable and when we click that we will
//get the id and delete from the table rows with ID as id variable and set disabled to 0 or 1 depends if it is deleted or update so it doesnt delte all from database
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$id = intval($id); // Sanitize the input by converting to an integer
	
	if (is_int($id) && $id > 0) { // Validate that $id is a positive integer
		$query = "UPDATE users SET disabled = 0 WHERE ID = $id";
		mysqli_query($connection, $query);
	
		if (mysqli_affected_rows($connection) > 0) {
			echo("<script>window.location.href='user_d.php'</script>");
		} else {
			echo "No records were updated.";
		}
	} else {
		echo "Invalid ID parameter.";
	}
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($id > 0) {
		$query="SELECT ID from users where roli='admin'";
		$fetch=mysqli_query($connection,$query);
		while($row=mysqli_fetch_row($fetch)){
			$superadminid=$row['ID'];
		}
        $query = "UPDATE users SET disabled = 1 WHERE ID = ? and ID <> $superadminid";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    echo("<script>window.location.href='user_d.php'</script>");
}
 ?> 
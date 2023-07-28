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
	.form-inline{
		margin-left:380px;
	}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<form method="POST" class="form-inline ml-auto">
    
<select name="mySelect">
	  <option value="Title">Title:</option>
	  <option value="Zhandri">Zhandri:</option>
	  <option value="Salla">Salla:</option>
	  <option value="Cmimi">Cmimi:</option>
</select>
	<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
	<input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="sub" value="Search">
</form>  
<?php
if(isset($_POST['sub'])&&!empty($_POST['search'])){// check if its not empty search and if its clicked
	$search="";// empty variable
	switch($_POST['mySelect']){//switch for what you want to search for and then send request for searching in that field where that fields and search input are same
		case 'Title':
			$search=$_POST['search'];
			$query="SELECT * from movies_post where Tittle='$search'";
			$fetch=mysqli_query($connection,$query);
			$array2=array();
			showtable2("movies_post",$array2,$fetch);
			break;
			case 'Zhandri':
				$search=$_POST['search'];
			$query="SELECT * from movies_post where Zhandri='$search'";
			$fetch=mysqli_query($connection,$query);
			$array2=array();
			showtable2("movies_post",$array2,$fetch);
				break;
			case 'Salla':
				$search=$_POST['search'];
			$query="SELECT * from movies_post where Salla='$search'";
			$fetch=mysqli_query($connection,$query);
			$array2=array();
			showtable2("movies_post",$array2,$fetch);
				break;
				case 'Cmimi':
					$search=intval($_POST['search']);
			$query="SELECT * from movies_post where cmimi=$search";
			$fetch=mysqli_query($connection,$query);
			$array2=array();
			showtable2("movies_post",$array2,$fetch);
					break;
		}
}
else{
	// in other case make na empty array and show table functon for printin all the table with all information of table
$array=array();
$table="movies_post";
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
							<label>content:</label>
							<textarea class="form-control" name="content" required></textarea>
						</div>				
						<div class="form-group">
							<label>choose-image:</label>
							<input type="file" name="image" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>Viti i filmit</label>
							<input type="Date" class="form-control" name="viti" required>
						</div>
						<div class="form-group">
							<label>Zhandri:</label>
							<input type="text" class="form-control" name="zhandri" required>
						</div>					
                        <div class="form-group">
							<label>Titulli:</label>
							<input type="text" class="form-control" name="Titulli" required>
						</div>
						<div class="form-group">
							<label>choose-movie:</label>
							<input type="file" name="movie" class="form-control" accept="video/*" required>
						</div>
						<div class="form-group">
							<label>Cmimi:</label>
							<input type="number" name="Cmimi" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Koha e luajtjes:</label>
							<input type="time" name="tm" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Data-luajtjes:</label>
							<input type="Date" name="Data" class="form-control" required>
						</div>
						<div class="form-group">
	<label for="salla">Salla:</label>
	<select name="Salla" id="salla" class="form-control" required>
<?php
$query="SELECT * from sallat";// SELECT ALL from table sallat
$fetch=mysqli_query($connection,$query);//fetch all the data from table sallat and sending requst for mysqli_query
while($row=mysqli_fetch_assoc($fetch)){// for every row enter the while loop it means show all sallatfor that movie available
	echo '<option value='.$row['salla_name'].'>'.$row['salla_name'].'</option>';
}
?>
		<!-- Add more options if needed -->
	</select>
</div>
                    </div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submitadd" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
if(isset($_POST['id'])){// is it set input name='id' taht means get the id and select ALL from movies and for every row get the content and description
		$id=intval($_POST['id']);
		$query="SELECT * FROM movies_post where ID=$id";
	$fetch=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($fetch)){
$content=$row['content'];
		}
}
	?>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" enctype="multipart/form-data" onsubmit="submit()">
					<div class="modal-header">						
						<h4 class="modal-title">Edit <?php echo $table?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Koha e Shfaqjes:</label>
							<input type="time" class="form-control" >
						</div>
						<div class="form-group">
							<label>choose-image:</label>
							<input type="file" class="form-control"  name="image2" >
						</div>
						<div class="form-group">
							<label>content:</label>
							<textarea class="form-control" name="content" ></textarea>
						</div>
						<div class="form-group">
							<label>Viti i filmit</label>
							<input type="date" name="viti" class="form-control" >
						</div>	
                        <div class="form-group">
							<label>Titulli:</label>
							<input type="text" class="form-control" name="Title" >
						</div>		
						<div class="form-group" >
						<input type="number" id="hidden"style="display: none;" name="id">
                        </div>
                        <div class="form-group">
							<label>Zhandri:</label>
							<input type="text" name="zhandri" class="form-control" >
						</div>
						<div class="form-group">
							<label>choose-movie:</label>
							<input type="file" name="movie2" class="form-control" >
						</div>
						<div class="form-group">
							<label>Cmimi:</label>
							<input type="number" name="Cmimi2" class="form-control" >
						</div>
						<div class="form-group">
	<label for="salla">Salla:</label>
	<select name="Salla2" id="salla" class="form-control">
<?php
//select all from salla and show slla_name
$query="SELECT * from sallat";
$fetch=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($fetch)){
	echo '<option value='.$row['salla_name'].'>'.$row['salla_name'].'</option>';
}
?>
		<!-- Add more options if needed -->
	</select>
</div>
						<div class="form-group">
							<label>Data-luajtjes:</label>
							<input type="Date" name="Data2" class="form-control" >
						</div>
					</div> 
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submitedit" class="btn btn-info" >
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Delete <?php echo $table?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					    
					</div>
					<input type="number" style="display:none"  id="hidden2" name="hiden">
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submitdelete" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
	

<script>
	// if a .edit is clicked then make int that id of a .edit and push that value in hidden same with a .delete
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
// if input class='check' when its clicked and excecute the function set check false and get the id and push if it doesnt excist in array but if it excists pop it and push it in input hidden if it has something in array 
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
if(array.length>0){
	$('#hidden2').val(array);
}
	})
</script>
</body>
</html>
<?php

if(isset($_POST['submitadd'])){// is it set submitadd input
	// isset($_POST['name']) && isset($_FILES['image']) && isset($_POST['content'])&& isset($_POST['viti']) && isset($_POST['Titulli']) && isset($_FILES['movie'])
	if(isset($_FILES['image']) && isset($_POST['content'])&& isset($_POST['viti']) && isset($_POST['Titulli']) && isset($_FILES['movie'])){
// if inputs are set then go inside if scope
		$post_image=$_FILES['image']['name'];// get the file of the name 'name' and get the of movie
$post_video=$_FILES['movie']['name'];
//get the name of each file
$post_temp_file=$_FILES['image']['tmp_name'];
$post_temp2=$_FILES['movie']['tmp_name'];
// upload files in that direcory and then get all the values of inputs and set array of field name and set values of each field and then add all values in table and fields and reload page
move_uploaded_file($post_temp_file,"C:/xampp/htdocs/MOVIES/images/$post_image");
move_uploaded_file($post_temp2,"C:/xampp/htdocs/MOVIES/videos23/$post_video");
$cmimi=intval($_POST['Cmimi']);
$salla=$_POST['Salla'];
$data=$_POST['Data'];
$array=["Tittle","Koha_luajtjes","image_url","Zhandri","Viti_filmit","Data_e_vendosjes","videoURL","content","Salla","Data_luajtjes","cmimi"];
$values=[$_POST['Titulli'],$_POST['tm'],"images/" . $post_image,$_POST['zhandri'], date('Y-m-d H:i:s'),$_POST['viti'],"videos23/".$post_video,$_POST['content'],$salla,$data,$cmimi];
add("movies_post",$array,$values,"Products_prova.php");  
 echo "<script>window.location.href='Products_prova.php'</script>";
}
}


?>

<?php
 // Assign a default value to $id
	 if (isset($_POST['submitedit'])) {
// get the image and movie and their name in variables
		$post_image=$_FILES['image2']['name'];
		$post_video=$_FILES['movie2']['name'];
		$post_temp_file=$_FILES['image2']['tmp_name'];
		$post_temp2=$_FILES['movie2']['tmp_name'];
		$id=intval($_POST['id']);
		$query="SELECT * FROM movies_post where ID=$id";// make query SELECT ALL from movies_post where ID is same with id variable
		$fetch=mysqli_query($connection,$query);
		while($row=mysqli_fetch_assoc($fetch)){// iterate per one row
$delete_image=$row['image_url'];//set variable delete_image to link of image that we want to edit and at the delet_video
$delete_video=$row['videoURL'];
$file_path1 = "C:/xampp/htdocs/MOVIES/images/$delete_image";// path of image that we want to edit
$file_path2 = "C:/xampp/htdocs/MOVIES/videos23/$delete_video";// path of vide that we want to edit
if (file_exists($file_path1)&&file_exists($file_path2)) {// if files excist then remove from that directory
    if (unlink($file_path1)&& unlink($file_path2)) {

    }
  }
}
//send the request for fetching data from movies_post where ID of table is like id varibale from input hidden
	$query="SELECT * FROM movies_post WHERE ID=$id";
		$fetch=mysqli_query($connection,$query);// fetch the data 
		while($row=mysqli_fetch_assoc($fetch)){// for every row set these variables to specified field values
			$title=$row["Tittle"];
			$image=$row["image_url"];
			$zhandri=$row["Zhandri"];
			$viti_filmit=$row["Viti_filmit"];
			$video=$row["videoURL"];
			$content=$row["content"];
			$salla=$row["Salla"];
			$data=$row["Data_luajtjes"];
			$cmimi=$row["cmimi"];
		}
		if(empty($_POST['Title'])){// if its empty POST set that to what we watn to edit and the same for all 
			$_POST['Title']=$title;
		}
		if(empty($post_image)){
			$image=str_replace("images/","",$image);
			$post_image=$image;
		}
		if(empty($_POST['zhandri'])){
			$_POST['zhandri']=$zhandri;
		}
		if(empty($_POST['viti'])){
			$_POST['viti']=$viti_filmit;
		}
		if(empty($post_video)){
			$video=str_replace("videos23/","",$video);
$post_video=$video;
		}
		if(empty($_POST['content'])){
			$_POST['content']=$content;
		}
		if(empty($_POST['Salla2'])){
			$_POST['Salla2']=$salla;
		}
		if(empty($_POST['Data2'])){
			$_POST['Data2']=$data;
		}
		if(empty($_POST['Cmimi2'])){
			$_POST['Cmimi2']=$cmimi;
		}
		move_uploaded_file($post_temp_file,"C:/xampp/htdocs/MOVIES/images/$post_image");// upload the file here in this directory
		move_uploaded_file($post_temp2,"C:/xampp/htdocs/MOVIES/videos23/$post_video");// upload the file video in this directory

		$array=["Tittle","image_url","Zhandri","Viti_filmit","Data_e_vendosjes","videoURL","content","Salla","Data_luajtjes","cmimi"];// array of field names
		$values=[$_POST['Title'],"images/" . $post_image,$_POST['zhandri'],$_POST['viti'], date('Y-m-d H:i:s'),"videos23/".$post_video,$_POST['content'],$_POST['Salla2'],$_POST['Data2'],intval($_POST['Cmimi2'])]; //array of values of fields
	    edit("movies_post",$id,$array,$values);// call edit function
		 echo("<script>window.location.href='Products_prova.php'</script>");//reload the page

}
    if(isset($_POST['submitdelete'])){// if its set input name="submitdelete" which deletes all the page
		$id=intval($_POST['hiden']);// set id to integer value of inmput hidden
		$all="";// set all varaible to empty
		if(empty($_POST['hiden'])){// if input name='hiden' is empty then delete all posts
			$query="DELETE FROM movies_post";
			$query=mysqli_query($connection,$query);
		}
		
		else if(strpos($_POST['hiden'], ',') !== false){// if it includes some , in hiden input then create an array of that with how much comma there is +1
			$array = explode(",", $_POST['hiden']);
		    for($i=0;$i<count($array);$i++){//iterate in array and for each iteation delete all the ID in table with the same as are numbers in array
				$temp=intval($array[$i]);
				$query="DELETE from movies_post WHERE ID=$temp";
				mysqli_query($connection,$query);
			}
		}
		else{
			// here it deletes only one product itf it is only one
delete_product("movies_post",$id);
		}
 echo("<script>window.location.href='Products_prova.php'</script>");// reload the page
	} ?> 
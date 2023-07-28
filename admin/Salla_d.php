    <?php
include "includes/header-dashboard.php";// include the header-dashboard file whuch includes all header in this page
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
		margin-left:580px;
	}	
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<form method="POST" class="form-inline ml-auto">
    
<select name="mySelect">
  <option value="Emri Salles">Emri Salles</option>
  <option value="Nr_uleseve">Nr_uleseve</option>
  <option value="Rez">Rezolucioni</option>
</select>
<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
<input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="sub" value="Search">
</form>
<?php
if(isset($_POST['sub'])){// if its set input with name sub search set to "" then switch to the fields that we want to search and then search it if the desired field that we choose it matches with the search
	$search=""; 
	switch($_POST['mySelect']){
		case 'Emri Salles':
			$search=$_POST['search'];
			$query="SELECT * from sallat where salla_name='$search'";
			$fetch=mysqli_query($connection,$query);
			$array2=array();
			showtable2("sallat",$array2,$fetch);
			break;
			case 'Nr_uleseve':
				$search=intval($_POST['search']);
			$query="SELECT * from sallat where Nr_Uleseve=$search";
			$fetch=mysqli_query($connection,$query);
			$array2=array();
			showtable2("sallat",$array2,$fetch);
				break;
				case 'Rez':
					$search=$_POST['search'];
			$query="SELECT * from sallat where Rezolucioni='$search'";
			$fetch=mysqli_query($connection,$query); 
			$array2=array();
			showtable2("sallat",$array2,$fetch);
					break;
	}

}
else{
	// if there is no search written then call showtable function to print all the fields in tale sallat
$array=array();
$table="sallat";
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
							<label>Salla:</label>
							<input type="text" name="Salla" class="form-control" accept="video/*" required>
						</div>
                        <div class="form-group">
							<label>Kapaciteti:</label>
							<input type="number" name="Kapaciteti" class="form-control" accept="video/*" required>
						</div>
                        <div class="form-group">
							<label>Rezolucioni:</label>
							<input type="text" name="Rez" class="form-control" accept="video/*" required>
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
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" enctype="multipart/form-data" onsubmit="submit()">
					<div class="modal-header">						
						<h4 class="modal-title">Edit <?php echo $table?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="form-group">
							<label>Salla:</label>
							<input type="text" name="Salla2" class="form-control" accept="video/*" required>
						</div>
                        <div class="form-group">
							<label>Kapaciteti:</label>
							<input type="number" name="Kapaciteti2" class="form-control" accept="video/*" required>
						</div> 
                        <input type="number" name="hid" id="hidden" style="display:none;">
                        <div class="form-group">
							<label>Rezolucioni:</label>
							<input type="text" name="Rez2" class="form-control" accept="video/*" required>
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
					     <input type="text" name="hiden" id="hidden2"style="display:none" >
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submitdelete" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
	

<script>
	var array=[];// set array to empty
	$('a.edit').click(function(){// if a class='edit' is clicked then call this function
var id = $(this).attr('id');// get the id value of id
if(isNaN(id)){// check if its not an number
	var id2=parseInt(id);// get the int value of id
}
else{
	var id2=id;// set id2 to id
}
$('#hidden').val(id2);// insert the value of id2 in hidden id input
	})
// a class='delete' when its clicked its called the function 
$('a.delete').click(function(){	
var id = $(this).attr('id');// get the id  of that element DOM and if is not number make it int and insert the value in hiddent ID
if(isNaN(id)){
	var id2=parseInt(id);
}
else{
	var id2=id;
}
$('#hidden2').val(id);
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
  console.log(array);
	})
</script>
</body>
</html>
<?php

if(isset($_POST['submitadd'])){
$array=['salla_name','Nr_Uleseve','Rezolucioni'];// check if array have field names
$salla=$_POST['Salla'];// check if salla is POST['salla']
$kapaciteti=intval($_POST['Kapaciteti']);// kapaciteti with intvalue of kapaciteti
$rez=$_POST['Rez'];
$query = "INSERT INTO $table (salla_name, Nr_Uleseve, Rezolucioni)
VALUES ('$salla', $kapaciteti, '$rez')";// inserti into table on thoise fields tis values
mysqli_query($connection, $query);  // send request to server
echo "<script>window.location.href='Salla_d.php'</script>";// reload page
}
//if submitedit name is ser and then go in if scope get the id and edit with array of fields name and values as array of values if these fields
	 if (isset($_POST['submitedit'])) {
		$id=intval($_POST['hid']);
            $array=['salla_name','Nr_Uleseve','Rezolucioni'];
		$values=[$_POST['Salla2'],intval($_POST['Kapaciteti2']),$_POST['Rez2']];
	    edit($table,$id,$array,$values);
		echo("<script>window.location.href='Salla_d.php'</script>");// reload the page
}
    if(isset($_POST['submitdelete'])){// check if submitdelete is checked and then if it is empty then delete if it has comma delete all that are in array and if it isnt empty and dont have comma then delete just that one value
		$id=intval($_POST['hiden']);
		$all="";
		if(empty($_POST['hiden'])){
			$query="DELETE FROM $table";
			$query=mysqli_query($connection,$query);
		}
		
		else if(strpos($_POST['hiden'], ',') !== false){
			$array = explode(",", $_POST['hiden']);
		    for($i=0;$i<count($array);$i++){
				$temp=intval($array[$i]);
				$query="DELETE from $table WHERE ID=$temp";
				mysqli_query($connection,$query);
			}
		}
		else{
delete_product($table,$id);
		}
echo("<script>window.location.href='Salla_d.php'</script>");
	}
 ?> 